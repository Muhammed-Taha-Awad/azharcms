<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Subtitle') }}</label>
        <input class="form-control" name="subtitle" value="{{ data_get($attributes, 'subtitle') }}" placeholder="{{ __('Our 2024 Sustainability Report') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" placeholder="{{ __('Our 2024 Sustainability Report') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" rows="4" placeholder="{{ __('Add a short summary for the report') }}">{{ data_get($attributes, 'description') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button label') }}</label>
        <input class="form-control" name="button_label" value="{{ data_get($attributes, 'button_label') }}" placeholder="{{ __('View the report') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button URL') }}</label>
        <input class="form-control" name="button_url" value="{{ data_get($attributes, 'button_url') }}" placeholder="https://example.com/report.pdf" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('image', data_get($attributes, 'image')) !!}
    </div>
</div>














