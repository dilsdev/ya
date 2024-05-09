<div>
    {{-- Do your work, then step back. --}}
    <div wire:poll='pending' wire:init="pending()">
    <!-- ... -->
    {{ $pendings }}
    </div>
    <div wire:poll='proses' wire:init="proses()">
    <!-- ... -->
    {{ $proseses }}
    </div>
    <div wire:poll='selesai' wire:init="selesai()">
    <!-- ... -->
    {{ $selesais }}
    </div>
</div>
