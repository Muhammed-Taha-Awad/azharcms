@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php use Illuminate\Support\Str; @endphp
@php
    $slides = azhar_decode_shortcode_json_attribute($attributes, 'slides');

    if (! is_array($slides) || empty($slides)) {
        $slides = collect(range(1, 5))
            ->map(function ($index) use ($attributes) {
                $title = data_get($attributes, "title_{$index}");
                $subtitle = data_get($attributes, "subtitle_{$index}");
                $description = data_get($attributes, "description_{$index}");
                $buttonLabel = data_get($attributes, "button_label_{$index}");
                $buttonUrl = data_get($attributes, "button_url_{$index}");
                $image = data_get($attributes, "image_{$index}");

                if (! $title && ! $subtitle && ! $description && ! $buttonLabel && ! $buttonUrl && ! $image) {
                    return null;
                }

                return [
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'description' => $description,
                    'button_label' => $buttonLabel,
                    'button_url' => $buttonUrl,
                    'image' => $image,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
@endphp

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">{{ __('Highlight text') }}</label>
        <input class="form-control" name="highlight_text" value="{{ data_get($attributes, 'highlight_text') }}" />
    </div>
</div>

<hr>

<div class="azhar-repeater">
    <input type="hidden" name="slides" data-azhar-repeater-json="slides" value='@json($slides)' />
<div data-repeater-list="slides">
    @forelse ($slides as $slide)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($slide, 'title') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Subtitle') }}</label>
                    <input class="form-control" name="subtitle" value="{{ data_get($slide, 'subtitle') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="2">{{ data_get($slide, 'description') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Button label') }}</label>
                    <input class="form-control" name="button_label" value="{{ data_get($slide, 'button_label') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Button URL') }}</label>
                    <input class="form-control" name="button_url" value="{{ data_get($slide, 'button_url') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Image') }}</label>
                    {!! Form::mediaImage('image', data_get($slide, 'image'), ['value' => data_get($slide, 'image')]) !!}
                </div>
            </div>
        </div>
    @empty
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Subtitle') }}</label>
                    <input class="form-control" name="subtitle" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" rows="2"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Button label') }}</label>
                    <input class="form-control" name="button_label" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Button URL') }}</label>
                    <input class="form-control" name="button_url" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Image') }}</label>
                    {!! Form::mediaImage('image', null) !!}
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add slide') }}
    </button>
</div>
</div>










