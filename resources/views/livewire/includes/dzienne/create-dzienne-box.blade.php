@php
    $data = date('Y-m-d');
    $zostalo = $wplyw->kwota - $wydatki_stale_sum->kwota - $wydatki_planowane_sum->kwota - $wydatki_miesieczne_sum;
    $origin = date_create($data);
    $target = date_create($reset_day->dzien_wplywu);
    $interval = date_diff($origin, $target);
    $diff = number_format($interval->format('%a'))

@endphp
<div class="container content py-6 mx-auto">
    {{ 'Aktualnie na dzień: '. number_format($zostalo / $diff, '2')}} zł do końca {{ $diff }} dni
    <div class="mx-auto">
        <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
            <div class="flex">
                <h1 class="font-semibold text-lg text-gray-800 mb-5">
                    Wydatki w dniu {{ $data }}: {{ $wydatki_dzienne_sum }} zł
                    | {{ number_format(($zostalo / $diff) - $wydatki_dzienne_sum, '2') }} zł</h1>
            </div>
            <div class="flex">
                <h2 class="font-semibold text-lg text-gray-800 mb-5">Dodaj wydatek</h2>
            </div>
            <div>
                <form>
                    <div class="mb-6">
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            Nazwa </label>
                        <input wire:model="name" type="text" id="name" placeholder="Nazwa.."
                               class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                        @error('name')
                            <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="kwota"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            Kwota </label>
                        <input wire:model="kwota" type="text" id="kwota" placeholder="Kwota.."
                               class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                        @error('kwota')
                        <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror
                    </div>
                    <button wire:click.prevent="create" type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Create
                        +</button>

                        @if(session('success'))
                        <span class="text-green-500 text-xs">
                            {{ session('success') }}
                        </span>
                        @endif
                </form>
            </div>
        </div>
    </div>
</div>
