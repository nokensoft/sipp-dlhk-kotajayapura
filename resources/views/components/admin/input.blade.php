@props(['label' => '', 'id' => '', 'type' => 'text', 'name' => '', 'isDisabled' => false])
<label for="{{$id}}" class="block mb-2 text-sm font-medium text-gray-900">{{$label}}</label>
<input type="{{$type}}" id="{{$id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="{{$name}}" @disabled($isDisabled)>
@error($name) <span class="text-red-400">{{ $message }}</span> @enderror
