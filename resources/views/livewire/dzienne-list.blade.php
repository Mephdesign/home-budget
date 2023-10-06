<div>
    @include('livewire.includes.header')
    @include('livewire.includes.dzienne.create-dzienne-box')
    @include('livewire.includes.dzienne.search-box')
    <div id="dzienne-list">
        @foreach($dzienne as $dzienny)
            @include('livewire.includes.dzienne.dzienne-card')
        @endforeach

        <div class="my-2">
            {{ $dzienne->links() }}
        </div>
    </div>
</div>



