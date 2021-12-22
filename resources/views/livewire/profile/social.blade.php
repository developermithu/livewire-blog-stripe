<x-jet-form-section submit="updateProfileSocialLinks">
    <x-slot name="title">
        {{ __('Update Social Links') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="facebook" value="{{ __('Facebook') }}" />
            <x-jet-input id="facebook" type="text" class="mt-1 block w-full" wire:model.defer="profile.facebook" />
            <x-jet-input-error for="facebook" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="instagram" value="{{ __('Instagram') }}" />
            <x-jet-input id="instagram" type="text" class="mt-1 block w-full" wire:model.defer="profile.instagram" />
            <x-jet-input-error for="instagram" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="twitter" value="{{ __('Twitter') }}" />
            <x-jet-input id="twitter" type="text" class="mt-1 block w-full" wire:model.defer="profile.twitter" />
            <x-jet-input-error for="twitter" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="linkedin" value="{{ __('Linkedin') }}" />
            <x-jet-input id="linkedin" type="text" class="mt-1 block w-full" wire:model.defer="profile.linkedin" />
            <x-jet-input-error for="linkedin" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="updated">
            {{ __('Updated social links.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
