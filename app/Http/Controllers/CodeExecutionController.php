<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CodeExecutionController extends Controller
{
    public function execute(Request $request): JsonResponse
    {
        $code = $request->input('code');
        
        if (empty($code)) {
            return response()->json([
                'success' => false,
                'error' => 'No code provided'
            ], 400);
        }

        // Security checks
        $forbiddenFunctions = [
            'exec', 'shell_exec', 'system', 'passthru', 'file_get_contents', 
            'file_put_contents', 'fopen', 'fwrite', 'unlink', 'rmdir', 'mkdir',
            'eval', 'assert', 'include', 'require', 'include_once', 'require_once'
        ];

        foreach ($forbiddenFunctions as $function) {
            if (strpos(strtolower($code), $function) !== false) {
                return response()->json([
                    'success' => false,
                    'error' => "Function '$function' is not allowed for security reasons"
                ], 400);
            }
        }

        // Capture output and errors
        ob_start();
        $error = '';
        
        try {
            // Set error handler to capture errors
            set_error_handler(function($severity, $message, $filename, $lineno) use (&$error) {
                $error .= "Error: $message on line $lineno\n";
            });

            // Execute the code with limited time
            set_time_limit(5); // 5 second limit
            
            // Wrap code in <?php tags if not present
            if (strpos(trim($code), '<?php') !== 0) {
                $code = "<?php\n" . $code;
            }
            
            eval('?>' . $code);
            
        } catch (ParseError $e) {
            $error = "Parse Error: " . $e->getMessage();
        } catch (Error $e) {
            $error = "Fatal Error: " . $e->getMessage();
        } catch (Exception $e) {
            $error = "Exception: " . $e->getMessage();
        } finally {
            restore_error_handler();
            set_time_limit(0); // Reset time limit
        }

        $output = ob_get_clean();

        return response()->json([
            'success' => true,
            'output' => $output ?: '',
            'error' => $error ?: null
        ]);
    }
}