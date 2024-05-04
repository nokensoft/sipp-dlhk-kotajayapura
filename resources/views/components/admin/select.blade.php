@props(['label' => '', 'id' => '', 'name' => '', 'options' => [], 'optionName' => '', 'isDisabled' => false])
<label for="{{$id}}" class="block mb-2 text-sm font-medium text-gray-900 ">{{$label}}</label>
<select id="{{$id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="{{$name}}" @disabled($isDisabled)>
    @if(!empty($options))
            <option selected>Pilih {{$label}}</option>
        @foreach($options as $option)
            <option value="{{$option['id']}}">{{$option->$optionName}}</option>
        @endforeach
    @else
        {{$slot}}
    @endif
</select>
