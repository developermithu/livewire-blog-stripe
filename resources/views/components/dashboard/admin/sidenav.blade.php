<aside class="min-h-screen col-span-1 px-8 bg-gray-800 text-white shadow">
    <div class="py-6 space-y-7">

        @unlesswriter
        {{-- User --}}
        <div>
            <x-sidenav.admin.title>
                {{ __('User') }}
            </x-sidenav.admin.title>
            <div>
                <x-sidenav.admin.link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                    <x-zondicon-user class="w-3 text-theme-blue-100" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.admin.link>
            </div>
        </div>

        {{-- Writers --}}
        <div>
            <x-sidenav.admin.title>
                {{ __('Writers') }}
            </x-sidenav.admin.title>
            <div>
                <x-sidenav.admin.link href="{{ route('admin.writers.index') }}" :active="request()->routeIs('admin.writers.index')">
                    <x-zondicon-user class="w-3 text-theme-blue-100" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.admin.link>
            </div>
        </div>
        @endunless

        {{-- Post --}}
        <div>
            <x-sidenav.admin.title>
                {{ __('Post') }}
            </x-sidenav.admin.title>

            <div>
            @writer
                <x-sidenav.admin.link href="{{ route('admin.writer.posts.index') }}" :active="request()->routeIs('admin.writer.posts.index')">
                    <x-zondicon-user class="w-3 text-theme-blue-100" />
                    <span>{{ __('Posts') }}</span>
                </x-sidenav.admin.link>

            @else
                <x-sidenav.admin.link href="{{ route('admin.posts.index') }}" :active="request()->routeIs('admin.posts.index')">
                    <x-zondicon-user-group class="w-3 text-theme-blue-100" />
                    <span>{{ __('Posts') }}</span>
                </x-sidenav.admin.link>
                @endwriter
            </div>

        </div>

        @unlesswriter
        {{-- Tag --}}
        <div>
            <x-sidenav.admin.title>
                {{ __('Tag') }}
            </x-sidenav.admin.title>
            <div>
                <x-sidenav.admin.link href="{{ route('admin.tags.index') }}" :active="request()->routeIs('admin.tags.index')">
                    <x-zondicon-user class="w-3 text-theme-blue-100" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.admin.link>
            </div>

            <div>
                <x-sidenav.admin.link href="#">
                    <x-zondicon-user-group class="w-3 text-theme-blue-100" />
                    <span>{{ __('Create') }}</span>
                </x-sidenav.admin.link>
            </div>
        </div>
        @endunless

        {{-- Auth --}}
        <div>
            <x-sidenav.admin.title>
                {{ __('Authentication') }}
            </x-sidenav.admin.title>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-sidenav.admin.link href="{{ route('logout') }}" onclick="event.preventDefault();                                               this.closest('form').submit();">
                        <x-heroicon-o-logout class="w-4 text-theme-blue-100" />
                        <span>{{ __('Logout') }}</span>
                    </x-sidenav.admin.link>
                </form>
            </div>
        </div>

    </div>
</aside>
