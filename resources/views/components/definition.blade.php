@props(['class' => ''])
<div class="{{ $class }}">
    <p class="text-xl">🔧&nbsp;<b>Definiție:</b></p>
    <p class="text-lg indent-5">{!!$slot!!}</p>
</div>
