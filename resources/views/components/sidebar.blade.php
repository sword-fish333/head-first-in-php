<!-- Table of Contents Sidebar -->
<nav id="toc-sidebar"
     class="fixed left-0 top-0 w-64 h-full bg-white shadow-lg rounded-r-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 z-40 overflow-y-auto">
    <div class="p-6">
        <h3 class="text-lg font-semibold text-blue-950 mb-4">Cuprins</h3>
        <ul class="space-y-2" id="toc-list">
            @foreach($sections as $section)
                <li><a href="#{{$section['section_id']}}"
                       class="toc-link block py-2 px-3 text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">{{$section['section_name']}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<!-- Toggle Button for Mobile -->
<button id="toc-toggle"
        class="fixed left-4 top-24 bg-blue-600 text-white p-2 rounded-full shadow-lg lg:hidden z-50">
    <span class="material-symbols-outlined">menu</span>
</button>
