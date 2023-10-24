<div class="m-5">
    Wpływ: {{ $wplyw->kwota }} zł <br>
    Stałe: {{ $wydatki_stale_sum->kwota }} zł | Pozostało: {{ $wydatki_stale_sum->pozostalo }} zł <br>
    Planowane: {{ $wydatki_planowane_sum->kwota }} zł | Pozostało: {{ $wydatki_planowane_sum->pozostalo }} zł <br>

    @php
        $d = $wplyw->kwota - $wydatki_stale_sum->kwota - $wydatki_planowane_sum->kwota;
    @endphp
    Pozostało: {{ $wplyw->kwota - $wydatki_stale_sum->kwota - $wydatki_planowane_sum->kwota }} zł | Limit dzienny: {{ number_format($d / 30, 2) }} zł <br>
</div>
