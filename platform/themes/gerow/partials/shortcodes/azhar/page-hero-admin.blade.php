<div class="row g-3">
    <div class="col-12">
        <label class="form-label">{{ __('Subtitle (optional)') }}</label>
        <input class="form-control" name="subtitle" value="{{ data_get($attributes, 'subtitle') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" rows="3">{{ data_get($attributes, 'description') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Button label') }}</label>
        <input class="form-control" name="button_label" value="{{ data_get($attributes, 'button_label') }}" placeholder="{{ __('Discover') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Button URL') }}</label>
        <input class="form-control" name="button_url" value="{{ data_get($attributes, 'button_url') }}" placeholder="{{ url('/') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Background image') }}</label>
        {!! Form::mediaImage('background_image', data_get($attributes, 'background_image')) !!}
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Alignment') }}</label>
        {!! Form::customSelect('alignment', [
            'left' => __('Left'),
            'center' => __('Center'),
            'right' => __('Right'),
        ], data_get($attributes, 'alignment', 'left'), ['class' => 'form-select']) !!}
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Overlay CSS (optional)') }}</label>
        <input class="form-control" name="overlay" value="{{ data_get($attributes, 'overlay') }}" placeholder="linear-gradient(rgba(240, 244, 247, 0.9), rgba(240, 244, 247, 0.9))" />
    </div>
</div>















