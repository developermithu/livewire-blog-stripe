<x-app-layout>

    @push('css')
    <link rel="stylesheet" href="{{ asset('css/choices.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @endpush

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white">
            {{ __('Post: Create') }}
        </h2>
    </x-slot>

    <section class="mx-6">
        <div class="p-8">
            <x-form action="{{ route('admin.posts.store') }}" has-files>
                <div class="space-y-8">

                    {{-- Image --}}
                    <div>
                        <x-form.label for="image" value="{{ __('Image') }}" />
                        <x-form.input id="image" class="block w-full mt-1" type="file" name="image"/>
                        <x-form.error for="image" />
                    </div>

                    {{-- Title --}}
                    <div>
                        <x-form.label for="title" value="{{ __('Title') }}" />
                        <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')"   />
                        <x-form.error for="title" />
                    </div>

                    {{-- Tags --}}
                    <div>
                        <x-form.label for="tags" value="{{ __('Tags') }}" />
                        <select name="tags[]" id="tags" multiple x-data="{}" x-init=" function () { choices($el)}">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id() }}"> {{ $tag->name() }} </option>
                            @endforeach
                        </select>
                        <x-form.error for="tags" />
                    </div>

                    {{-- Body --}}
                    <div>
                        <x-form.label for="body" value="{{ __('Content') }}" />
                        {{-- <x-trix name="body" /> --}}
                        <textarea name="body" id="body" cols="30" rows="10"></textarea>
                        <x-form.error for="body" />
                    </div>

                    {{-- Photo Credit Text --}}
                    <div>
                        <x-form.label for="photo_credit_text" value="{{ __('Photo Credit Text') }}" />
                        <x-form.input id="photo_credit_text" class="block w-full mt-1" type="text" name="photo_credit_text" :value="old('photo_credit_text')"   />
                        <x-form.error for="photo_credit_text" />
                    </div>

                    {{-- Photo Credit Link --}}
                    <div>
                        <x-form.label for="photo_credit_link" value="{{ __('Photo Credit Link') }}" />
                        <x-form.input id="photo_credit_link" class="block w-full mt-1" type="text" name="photo_credit_link" :value="old('photo_credit_link')"   />
                        <x-form.error for="photo_credit_link" />
                    </div>

                    <div class="flex justify-between">
                        {{-- Published At --}}
                        <div>
                            <x-form.label for="published_at" value="{{ __('Published At') }}" />
                            <x-pikaday name="published_at" format="YYYY-MM-DD" class=" rounded-md"/>
                            <x-form.error for="published_at" />
                        </div>

                        {{-- Disable Comment --}}
                        <div>
                            <x-form.label for="is_commentable" value="{{ __('Disable Comment') }}" />
                            <x-checkbox name="is_commentable" value="1"/>
                            <x-form.error for="is_commentable" />
                        </div>

                        <div>
                            <x-form.label for="type" value="{{ __('Type') }}" />
                            <select name="type" id="type" class="rounded-md">
                                <option value="standard">Standard</option>
                                <option value="premium">Premium</option>
                            </select>
                            <x-form.error for="type" />
                        </div>
                    </div>

                    {{-- Button --}}
                    <x-buttons.primary>
                        {{ __('Create') }}
                    </x-buttons.primary>
            </x-form>
        </div>
    </section>

    @push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
      $('#body').summernote({
        placeholder: 'Content goes here..',
        tabsize: 2,
        minHeight: 200
      });
    </script>
    @endpush

</x-app-layout>
