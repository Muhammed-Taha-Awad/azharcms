<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">{{ __('Highlight text') }}</label>
            <input class="form-control" name="highlight_text" value="{{ data_get($attributes, 'highlight_text') }}" />
        </div>
    </div>
</div>

@for ($i = 1; $i <= 5; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Slide :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="title_{{ $i }}" value="{{ data_get($attributes, 'title_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Subtitle') }}</label>
                <input class="form-control" name="subtitle_{{ $i }}" value="{{ data_get($attributes, 'subtitle_' . $i) }}" />
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" name="description_{{ $i }}" rows="2">{{ data_get($attributes, 'description_' . $i) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Button label') }}</label>
                <input class="form-control" name="button_label_{{ $i }}" value="{{ data_get($attributes, 'button_label_' . $i) }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Button URL') }}</label>
                <input class="form-control" name="button_url_{{ $i }}" value="{{ data_get($attributes, 'button_url_' . $i) }}" />
            </div>
            <div class="col-md-12">
                <label class="form-label">{{ __('Image') }}</label>
                {!! Form::mediaImage('image_' . $i, data_get($attributes, 'image_' . $i)) !!}
            </div>
        </div>
    </fieldset>
@endfor














