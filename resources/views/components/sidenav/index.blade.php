<aside class="col-span-1 space-y-8" data-aos="fade-left" data-aos-duration="500">

    {{-- About Author --}}
    <div class="p-6 space-y-8 border border-gray-200">
        <h2 class="relative font-serif text-2xl font-bold text-center">
            <span class="side-title">
                About Author
            </span>
        </h2>
        <div class="">
            <img src="{{ asset($author->profile_photo_url) }}" alt="{{ $author->name }}">
        </div>

        <div class="">
            <p class="text-sm tracking-wide text-gray-700">
              {{$author->bio ?? 'No bio data found..'}}
            </p>
        </div>

        {{-- Stats --}}
        <div class="">
            <span class="px-4 py-1 text-white bg-gray-800">
                {{ $author->posts->count() }} Post's
            </span>
        </div>

        {{-- Social Links--}}
        <div class="flex space-x-4">
            <x-social.links :author="$author"/>
        </div>

        {{-- Button --}}
        <a class="block" href="{{ route('authors.show', $author) }}">
            View Profile
        </a>
    </div>

    {{-- Popular Posts --}}
    <div class="p-6 space-y-8 border border-gray-200">
        <h2 class="relative font-serif text-2xl font-bold text-center">
            <span class="side-title">
                Popular Posts
            </span>
        </h2>
        <div class="flex flex-col space-y-8">

            {{-- Single Trending --}}
            @foreach ($popularPosts as $popularPost)
                <div class="grid grid-cols-3 gap-5">
                    <div class="col-span-1">
                        @if ($popularPost->image)
                        <img class="object-cover" src="{{ asset('storage/' .$popularPost->image) }}" alt="{{ $popularPost->title }}">
                        @else
                            <img class="object-cover" src="https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_960_720.jpg" alt="{{ $popularPost->title }}">            
                        @endif
                    </div>
                    <div class="col-span-2">
                        <a href="{{ route('posts.show', $popularPost) }}" class="font-serif">{{ $popularPost->title }}</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Tags --}}
    <div class="p-6 space-y-8 border border-gray-200">
        <h2 class="relative font-serif text-2xl font-bold text-center">
            <span class="side-title">
                Tags
            </span>
        </h2>

        <div class="flex flex-wrap gap-3">

            @foreach ($tags as $tag)
                <x-buttons.default>
                    {{ $tag->name }}
                </x-buttons.default>
            @endforeach

        </div>
    </div>

</aside>
