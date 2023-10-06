<div>
    Wpływ: {{ $wplyw->kwota }} zł <br>
    Wydatki stałe: {{ $wydatki_stale_sum->kwota }} | Pozostało: {{ $wydatki_stale_sum->pozostalo }} <br>
    Wydatki planowane: {{ $wydatki_planowane_sum->kwota }}
    @php
        $d = $wplyw->kwota - $wydatki_stale_sum->kwota - $wydatki_planowane_sum->kwota;
    @endphp
    Pozostało: {{ $wplyw->kwota - $wydatki_stale_sum->kwota - $wydatki_planowane_sum->kwota }} | Limit dzienny: {{ $d / 30 }} zł <br>
</div>
