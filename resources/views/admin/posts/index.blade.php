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
                        <x-table.head>Image</x-table.head>
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
                            <div>
                                <img width="60" src="{{ asset('storage/media/posts/' .$post->image()) }}" alt="photo">
                            </div>
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
                            <div class="flex items-center justify-center space-x-3">
                             <a class="p-1 bg-blue-200 rounded" href="{{ route('admin.posts.edit', $post) }}">Edit</a>

                             <x-form class="p-1 bg-red-500 text-white rounded" action="{{ route('admin.posts.destroy', $post) }}" method="DELETE">
                                 <button type="submit"> Delete </button>
                             </x-form>
                            </div>
                         </x-table.data>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-5"> {{ $posts->links() }} </div>

    </section>
</x-app-layout>
