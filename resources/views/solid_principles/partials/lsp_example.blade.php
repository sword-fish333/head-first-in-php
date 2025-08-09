<p class="font-semibold mt-4">vanilla PHP - exemplu greșit:</p>
<x-code_snippet>
    // BAD: Subclass violates the expectations set by the parent

    class Rectangle {
    protected $width;
    protected $height;

    public function setWidth($width) {
    $this->width = $width;
    }

    public function setHeight($height) {
    $this->height = $height;
    }

    public function getArea() {
    return $this->width * $this->height;
    }
    }

    // This seems logical but violates LSP!
    class Square extends Rectangle {
    // A square must have equal sides, so we override the setters
    public function setWidth($width) {
    $this->width = $width;
    $this->height = $width; // Force height to match
    }

    public function setHeight($height) {
    $this->height = $height;
    $this->width = $height; // Force width to match
    }
    }

    // This function expects Rectangle behavior
    function testRectangle(Rectangle $rectangle) {
    $rectangle->setWidth(5);
    $rectangle->setHeight(4);

    // We expect area to be 20 (5 * 4)
    $expectedArea = 20;
    $actualArea = $rectangle->getArea();

    if ($actualArea !== $expectedArea) {
    throw new Exception("Expected area {$expectedArea}, got {$actualArea}");
    }
    }

    // This works fine
    $rectangle = new Rectangle();
    testRectangle($rectangle); // Works: area is 20

    // This breaks! Square changes behavior unexpectedly
    $square = new Square();
    testRectangle($square); // Fails: area is 16 (4 * 4) not 20!
</x-code_snippet>
<p class="font-semibold mt-4">Vanilla PHP - exemplu corect:</p>
<x-code_snippet>
    // GOOD: Use composition or proper abstraction

    // Define what shapes can do
    interface ShapeInterface {
    public function getArea();
    }

    // Rectangle implementation
    class Rectangle implements ShapeInterface {
    private $width;
    private $height;

    public function __construct($width, $height) {
    $this->width = $width;
    $this->height = $height;
    }

    public function getArea() {
    return $this->width * $this->height;
    }
    }

    // Square is its own thing, not a rectangle
    class Square implements ShapeInterface {
    private $side;

    public function __construct($side) {
    $this->side = $side;
    }

    public function getArea() {
    return $this->side * $this->side;
    }
    }

    // Now we work with the interface, not concrete classes
    function calculateTotalArea(array $shapes) {
    $total = 0;
    foreach ($shapes as $shape) {
    if (!$shape instanceof ShapeInterface) {
    throw new Exception("Invalid shape");
    }
    $total += $shape->getArea();
    }
    return $total;
    }

    // Both work correctly without surprises
    $shapes = [
    new Rectangle(5, 4),  // Area: 20
    new Square(3),         // Area: 9
    new Rectangle(2, 6),  // Area: 12
    ];

    echo "Total area: " . calculateTotalArea($shapes); // 41
</x-code_snippet>
