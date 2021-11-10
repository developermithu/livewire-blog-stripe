<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Writers') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Email</x-table.head>
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Joined Date</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($writers as $writer)
                    <tr>
                        <x-table.data>
                            <div>{{ $writer->name() }}</div>
                        </x-table.data>
                        <x-table.data>
                            <div>{{ $writer->email() }}</div>
                        </x-table.data>
                        <x-table.data>
                            <div class="p-1.5 text-center text-sm text-gray-700 bg-green-200 rounded">
                                @if ($writer->isAdmin())
                                    <span>Admin</span>

                                @elseif($writer->isWriter())
                                    <span>Writer</span>
                                @endif
                            </div>
                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">{{ $writer->joinedAt() }}</div>
                        </x-table.data>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-5"> {{ $writers->links() }} </div>

    </section>
</x-app-layout>
