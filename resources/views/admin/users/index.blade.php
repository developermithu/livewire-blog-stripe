<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Email</x-table.head>
                        <x-table.head>Subscripton Name & Status</x-table.head>
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Joined Date</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($users as $user)
                    <tr>
                        <x-table.data>
                            <div>{{ $user->name() }}</div>
                        </x-table.data>
                        <x-table.data>
                            <div>{{ $user->email() }}</div>
                        </x-table.data>
                        <x-table.data>
                            <div>
                                @foreach ($user->subscriptions as $subscription)
                                    {{ $subscription->name }},
                                    {{ $subscription->stripe_status }}
                                @endforeach
                            </div>
                        </x-table.data>
                        <x-table.data>
                            <div class="p-1.5 text-center text-sm text-gray-700 bg-green-200 rounded">
                                @if ($user->isAdmin())
                                    <span>Admin</span>

                                @elseif($user->isSuperAdmin())
                                    <span>Super Admin</span>

                                @elseif($user->isWriter())
                                    <span>Writer</span>

                                @elseif($user->isModerator())
                                    <span>Moderator</span>

                                @elseif($user->isDefault())
                                    <span>Normal User</span>
                                @endif
                            </div>
                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">{{ $user->joinedAt() }}</div>
                        </x-table.data>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-5"> {{ $users->links() }} </div>

    </section>
</x-app-layout>
