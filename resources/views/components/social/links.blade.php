
    @if (!empty($author->profile->facebook))
        <a href="{{ $author->profile->facebook }}" target="_blank">
            <x-fab-facebook-f class="h-4 text-theme-blue-200" />
        </a>
    @endif

    @if (!empty($author->profile->twitter))
        <a href="{{ $author->profile->twitter }}" target="_blank">
            <x-fab-twitter class="h-4 text-theme-blue-200" />
        </a>
    @endif

    @if (!empty($author->profile->instagram))
        <a href="{{ $author->profile->instagram }}" target="_blank">
            <x-fab-instagram-square class="h-4 text-theme-blue-200" />
        </a>
    @endif

    @if (!empty($author->profile->linkedin))
        <a href="{{ $author->profile->linkedin }}" target="_blank">
            <x-fab-linkedin-in class="h-4 text-theme-blue-200" />
        </a>
    @endif
