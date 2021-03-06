<article class="flex" data-aos="fade-up">
    <a href="{{ route('posts.show', $post) }}" class="post-image">
        @if ($post->image)
            <img class="object-cover w-full h-full" src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->title }}">
        @else
            <img class="object-cover w-full h-full" src="https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_960_720.jpg" alt="{{ $post->title }}">            
        @endif
    </a>
    
    <section class="relative flex-1">
        <div class="mt-16 space-y-8">
            
            <div class="flex items-center justify-between space-x-4">
                <div class="flex space-x-4">
                    @foreach ($post->tags() as $tag)
                    <a href="#" class="text-sm font-bold uppercase text-theme-blue-100"> 
                        {{ $tag->name() }} 
                    </a>
                @endforeach
                </div>

                {{-- Premium Post --}}
                @if ($post->isPremium())
                    <div>
                        <h2 class="p-2 text-sm text-gray-200 bg-gray-800 uppercase"> Premium </h2>
                    </div>
                @endif
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