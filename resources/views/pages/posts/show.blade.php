<x-guest-layout>
@section('title', $post->title())

    <section class="container mx-auto">
        <div class="grid grid-cols-4 gap-10 pt-24">
            {{-- Single Post --}}
            <article class="col-span-3" data-aos="fade-up" data-aos-duration="500">

                {{-- Cover Image --}}
                <div class=" h-96">
                    <img class="object-cover w-full h-full" src="{{ asset('storage/media/posts/' .$post->image) }}" alt="Stock Five">
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
                    <div class="flex flex-wrap gap-3">
                        <x-buttons.social>
                            <x-fab-facebook-f class="w-5 h-5" />
                        </x-buttons.social>
                        <x-buttons.social>
                            <x-fab-twitter class="w-5 h-5" />
                        </x-buttons.social>
                        <x-buttons.social>
                            <x-fab-whatsapp class="w-5 h-5" />
                        </x-buttons.social>
                        <x-buttons.social>
                            <x-fab-telegram-plane class="w-5 h-5" />
                        </x-buttons.social>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="border-b-2 border-theme-blue-100">
                        <h2 class="inline-block p-2 text-sm text-white uppercase rounded-t bg-theme-blue-100">
                            Post a comment
                        </h2>
                    </div>
                    <span class="block">10 Comments</span>

                    <div class="pb-16">
                        <x-form action="">
                            <x-textarea name="about" class="w-full border-gray-200 rounded focus:border-theme-blue-100 focus:ring focus:ring-theme-blue-100 focus:ring-opacity-50">
                                Enter your comment
                            </x-textarea>
                        </x-form>
                    </div>
                </div>

            </article>

            {{-- Side nav --}}
            <x-sidenav.post />

        </div>
    </section>
</x-guest-layout>
