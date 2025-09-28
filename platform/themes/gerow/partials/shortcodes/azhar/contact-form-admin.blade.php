<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Subtitle') }}</label>
        <input class="form-control" name="subtitle" value="{{ data_get($attributes, 'subtitle') }}" placeholder="{{ __('Get in touch') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ data_get($attributes, 'title') }}" placeholder="{{ __('Send us a message') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" rows="3" placeholder="{{ __('Add an optional description...') }}">{{ data_get($attributes, 'description') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Background image') }}</label>
        {!! Form::mediaImage('image', data_get($attributes, 'image')) !!}
    </div>
    <div class="col-md-3">
        <label class="form-label">{{ __('Display fields') }}</label>
        <input class="form-control" name="display_fields" value="{{ data_get($attributes, 'display_fields', 'email,phone,address') }}" placeholder="email,phone,address" />
        <small class="form-text text-muted">{{ __('Comma separated list. Supported values: email, phone, address, subject.') }}</small>
    </div>
    <div class="col-md-3">
        <label class="form-label">{{ __('Mandatory fields') }}</label>
        <input class="form-control" name="mandatory_fields" value="{{ data_get($attributes, 'mandatory_fields', 'email') }}" placeholder="email" />
        <small class="form-text text-muted">{{ __('Comma separated list of required fields.') }}</small>
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Submit button label') }}</label>
        <input class="form-control" name="button_label" value="{{ data_get($attributes, 'button_label') }}" placeholder="{{ __('Send message') }}" />
    </div>
    <div class="col-12">
        <label class="form-label">{{ __('Footer notice') }}</label>
        <textarea class="form-control" name="notice" rows="2" placeholder="{{ __('Optional disclaimer text displayed below the form.') }}">{{ data_get($attributes, 'notice') }}</textarea>
    </div>
</div>














