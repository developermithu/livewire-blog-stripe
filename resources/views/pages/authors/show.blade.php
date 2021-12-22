<x-guest-layout>
    <x-slot name="header">
        <x-slot name="title">
            {{ __($user->name) }}
        </x-slot>

        <x-slot name="sub">
            <div class="flex flex-col space-y-8">
                {{-- Details --}}
                <div class="flex space-x-2">
                    <x-heroicon-o-pencil-alt class="w-5 h-5 text-gray-800" />
                    <span> {{ $user->posts->count() }} Post's</span>
                </div>

                {{-- Socials Links --}}
                <div class="flex space-x-4">
                    @if (!empty($user->profile->facebook))
                    <a href="{{ $user->profile->facebook }}" target="_blank">
                        <x-fab-facebook-f class="h-4 text-theme-blue-200" />
                    </a>
                @endif

                @if (!empty($user->profile->twitter))
                    <a href="{{ $user->profile->twitter }}" target="_blank">
                        <x-fab-twitter class="h-4 text-theme-blue-200" />
                    </a>
                @endif

                @if (!empty($user->profile->instagram))
                    <a href="{{ $user->profile->instagram }}" target="_blank">
                        <x-fab-instagram-square class="h-4 text-theme-blue-200" />
                    </a>
                @endif

                @if (!empty($user->profile->linkedin))
                    <a href="{{ $user->profile->linkedin }}" target="_blank">
                        <x-fab-linkedin-in class="h-4 text-theme-blue-200" />
                    </a>
                @endif
                </div>
            </div>
        </x-slot>

        <x-slot name="image">
            <img class="max-w-xl" src="{{ asset($user->profile_photo_url) }}" alt="Authors">
        </x-slot>
    </x-slot>

    <section class="container mx-auto">

        <header class="flex flex-col py-8 mt-8 mb-12 space-y-8 text-center">
            <h2 class="font-serif text-4xl font-bold">Michelle's latest posts</h2>
            <hr class="self-center w-40 border-b-4 border-theme-blue-200">
        </header>

        <div class="post-container">

            {{-- Single Post --}}
            @foreach ($user->posts as $post)
                <x-posts.latest :post="$post" />
            @endforeach

        </div>


    </section>

</x-guest-layout>
