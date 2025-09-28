<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" />
    </div>
    <div class="col-md-4">
        <label class="form-label">{{ __('Default filter label') }}</label>
        <input class="form-control" name="filter_default_label" value="{{ data_get($attributes, 'filter_default_label', __('ALL INDUSTRIES')) }}" />
    </div>
    <div class="col-md-4">
        <label class="form-label">{{ __('Background image') }}</label>
        {!! Form::mediaImage('background_image', data_get($attributes, 'background_image')) !!}
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button label') }}</label>
        <input class="form-control" name="button_label" value="{{ data_get($attributes, 'button_label') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button URL') }}</label>
        <input class="form-control" name="button_url" value="{{ data_get($attributes, 'button_url') }}" />
    </div>
</div>

<hr>

<div class="row g-3">
    @for ($i = 1; $i <= 4; $i++)
        <div class="col-md-6">
            <label class="form-label">{{ __('Filter :number label', ['number' => $i]) }}</label>
            <input class="form-control" name="filter_label_{{ $i }}" value="{{ data_get($attributes, 'filter_label_' . $i) }}" />
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">{{ __('Filter :number value (optional)', ['number' => $i]) }}</label>
            <input class="form-control" name="filter_value_{{ $i }}" value="{{ data_get($attributes, 'filter_value_' . $i) }}" />
        </div>
    @endfor
</div>

<hr>

@for ($i = 1; $i <= 4; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Portfolio card :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">{{ __('Category') }}</label>
                <input class="form-control" name="card_category_{{ $i }}" value="{{ data_get($attributes, 'card_category_' . $i) }}" />
            </div>
            <div class="col-md-8">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="card_title_{{ $i }}" value="{{ data_get($attributes, 'card_title_' . $i) }}" />
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" name="card_description_{{ $i }}" rows="3">{{ data_get($attributes, 'card_description_' . $i) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Link label') }}</label>
                <input class="form-control" name="card_link_label_{{ $i }}" value="{{ data_get($attributes, 'card_link_label_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Link URL') }}</label>
                <input class="form-control" name="card_link_url_{{ $i }}" value="{{ data_get($attributes, 'card_link_url_' . $i) }}" />
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Image') }}</label>
                {!! Form::mediaImage('card_image_' . $i, data_get($attributes, 'card_image_' . $i)) !!}
            </div>
        </div>
        @if ($i === 1)
            <p class="text-muted small mt-2">{{ __('Card :number is displayed as the featured item with image on the right and CTA button.', ['number' => 1]) }}</p>
        @endif
    </fieldset>
@endfor














