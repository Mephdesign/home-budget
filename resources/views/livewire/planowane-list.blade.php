<div>
    @include('livewire.includes.header')
    @include('livewire.includes.planowane.create-planowane-box')
    @include('livewire.includes.planowane.search-box')
    <div id="planowane-list">
        @foreach($planowane as $planowany)
            @include('livewire.includes.planowane.planowane-card')
        @endforeach

        <div class="my-2">
            {{ $planowane->links() }}
        </div>
    </div>
</div>

