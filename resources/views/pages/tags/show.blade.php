<x-guest-layout>
@section('title', $tag->name)

    <x-slot name="header">
        <x-slot name="title">
          {{ $tag->name }}
        </x-slot>

        <x-slot name="sub">
            <div class="flex flex-col space-y-8">
                {{-- Details --}}
                <div class="flex space-x-2">
                    {{ $tag->description }}
                </div>
            </div>
        </x-slot>

        <x-slot name="image">
            <img class="max-w-xl" src="{{ asset('storage/' .$tag->imagePath()) }}" alt="{{ $tag->name }}">
        </x-slot>
    </x-slot>

    <section class="container mx-auto">

        <header class="flex flex-col py-8 mt-8 mb-12 space-y-8 text-center">
            <h2 class="font-serif text-4xl font-bold">Latest posts</h2>
            <hr class="self-center w-40 border-b-4 border-theme-blue-200">
        </header>

        <div class="post-container">
            @foreach ($posts as $post)
                <x-posts.latest :post="$post" />
            @endforeach
        </div>

        @if ($posts->hasPages())
            <div class=" py-3 px-6 my-16 bg-gray-200">
                {{ $posts->links() }}
            </div>
        @endif

    </section>
</x-guest-layout>
