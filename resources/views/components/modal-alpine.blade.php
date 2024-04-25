@props(['modalName' => '', 'title' => ''])
<!-- Modal -->
<div
    x-show="{{$modalName}}"
    style="display: none"
    x-on:keydown.escape.prevent.stop="open = false"
    role="dialog"
    aria-modal="true"
    x-id="['modal-title']"
    :aria-labelledby="$id('modal-title')"
    class="fixed inset-0 z-50 overflow-y-auto"
>
    <!-- Overlay -->
    <div x-show="{{$modalName}}" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

    <!-- Panel -->
    <div
        x-show="{{$modalName}}" x-transition
        x-on:click="{{$modalName}} = false"
        class="relative flex min-h-screen items-center justify-center p-4"
    >
        <div
            x-on:click.stop
            x-trap.noscroll.inert="{{$modalName}}"
            class="relative w-full max-w-xl overflow-y-auto rounded-xl bg-white shadow-lg"
        >
            <div class="flex justify-between p-2">
                <!-- Title -->
                <h2 class="text-2xl font-medium">{{$title}}</h2>
                <button x-on:click="{{$modalName}} = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <hr>

            {{$slot}}

        </div>
    </div>
</div>
