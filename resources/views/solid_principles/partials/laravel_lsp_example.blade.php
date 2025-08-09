<x-section_title class="mt-5" title="Cum implementează Laravel LSP:"/>
<p>Laravel asigură conformitatea cu LSP în contractele și implementările sale</p>
<x-code_snippet>
    // Laravel's Filesystem contracts ensure LSP
    use Illuminate\Contracts\Filesystem\Filesystem;

    class FileService {
    private Filesystem $storage;

    public function __construct(Filesystem $storage) {
    $this->storage = $storage;
    }

    public function saveFile($path, $content) {
    // This works with any filesystem implementation
    return $this->storage->put($path, $content);
    }
    }

    // You can swap implementations without breaking the code
    $localService = new FileService(Storage::disk('local'));
    $s3Service = new FileService(Storage::disk('s3'));
    $ftpService = new FileService(Storage::disk('ftp'));

    // All work the same way from the consumer's perspective
    $localService->saveFile('test.txt', 'content');
    $s3Service->saveFile('test.txt', 'content');
    $ftpService->saveFile('test.txt', 'content');
</x-code_snippet>
