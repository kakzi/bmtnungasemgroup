<div>
    <x-modal wire:model.defer="open">
        <x-slot name="title">View PDF</x-slot>
        <x-slot name="content">
            <iframe src="{{ $fileUrl }}" style="width: 100%; height: 80vh;" frameborder="0"></iframe>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="$set('open', false)">Close</x-button>
        </x-slot>
    </x-modal>
</div>