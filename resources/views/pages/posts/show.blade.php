<x-guest-layout>
@section('title', $post->title())
@section('description', $post->excerpt(50))

@section('keywords')
    @foreach ($post->tags() as $tag)
        {{ $tag->name }},
    @endforeach
@endsection

@section('metaImage')
    {{ asset('storage/' .$post->image) }}
@endsection



    <section class="container mx-auto">
        <div class="grid grid-cols-4 gap-10 pt-24">

            {{-- Single Post --}}
            @if ($post->isPremium())
                @auth
                    @subscribed (auth()->user())
                        <article class="col-span-3" data-aos="fade-up" data-aos-duration="500">

                            {{-- Cover Image --}}
                            <div class=" h-96">
                                <img class="object-cover w-full h-full" src="{{ asset('storage/' .$post->image) }}" alt="Stock Five">
                            </div>

                            {{-- Content --}}
                            <div class="relative flex-1">
                                <div class="mt-16 space-y-8">
                                    {{-- Tags --}}
                                    @forelse ($post->tags() as $tag)
                                    <a href="#" class="text-sm font-bold uppercase text-theme-blue-100">{{ $tag->name }}</a>
                                    @empty
                                    <a href="#" class="text-sm font-bold uppercase text-theme-blue-100">Not found</a>
                                    @endforelse

                                    {{-- Title --}}
                                    <h1 class="font-serif text-5xl font-bold">
                                        {{ $post->title() }}
                                    </h1>

                                    {{-- Author --}}
                                    <div class="flex items-center space-x-8">
                                        <div class="flex items-center space-x-4">
                                            <a href="#">
                                                <img class="object-cover w-12 h-12 rounded" src="{{ $post->author()->profile_photo_url }}" alt="{{ $post->author()->name() }}">
                                            </a>
                                            <div class="">
                                                <h3 class="text-xl font-bold">{{ $post->author()->type }}</h3>
                                            </div>
                                        </div>

                                        {{-- Date --}}
                                        <span class="text-gray-600">
                                            Posted: {{ $post->publishedAt() }}
                                        </span>
                                    </div>

                                <div class=" tracking-wide lat leading-6 text-gray-700">
                                    {!! $post->body !!}
                                </div>

                                </div>
                            </div>

                            <hr class="pt-1 my-12 border-t border-b">

                            <div class="flex flex-col items-center mb-24 space-y-4">
                                <h2 class="font-serif font-bold capitalize">Share this post</h2>
                                
                                {{-- Social Share --}}
                                <x-social.links :post="$post" url="{{ Request::url() }}" /> 

                            </div>

                            {{-- Comments --}}
                            @if ($post->isCommentable())
                                <x-posts.comments :post="$post" />
                            @endif       

                        </article>
                    @else
                        <div class="col-span-3 space-y-4 shadow text-center" data-aos="fade-up" data-aos-duration="500">
                            <h2 class="text-xl font-bold text-theme-blue-200">
                                This content is only for premium users
                            </h2>
                            <h2> 
                                Please subscribe to view the post
                            </h2>
                            <x-link.subscribe href="{{ route('membership') }}">
                                Subscribe
                            </x-link.subscribe>
                        </div>
                    @endsubscribed

                    @else 
                        <div class="col-span-3 text-center" data-aos="fade-up" data-aos-duration="500">
                            <h2 class="text-xl font-bold">Please login to see the post</h2>
                            <x-link.primary href="{{ route('login') }}"> Log In </x-link.primary>
                        </div>
                @endauth

            @else  {{-- Free Post --}}
                <article class="col-span-3" data-aos="fade-up" data-aos-duration="500">

                    {{-- Cover Image --}}
                    <div class=" h-96">
                        <img class="object-cover w-full h-full" src="{{ asset('storage/' .$post->image) }}" alt="Stock Five">
                    </div>

                    {{-- Content --}}
                    <div class="relative flex-1">
                        <div class="mt-16 space-y-8">
                            {{-- Tags --}}
                            @forelse ($post->tags() as $tag)
                            <a href="#" class="text-sm font-bold uppercase text-theme-blue-100">{{ $tag->name }}</a>
                            @empty
                            <a href="#" class="text-sm font-bold uppercase text-theme-blue-100">Not found</a>
                            @endforelse

                            {{-- Title --}}
                            <h1 class="font-serif text-5xl font-bold">
                                {{ $post->title() }}
                            </h1>

                            {{-- Author --}}
                            <div class="flex items-center space-x-8">
                                <div class="flex items-center space-x-4">
                                    <a href="#">
                                        <img class="object-cover w-12 h-12 rounded" src="{{ $post->author()->profile_photo_url }}" alt="{{ $post->author()->name() }}">
                                    </a>
                                    <div class="">
                                        <h3 class="text-xl font-bold">{{ $post->author()->type }}</h3>
                                    </div>
                                </div>

                                {{-- Date --}}
                                <span class="text-gray-600">
                                    Posted: {{ $post->publishedAt() }}
                                </span>
                            </div>

                        <div class=" tracking-wide lat leading-6 text-gray-700">
                            {!! $post->body !!}
                        </div>

                        </div>
                    </div>

                    <hr class="pt-1 my-12 border-t border-b">

                    <div class="flex flex-col items-center mb-24 space-y-4">
                        <h2 class="font-serif font-bold capitalize">Share this post</h2>
                        
                        {{-- Social Share --}}
                        <x-social.links :post="$post" url="{{ Request::url() }}" /> 

                    </div>

                        {{-- Comments --}}
                        @if ($post->isCommentable())
                            <x-posts.comments :post="$post" />
                        @endif

                </article>
            @endif

            {{-- Side nav --}}
            <x-sidenav.post />

        </div>
    </section>
</x-guest-layout>
