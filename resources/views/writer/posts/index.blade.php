<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Title</x-table.head>
                        <x-table.head>Excerpt</x-table.head>
                        <x-table.head>Author</x-table.head>
                        <x-table.head class="text-center">Published At</x-table.head>
                        <x-table.head class="text-center">Action</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($posts as $post)
                    <tr>
                        <x-table.data>
                            <div>{{ $post->title() }}</div>
                        </x-table.data>

                        <x-table.data>
                            <div>{{ $post->excerpt(30) }}</div>
                        </x-table.data>

                        <x-table.data>
                            <div>{{ $post->author()->name() }}</div>
                        </x-table.data>

                        <x-table.data>
                            <div>{{ $post->publishedAt() }}</div>
                        </x-table.data>
                        
                        <x-table.data>
                            <div>Delete</div>
                        </x-table.data>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-5"> {{ $posts->links() }} </div>

    </section>
</x-app-layout>
