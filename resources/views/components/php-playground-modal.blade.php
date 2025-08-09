<!-- PHP Playground Modal -->
<div id="php-playground-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="w-full h-full bg-white flex flex-col">
        <!-- Modal Header -->
        <div class="bg-gray-800 text-white px-6 py-4 flex items-center justify-between shadow-lg">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-green-400">
                    code
                </span>
                <h2 class="text-xl font-semibold">PHP Playground</h2>
            </div>
            <div class="flex items-center gap-3">
                <!-- Run Button -->
                <button id="modal-run-btn"
                        onclick="runModalCode()"
                        class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg shadow-md flex items-center gap-2 transition-colors cursor-pointer">
                    <span class="material-symbols-outlined text-sm">
                        play_arrow
                    </span>
                    <span class="font-medium">Run Code</span>
                </button>
                <!-- Close Button -->
                <button onclick="closePhpPlayground()"
                        class="bg-gray-600 hover:bg-gray-500 text-white p-2 rounded-lg shadow-md transition-colors flex items-center cursor-pointer">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
            </div>
        </div>

        <!-- Modal Content - Split Screen -->
        <div class="flex-1 flex overflow-hidden">
            <!-- Left Side - Code Editor -->
            <div class="w-1/2 flex flex-col border-r border-gray-300">
                <div class="bg-gray-100 px-4 py-3 border-b border-gray-300">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-600 text-sm">
                                edit_note
                            </span>
                            PHP Code Editor
                        </h3>
                        <div class="flex items-center gap-2">
                            <button onclick="clearModalEditor()"
                                    class="text-sm text-gray-600 hover:text-gray-800 underline">
                                Clear
                            </button>
                            <button onclick="copyModalCode()"
                                    class="text-sm text-blue-600 hover:text-blue-800 underline flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">
                                    content_copy
                                </span>
                                Copy
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-1 relative">
                    <textarea id="modal-code-editor"
                              class="w-full h-full p-4 bg-gray-900 text-green-400 font-mono text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                              style="font-family: 'Courier New', 'Monaco', 'Menlo', monospace; tab-size: 4; line-height: 1.5;"
                              placeholder="@php&#10;<?php&#10;&#10;// Start coding here...&#10;echo 'Hello, World!';&#10;@endphp"></textarea>
                    <!-- Line Numbers (Optional Enhancement) -->
                    <div class="absolute left-0 top-0 w-12 h-full bg-gray-800 border-r border-gray-700 overflow-hidden pointer-events-none">
                        <div id="line-numbers" class="p-4 text-xs text-gray-500 font-mono leading-6"></div>
                    </div>
                    <style>
                        #modal-code-editor {
                            padding-left: 3.5rem !important;
                        }
                    </style>
                </div>
            </div>

            <!-- Right Side - Output -->
            <div class="w-1/2 flex flex-col">
                <div class="bg-gray-100 px-4 py-3 border-b border-gray-300">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                            <span class="material-symbols-outlined text-green-600 text-sm">
                                terminal
                            </span>
                            Output
                        </h3>
                        <button onclick="clearModalResults()"
                                class="text-sm text-gray-600 hover:text-gray-800 underline">
                            Clear Output
                        </button>
                    </div>
                </div>
                <div class="flex-1 bg-gray-50 overflow-auto">
                    <!-- Success Output -->
                    <div id="modal-output-section" class="hidden">
                        <div class="p-4">
                            <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                <div class="px-4 py-2 bg-green-50 border-b border-green-200 rounded-t-lg">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-green-600 text-sm">
                                            check_circle
                                        </span>
                                        <span class="text-green-800 font-medium text-sm">Execution Result</span>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <pre id="modal-results-output" class="text-sm text-gray-900 whitespace-pre-wrap font-mono bg-gray-50 p-3 rounded border overflow-auto max-h-96"></pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Error Output -->
                    <div id="modal-error-section" class="hidden">
                        <div class="p-4">
                            <div class="bg-white rounded-lg border border-red-200 shadow-sm">
                                <div class="px-4 py-2 bg-red-50 border-b border-red-200 rounded-t-lg">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-red-600 text-sm">
                                            error
                                        </span>
                                        <span class="text-red-800 font-medium text-sm">Error</span>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <pre id="modal-error-output" class="text-sm text-red-900 whitespace-pre-wrap font-mono bg-red-50 p-3 rounded border overflow-auto max-h-96"></pre>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Initial State -->
                    <div id="modal-initial-state" class="flex items-center justify-center h-full">
                        <div class="text-center text-gray-500">
                            <span class="material-symbols-outlined text-6xl text-gray-300 mb-4 block">
                                play_circle
                            </span>
                            <p class="text-lg font-medium">Ready to run your PHP code</p>
                            <p class="text-sm">Click the "Run Code" button to see the output</p>
                        </div>
                    </div>

                    <!-- Loading State -->
                    <div id="modal-loading-state" class="hidden flex items-center justify-center h-full">
                        <div class="text-center text-gray-600">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
                            <p class="text-lg font-medium">Executing your code...</p>
                            <p class="text-sm">Please wait a moment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-100 px-6 py-3 border-t border-gray-300">
            <div class="flex items-center justify-between text-sm text-gray-600">
                <div class="flex items-center gap-4">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">
                            info
                        </span>
                        Press Ctrl+Enter to run code
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">
                            security
                        </span>
                        Secure sandbox execution
                    </span>
                </div>
                <div class="text-xs text-gray-500">
                    PHP Playground v1.0
                </div>
            </div>
        </div>
    </div>
</div>
