<div>
    Wpływ: {{ $wplyw->kwota }} zł <br>
    Wydatki stałe: {{ $wydatki_stale_sum->kwota }} | Pozostało: {{ $wydatki_stale_sum->pozostalo }} <br>
    Wydatki planowane: 500 zł
    Pozostało: {{ $wplyw->kwota - $wydatki_stale_sum->kwota - $wydatki_planowane_sum->kwota }} | Limit dzienny: 50 zł <br>
    @include('livewire.includes.stale.create-stale-box')
    @include('livewire.includes.stale.search-box')
    <div id="stale-list">
        @foreach($stale as $staly)
            @include('livewire.includes.stale.stale-card')
        @endforeach

        <div class="my-2">
            {{ $stale->links() }}
        </div>
    </div>
</div>



