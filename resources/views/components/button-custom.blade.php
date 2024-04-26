@props(['action' => null, 'title'=>'', 'icon' => null, 'type'=>'button'])
<button type="{{$type}}" {{$attributes->merge(['class' => 'bg-indigo-600 px-5 py-2.5 rounded-lg text-white'])}} @if($action) wire:click="{{$action}}" @endif>
    @if($icon) {{$icon}} @endif
    {{$title}}
</button>
