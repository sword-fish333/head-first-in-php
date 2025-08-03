<div class="relative">
    <!-- Top Right Copy Button -->
    <button onclick="copyCode(this)"
            class="cursor-pointer copy-btn absolute top-2 right-2 bg-gray-700 hover:bg-gray-600 text-white p-2 rounded-md shadow-md z-10 flex items-center justify-center">
    <span class="material-symbols-outlined text-sm">
content_copy
</span>
    </button>

    <!-- Bottom Right Copy Button -->
    <button onclick="copyCode(this)"
            class="cursor-pointer copy-btn absolute bottom-2 right-2 bg-gray-700 hover:bg-gray-600 text-white p-2 rounded-md shadow-md z-10 flex items-center justify-center">
        <span class="material-symbols-outlined text-sm">
content_copy
</span>
    </button>
    <code class="code-snippet">
{!!$slot!!}
    </code>
</div>
