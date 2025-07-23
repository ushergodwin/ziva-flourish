<x-filament::page>
    <div class="space-y-6">
        <h1 class="text-2xl font-bold">Welcome, {{ auth()->user()->name }}!</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

           @foreach ($stats as $key => $item)
                <x-filament::card>
                    <div class="text-gray-500 text-sm">{{  $key }}</div>
                    <div class="text-2xl font-bold">{{ number_format($item) }}</div>
                </x-filament::card>
           @endforeach
        </div>
    </div>
</x-filament::page>
