<x-code_snippet>
    /**
    * PROCEDURAL PROGRAMMING PRINCIPLES DEMONSTRATION
    * This script showcases the fundamental concepts of procedural programming
    */

    // =============================================================================
    // 1. SEQUENTIAL EXECUTION - Code executes line by line, top to bottom
    // =============================================================================
    echo "=== PROCEDURAL PROGRAMMING DEMO ===\n";
    echo "1. Sequential execution in progress...\n\n";

    // =============================================================================
    // 2. VARIABLES & DATA STORAGE - Simple data containers
    // =============================================================================
    $name = "John Doe";
    $age = 25;
    $scores = [85, 92, 78, 96];
    $isStudent = true;

    echo "2. Variables stored:\n";
    echo "Name: $name, Age: $age\n\n";

    // =============================================================================
    // 3. FUNCTIONS - Reusable blocks of code (modular programming)
    // =============================================================================

    /**
    * Function to calculate average of numbers
    * Demonstrates: input parameters, processing, return value
    */
    function calculateAverage($numbers) {
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $count > 0 ? $sum / $count : 0;
    }

    /**
    * Function to determine grade based on score
    * Demonstrates: conditional logic within functions
    */
    function getGrade($score) {
    if ($score >= 90) return 'A';
    if ($score >= 80) return 'B';
    if ($score >= 70) return 'C';
    if ($score >= 60) return 'D';
    return 'F';
    }

    /**
    * Procedure to display student report
    * Demonstrates: void function (procedure), multiple parameters
    */
    function displayStudentReport($studentName, $studentAge, $scores) {
    echo "=== STUDENT REPORT ===\n";
    echo "Name: $studentName\n";
    echo "Age: $studentAge\n";
    echo "Scores: " . implode(", ", $scores) . "\n";

    $average = calculateAverage($scores);
    $grade = getGrade($average);

    echo "Average: " . number_format($average, 2) . "\n";
    echo "Grade: $grade\n\n";
    }

    // =============================================================================
    // 4. CONTROL STRUCTURES - Direct program flow
    // =============================================================================

    echo "3. Control Structures:\n";

    // Conditional statements
    if ($isStudent) {
    echo "Status: Active student\n";
    } else {
    echo "Status: Not a student\n";
    }

    // Loops - repetitive execution
    echo "Individual scores: ";
    for ($i = 0; $i < count($scores); $i++) {
    echo $scores[$i];
    if ($i < count($scores) - 1) echo ", ";
    }
    echo "\n\n";

    // =============================================================================
    // 5. FUNCTION CALLS - Invoking reusable code blocks
    // =============================================================================

    echo "4. Function execution:\n";
    displayStudentReport($name, $age, $scores);

    // =============================================================================
    // 6. GLOBAL SCOPE - Data accessible throughout the program
    // =============================================================================

    $programTitle = "Grade Management System";

    function showProgramInfo() {
    global $programTitle; // Accessing global variable
    echo "Program: $programTitle\n";
    echo "Type: Procedural Programming Demo\n";
    }

    echo "5. Global scope demonstration:\n";
    showProgramInfo();
    echo "\n";

    // =============================================================================
    // 7. STEP-BY-STEP PROBLEM SOLVING
    // =============================================================================

    echo "6. Step-by-step processing:\n";
    echo "Step 1: Data input completed\n";
    echo "Step 2: Calculations performed\n";
    echo "Step 3: Results displayed\n";
    echo "Step 4: Program execution finished\n\n";

    // =============================================================================
    // KEY PROCEDURAL PROGRAMMING PRINCIPLES DEMONSTRATED:
    //
    // ✓ Sequential Execution: Code runs line by line
    // ✓ Functions/Procedures: Modular, reusable code blocks
    // ✓ Local/Global Scope: Variable accessibility
    // ✓ Control Structures: if/else, loops for program flow
    // ✓ Top-down Design: Breaking problems into smaller functions
    // ✓ Data and Functions are Separate: No encapsulation
    // ✓ Structured Programming: Clear, readable code organization
    // =============================================================================

    echo "=== PROCEDURAL PROGRAMMING DEMO COMPLETE ===\n";
</x-code_snippet>
