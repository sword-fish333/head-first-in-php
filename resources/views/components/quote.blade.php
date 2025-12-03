@props(['class' => '','author'=>''])
<div class="{{ $class }} block">
    <q class="text-lg font-light text-gray-500 italic indent-5">{!!$slot!!}</q>
    <br>
    @isset($author) <small class="italic underline text-right">{{$author}}</small>@endisset
</div>
