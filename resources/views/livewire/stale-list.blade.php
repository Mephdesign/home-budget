<div>
    @include('livewire.includes.header')
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



