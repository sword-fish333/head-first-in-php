@props(['class' => ''])

<div class="relative {{ $class }}" data-playground>
    <!-- Action Buttons Container -->
    <div class="absolute top-2 right-2 flex gap-2 z-10">
        <!-- Edit in Playground Button -->
        <button onclick="openPhpPlayground(this)" 
                class="cursor-pointer edit-btn bg-blue-600 hover:bg-blue-500 text-white p-2 rounded-md shadow-md flex items-center justify-center"
                title="Edit in Playground">
            <span class="material-symbols-outlined text-sm">
                code
            </span>
        </button>
        
        <!-- Copy Button -->
        <button onclick="copyCode(this)"
                class="cursor-pointer copy-btn bg-gray-700 hover:bg-gray-600 text-white p-2 rounded-md shadow-md flex items-center justify-center"
                title="Copy Code">
            <span class="material-symbols-outlined text-sm">
                content_copy
            </span>
        </button>
    </div>

    <!-- Code Display -->
    <code class="code-snippet block whitespace-pre-wrap">
{!!$slot!!}
    </code>

    <!-- Hidden code content for JavaScript access -->
    <div class="hidden code-content">
{!!strip_tags($slot)!!}
    </div>
</div>
