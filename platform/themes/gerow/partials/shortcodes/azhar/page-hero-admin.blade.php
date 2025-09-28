@php use Illuminate\Support\Arr; @endphp
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('Subtitle (optional)') }}</label>
        <input class="form-control" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Title') }}</label>
        <input class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}" />
    </div>
    <div class="col-md-12">
        <label class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" rows="3">{{ Arr::get($attributes, 'description') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button label') }}</label>
        <input class="form-control" name="button_label" value="{{ Arr::get($attributes, 'button_label') }}" placeholder="{{ __('Discover') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Button URL') }}</label>
        <input class="form-control" name="button_url" value="{{ Arr::get($attributes, 'button_url') }}" placeholder="{{ url('/') }}" />
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Background image') }}</label>
        {!! Form::mediaImage('background_image', Arr::get($attributes, 'background_image')) !!}
    </div>
    <div class="col-md-6">
        <label class="form-label">{{ __('Alignment') }}</label>
        {!! Form::customSelect('alignment', [
            'left' => __('Left'),
            'center' => __('Center'),
            'right' => __('Right'),
        ], Arr::get($attributes, 'alignment', 'left'), ['class' => 'form-select']) !!}
    </div>
    <div class="col-md-12">
        <label class="form-label">{{ __('Overlay CSS (optional)') }}</label>
        <input class="form-control" name="overlay" value="{{ Arr::get($attributes, 'overlay') }}" placeholder="linear-gradient(rgba(240, 244, 247, 0.9), rgba(240, 244, 247, 0.9))" />
    </div>
</div>













