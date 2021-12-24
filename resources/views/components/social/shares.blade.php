<div class="flex flex-wrap gap-3">

    <x-buttons.social target="_blank" href="https://www.facebook.com/sharer.php?u={{ $url }}">
        <x-fab-facebook-f class="w-5 h-5" />
    </x-buttons.social>

    <x-buttons.social target="_blank" href="https://twitter.com/share?url={{ $url }}&text={{ $post->title }}&via=developermithu&hashtags=php,laravel">
        <x-fab-twitter class="w-5 h-5" />
    </x-buttons.social>

    <x-buttons.social target="_blank">
        <x-fab-whatsapp class="w-5 h-5" />
    </x-buttons.social>

    <x-buttons.social target="_blank" href="https://www.linkedin.com/shareArticle?url={{ $url }}&title={{ $post->title }}">
        <x-fab-telegram-plane class="w-5 h-5" />
    </x-buttons.social>

</div>