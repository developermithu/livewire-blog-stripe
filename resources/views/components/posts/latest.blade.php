<article class="flex" data-aos="fade-up">
    <a href="{{ route('posts.show', $post) }}" class="post-image">
        <img class="object-cover w-full h-full" src="{{ asset('storage/media/posts/' .$post->image) }}" alt="{{ $post->title }}">
    </a>
    <section class="relative flex-1">
        <div class="mt-16 space-y-8">
            <div class="flex space-x-4">
                @foreach ($post->tags() as $tag)
                <a href="#" class="text-sm font-bold uppercase text-theme-blue-100">  {{ $tag->name() }}  </a>
                @endforeach
            </div>
            <h2 class="font-serif text-5xl font-bold">
                {{ $post->title() }}
            </h2>
            <p class="leading-6 tracking-wide text-gray-700">
                {{ $post->excerpt() }}
            </p>
        </div>

        {{-- Author --}}
        <div class=" pt-4 flex justify-between w-full bottom-8">
            <div class="flex items-center space-x-4">
                <a href="#">
                    <img class="object-cover w-12 h-12 rounded" src="{{ $post->author()->profile_photo_url }}" alt="{{ $post->author()->name }}">
                </a>
                <div class="">
                    <h3 class="text-xl font-bold">  {{ $post->author()->name() }}</h3>
                    <span class="text-sm text-gray-600">{{ $post->author()->type }}</span>
                </div>
            </div>

            {{-- Button --}}
            <x-link.primary href="{{ route('posts.show', $post) }}">
                {{ __('Read More') }}
            </x-link.primary>

        </div>
    </section>
</article>