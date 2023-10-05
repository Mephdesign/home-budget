<div class="bg-white">
    Wpływ: {{ $wplyw->kwota }} zł <br>
    Wydatki stałe: {{ $wydatki_stale_sum->kwota }} | Pozostało: {{ $wydatki_stale_sum->pozostalo }} <br>
    Wydatki planowane: {{ $wydatki_planowane_sum->kwota }}
    Pozostało: {{ $wplyw->kwota - $wydatki_stale_sum->kwota - $wydatki_planowane_sum->kwota }} | Limit dzienny: 50 zł <br>
    @include('livewire.includes.planowane.create-stale-box')
    @include('livewire.includes.planowane.search-box')
    <div id="stale-list">
        @foreach($planowane as $planowany)
            @include('livewire.includes.planowane.planowane-card')
        @endforeach

        <div class="my-2">
            {{ $planowane->links() }}
        </div>
    </div>
</div>

