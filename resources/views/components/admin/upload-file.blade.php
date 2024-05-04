@props(['title' => '', 'subtitle'=>'', 'id' => '', 'label' => '', 'name' => '', 'img' => '', 'isDisabled' => false])
<h5>{{$title}}</h5>
<p class="mb-2">{{$subtitle}}</p>
<div class="upload upload-draggable @if(!$isDisabled) hover:border-primary-600 @endif @error($name) border-red-500 hover:border-red-500 @enderror">
    <div
        wire:ignore
        x-data="{
                id: @js($id),
                handleImageChange() {
                    const inputElement = document.getElementById(this.id);
                    const file = inputElement.files[0]; // Ambil file dari input
                    console.log(file)
                    if(file){
                        const reader = new FileReader();

                        reader.onload = (e) => {
                            document.getElementById(`img-${this.id}`).src = e.target.result;
                        };

                        reader.readAsDataURL(file);
                    }
                }
             }"
    >
        <label class="form-label"></label>
        <div>
            <input class="upload-input draggable" type="file" id="{{$id}}" @change="handleImageChange" wire:model="{{$name}}" @disabled($isDisabled)>
            <div class="my-16 text-center">
                <img src="{{ $img != '' ? asset('storage/'.$img) : asset('assets/img/others/upload.png')}}" alt="" class="mx-auto max-h-52" id="img-{{$id}}">
                @if(!$isDisabled)
                    <p class="font-semibold">
                        <span class="text-gray-800">drop file {{$label}} anda disini, atau</span>
                        <span class="text-blue-500">pilih</span>
                    </p>
                    <p class="mt-1 opacity-60">Support: jpeg, png</p>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="mb-6 mt-1">
    @error($name) <span class="text-red-400">{{ $message }}</span> @enderror
</div>
