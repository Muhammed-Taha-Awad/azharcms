@php use Illuminate\Support\Arr; @endphp
@php
    $imageUrl = $shortcode->image ? RvMedia::getImageUrl($shortcode->image) : null;
    $notice = $shortcode->notice ?? null;
    $subtitle = $shortcode->subtitle ?? null;
    $title = $shortcode->title ?? null;
    $description = $shortcode->description ?? null;
@endphp

<section class="contact-form-section">
    <div class="contact-container">
        <div class="contact-left-image">
            <div
                class="image-placeholder"
                @if ($imageUrl)
                    style="background-image: url('{{ $imageUrl }}'); background-size: cover; background-position: center;"
                @endif
            ></div>
        </div>
        <div class="contact-form-wrapper">
            @if ($subtitle)
                <p class="section-label">{{ $subtitle }}</p>
            @endif

            @if ($title)
                <h2 class="form-title">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            @if ($description)
                <p class="form-description">{!! BaseHelper::clean($description) !!}</p>
            @endif

            @if ($form)
                <div class="contact-form-body">
                    {!! $form->renderForm() !!}
                </div>
            @else
                <div class="contact-form-body">
                    <p class="text-muted">{{ __('The contact plugin is not available at the moment.') }}</p>
                </div>
            @endif

            @if ($notice)
                <p class="contact-form-notice">{!! BaseHelper::clean($notice) !!}</p>
            @endif
        </div>
    </div>
</section>













