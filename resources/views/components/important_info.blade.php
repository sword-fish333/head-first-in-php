@props(['class' => ''])

<div class="bg-red-50 p-4 rounded-lg {{ $class }}">
    <p><i class="fa-solid fa-exclamation text-2xl text-red-600"></i>&nbsp;{{ $slot }}</p>
</div>
