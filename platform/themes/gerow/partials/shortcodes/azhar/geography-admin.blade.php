@php use Illuminate\Support\Arr; @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Background image') }}</label>
        {!! Form::mediaImage('background_image', Arr::get($attributes, 'background_image')) !!}
    </div>
    <div class="col-md-12">
        <label class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" rows="4">{{ Arr::get($attributes, 'description') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button label') }}</label>
        <input class="form-control" name="button_label" value="{{ Arr::get($attributes, 'button_label') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button URL') }}</label>
        <input class="form-control" name="button_url" value="{{ Arr::get($attributes, 'button_url') }}" />
    </div>
</div>













