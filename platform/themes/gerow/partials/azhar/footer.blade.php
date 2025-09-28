@php
    $variant = $variant ?? 'dark';
    $logoCandidates = [
        theme_option('azhar_footer_logo'),
        $variant === 'light' ? theme_option('azhar_logo_light') : theme_option('azhar_logo_dark'),
        theme_option('logo'),
    ];
    $logo = collect($logoCandidates)->first(fn ($item) => ! empty($item));

    $decodeLinks = function (?string $value) {
        return collect(json_decode($value, true))
            ->filter()
            ->map(function ($item) {
                $data = collect($item)->pluck('value', 'key');

                return (object) [
                    'label' => $data->get('label'),
                    'url' => $data->get('url') ?: '#',
                ];
            })
            ->filter(fn ($item) => $item->label);
    };

    $linksLeft = $decodeLinks(theme_option('azhar_footer_links_left'));
    $linksRight = $decodeLinks(theme_option('azhar_footer_links_right'));
    $privacyLabel = theme_option('azhar_footer_privacy_label');
    $privacyUrl = theme_option('azhar_footer_privacy_url');
    $copyrightText = theme_option('azhar_footer_copyright') ?: sprintf('© %s %s. All rights reserved.', now()->format('Y'), theme_option('site_title'));

    $socialLinks = collect(json_decode(theme_option('social_links'), true))
        ->map(function ($item) {
            return collect($item)->pluck('value', 'key');
        })
        ->filter(fn ($item) => $item->get('social-name') && ($item->get('social-url') || $item->get('social-icon-image') || $item->get('social-icon')));
@endphp

<footer class="main-footer {{ $variant === 'dark' ? 'footer-dark' : 'footer-light' }}">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-logo-section">
                <div class="footer-logo">
                    <a href="{{ BaseHelper::getHomepageUrl() }}" title="{{ theme_option('site_title') }}">
                        @if ($logo)
                            {{ RvMedia::image($logo, theme_option('site_title'), attributes: ['style' => 'width: 250px;']) }}
                        @else
                            <span class="logo-text">{{ theme_option('site_title') }}</span>
                        @endif
                    </a>
                </div>
            </div>
            <div class="footer-links-section">
                <div class="footer-links-group">
                    @if ($linksLeft->isNotEmpty())
                        <ul class="footer-links">
                            @foreach ($linksLeft as $link)
                                <li><a href="{{ $link->url }}">{{ $link->label }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                    @if ($linksRight->isNotEmpty())
                        <ul class="footer-links">
                            @foreach ($linksRight as $link)
                                <li><a href="{{ $link->url }}">{{ $link->label }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="footer-social-section">
                @if ($socialLinks->isNotEmpty())
                    <p>{{ __('Follow on social media') }}</p>
                    <div class="social-links">
                        @foreach ($socialLinks as $social)
                            <a href="{{ $social->get('social-url') }}" class="social-icon" target="_blank" title="{{ $social->get('social-name') }}">
                                @if ($iconImage = $social->get('social-icon-image'))
                                    {{ RvMedia::image($iconImage, $social->get('social-name'), attributes: ['width' => 24, 'height' => 24]) }}
                                @elseif ($icon = $social->get('social-icon'))
                                    <i class="{{ $icon }}"></i>
                                @else
                                    <span class="sr-only">{{ $social->get('social-name') }}</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="footer-bottom">
            @if ($privacyLabel && $privacyUrl)
                <p><a href="{{ $privacyUrl }}">{{ $privacyLabel }}</a></p>
            @endif
            <p>{!! BaseHelper::clean($copyrightText) !!}</p>
        </div>
    </div>
</footer>
