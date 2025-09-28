<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Section title') }}</label>
        <input class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Section description') }}</label>
        <input class="form-control" name="description" value="{{ Arr::get($attributes, 'description') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('CTA label') }}</label>
        <input class="form-control" name="cta_label" value="{{ Arr::get($attributes, 'cta_label') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('CTA URL') }}</label>
        <input class="form-control" name="cta_url" value="{{ Arr::get($attributes, 'cta_url') }}" />
    </div>
</div>

<hr>

@for ($i = 1; $i <= 6; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Card :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="card_title_{{ $i }}" value="{{ Arr::get($attributes, 'card_title_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" name="card_description_{{ $i }}" rows="2">{{ Arr::get($attributes, 'card_description_' . $i) }}</textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Background image') }}</label>
                {!! Form::mediaImage('card_image_' . $i, Arr::get($attributes, 'card_image_' . $i)) !!}
            </div>
        </div>
    </fieldset>
@endfor
