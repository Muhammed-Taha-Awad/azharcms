@php
    $variant = $variant ?? 'dark';
    $logoOption = $variant === 'light' ? theme_option('azhar_logo_light') : theme_option('azhar_logo_dark');
    $logo = $logoOption ?: theme_option('logo');

    $topLinks = collect(json_decode(theme_option('azhar_header_secondary_links'), true))
        ->filter()
        ->map(function ($item) {
            $data = collect($item)->pluck('value', 'key');

            return (object) [
                'label' => $data->get('label'),
                'url' => $data->get('url') ?: '#',
            ];
        })
        ->filter(fn ($item) => $item->label);

    $ctaLabel = theme_option('azhar_header_primary_button_label');
    $ctaUrl = theme_option('azhar_header_primary_button_url');
    $showLanguage = theme_option('azhar_header_show_language', true) != '0';
    $currentLocale = null;
    $supportedLocales = [];

    if (is_plugin_active('language') && $showLanguage) {
        $supportedLocales = Language::getSupportedLocales() ?: [];
        $currentLocale = Language::getCurrentLocale();
    }
@endphp

<header class="main-header {{ $variant === 'dark' ? 'header-dark' : 'header-light' }}">
    <div class="header-top">
        <div class="logo">
            <a href="{{ BaseHelper::getHomepageUrl() }}" title="{{ theme_option('site_title') }}">
                @if ($logo)
                    {{ RvMedia::image($logo, theme_option('site_title'), attributes: ['style' => 'width: 250px;']) }}
                @else
                    <span class="logo-text">{{ theme_option('site_title') }}</span>
                @endif
            </a>
        </div>
        <div class="contact-links">
            @foreach ($topLinks as $link)
                <a href="{{ $link->url }}" class="contact-link">{{ $link->label }}</a>
            @endforeach

            @if ($ctaLabel && $ctaUrl)
                <a href="{{ $ctaUrl }}" class="contact-btn">{{ $ctaLabel }}</a>
            @endif

            @if ($supportedLocales)
                @foreach ($supportedLocales as $localeCode => $properties)
                    <a
                        href="{{ Language::getLocalizedURL($localeCode) }}"
                        class="contact-link {{ $localeCode === $currentLocale ? 'active-lang' : '' }}"
                        title="{{ data_get($properties, 'lang_name') }}"
                    >
                        {{ strtoupper($localeCode) }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
    <nav class="navbar-bottom">
        {!! Menu::renderMenuLocation('main-menu', [
            'view' => 'main-menu',
            'options' => ['class' => 'nav-links'],
        ]) !!}
    </nav>
</header>
