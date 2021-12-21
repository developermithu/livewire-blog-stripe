<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('All Tags') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Image</x-table.head>
                        <x-table.head>Slug</x-table.head>
                        <x-table.head class="text-center">Created At</x-table.head>
                        <x-table.head class="text-center">Action</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($tags as $tag)
                    <tr>
                        <x-table.data>
                            <div>{{ $tag->name() }}</div>
                        </x-table.data>

                        <x-table.data>
                            <a href="{{ asset('storage/' .$tag->imagePath()) }}" target="blank">
                                <img src="{{ asset('storage/' .$tag->imagePath()) }}" alt="img" class=" w-20">
                            </a>
                        </x-table.data>

                        <x-table.data>
                            <div>{{ $tag->slug(30) }}</div>
                        </x-table.data>

                        <x-table.data>
                            <div>{{ $tag->createdAt() }}</div>
                        </x-table.data>
                        
                        <x-table.data>
                           <div class="flex items-center justify-center space-x-3">
                            <a class="p-1 bg-blue-200 rounded" href="{{ route('admin.tags.edit', $tag) }}">Edit</a>
                            <x-form class="p-1 bg-red-500 text-white rounded" action="{{ route('admin.tags.destroy', $tag) }}" method="DELETE">
                                <button type="submit">
                                    Delete
                                </button>
                            </x-form>
                           </div>
                        </x-table.data>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-5"> {{ $tags->links() }} </div>

    </section>
</x-app-layout>
