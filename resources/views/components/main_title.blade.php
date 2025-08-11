@props(['link_section' => '','title'=>''])

<h4 {{ $attributes->merge(['class' => 'text-xl text-red-800 font-semibold flex items-start gap-2']) }}>
    @if($link_section)
        <span class="cursor-pointer text-black"
              onclick="navigator.clipboard.writeText(location.origin + location.pathname + '#'+'{{$link_section}}')"><span
                class="material-symbols-outlined">
link
</span></span>
    @endif
    {{ $title }}</h4>
