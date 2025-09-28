@if ($logoImage)
    <div class="logo">
        <a href="{{ BaseHelper::getHomepageUrl() }}">
            {{ RvMedia::image($logoImage, __('Logo')) }}
        </a>
    </div>
@endif
