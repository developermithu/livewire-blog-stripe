<div>

    <div class="post-container">

        @foreach ($posts as $post)
            <x-posts.latest :post="$post"/>  {{-- component --}}
        @endforeach

    </div>
    
    <div class="flex justify-center my-16">
        <x-jet-button wire:click="loadMore">
            Load More...
        </x-jet-button>
    </div>

</div>