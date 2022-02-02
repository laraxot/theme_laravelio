<div>
    @if ($label)
        <span class="text-xl text-gray-900 font-semibold mb-4 block">
            {{ $label }}
        </span>
    @endif

    <div x-data="editorConfig($wire.entangle('body').defer)"
        @editor-control-clicked.window="handleClick($event.detail, $root)" class="bg-white rounded-md shadow-md">

        <ul class="flex p-5 gap-x-4">
            <li>
                <button type="button" @click="mode = 'write'"
                    :class="{ 'text-lio-500 border-lio-500 border-b-2': mode === 'write' }">
                    Write
                </button>
            </li>

            <li>
                <button type="button" @click="mode = 'preview'" wire:click="preview"
                    :class="{ 'text-lio-500 border-lio-500 border-b-2': mode === 'preview' }">
                    Preview
                </button>
            </li>
        </ul>

        <div x-show="mode === 'write'">
            <div class="flex flex-col relative">
                <div x-text="body + '\n'" class="invisible whitespace-pre-line border-none p-5 min-h-[5rem]"></div>
                <textarea
                    class="w-full h-full absolute left-0 top-0 right-0 bottom-0 overflow-y-hidden resize-none border-none p-5 focus:border focus:border-lio-300 focus:ring focus:ring-lio-200 focus:ring-opacity-50"
                    rows="12" id="body" name="body" placeholder="{{ $placeholder }}" x-model=body required
                    @keydown.cmd.enter="submit($event)" @keydown.ctrl.enter="submit($event)"></textarea>
            </div>

            <div class="flex flex-col items-center justify-end gap-y-4 gap-x-5 p-5 md:flex-row">
                <x-forms.editor.controls />

                @if ($hasButton)
                    <x-button.primary-cta type="{{ $buttonType }}" class="w-full md:w-auto">
                        <span class="flex items-center">
                            {{ $buttonLabel }}

                            @if ($buttonIcon)
                                <span class="ml-1">
                                    {{-- @svg($buttonIcon,'w-5h-5') --}}
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endif
                        </span>
                    </x-button.primary-cta>
                @endif
            </div>
        </div>

        <div x-show="mode === 'preview'" x-cloak>
            <div class="prose prose-lio max-w-none p-5 break-words" id="editor-preview">
                {!! $this->preview !!}
            </div>
        </div>
    </div>
</div>
