@if ($content && $detail)
    <div @class(['header-action d-none d-lg-block', 'action-header-style-1' => $headerStyle === 'style-1'])>
        <ul class="list-wrap">
            <li class="header-contact-two">
                <div class="icon">
                    <i class="{{ $icon }}"></i>
                </div>
                <div class="content">
                    <span>{{ $content }}</span>
                    <a dir="ltr" href="tel:{{ $detail }}">{{ $detail }}</a>
                </div>
            </li>
        </ul>
    </div>
@endif
