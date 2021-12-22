<div>

    <div class="post-container">
        @foreach ($posts as $post)
            <x-posts.latest :post="$post"/>  {{-- component --}}
        @endforeach
    </div>
    
    <div class="flex justify-center my-16">
        @if ($posts->hasMorePages())
            <x-jet-button wire:click="loadMore">
                <span wire:loading.remove> Load More </span>
                <div wire:loading.delay>
                    <div class="flex items-center justify-center space-x-4">
                        <span>Loading</span>
                        <span class="w-6 h-6 rounded-full border-2 border-white animate-spin"></span>
                    </div>
                </div>
            </x-jet-button>
        @else
            <h2 class="p-2 font-bold rounded bg-theme-blue-100 text-white"> No more pages.. </h2>
        @endif
    </div>


</div>