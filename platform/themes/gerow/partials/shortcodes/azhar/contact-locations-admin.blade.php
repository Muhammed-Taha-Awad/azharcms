@php use Illuminate\Support\Arr; @endphp
@for ($i = 1; $i <= 4; $i++)
    <fieldset class="border rounded-3 p-3 mb-3">
        <legend class="float-none w-auto px-2">{{ __('Location :number', ['number' => $i]) }}</legend>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('Title') }}</label>
                <input class="form-control" name="location_title_{{ $i }}" value="{{ Arr::get($attributes, 'location_title_' . $i) }}" placeholder="{{ __('City Office') }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Phone number') }}</label>
                <input class="form-control" name="location_phone_{{ $i }}" value="{{ Arr::get($attributes, 'location_phone_' . $i) }}" placeholder="+966 12 345 6789" />
            </div>
            <div class="col-12">
                <label class="form-label">{{ __('Address') }}</label>
                <textarea class="form-control" name="location_address_{{ $i }}" rows="2" placeholder="{{ __('Enter the address') }}">{{ Arr::get($attributes, 'location_address_' . $i) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Directions label') }}</label>
                <input class="form-control" name="location_link_label_{{ $i }}" value="{{ Arr::get($attributes, 'location_link_label_' . $i) }}" placeholder="{{ __('Get Directions →') }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Directions URL') }}</label>
                <input class="form-control" name="location_link_url_{{ $i }}" value="{{ Arr::get($attributes, 'location_link_url_' . $i) }}" placeholder="https://maps.google.com/..." />
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Map embed (iframe)') }}</label>
                <textarea class="form-control" name="location_map_embed_{{ $i }}" rows="3" placeholder="{{ __('Paste an iframe embed code') }}">{{ Arr::get($attributes, 'location_map_embed_' . $i) }}</textarea>
                <small class="form-text text-muted">{{ __('If provided, this HTML embed will be used instead of the map URL.') }}</small>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ __('Map URL') }}</label>
                <input class="form-control" name="location_map_url_{{ $i }}" value="{{ Arr::get($attributes, 'location_map_url_' . $i) }}" placeholder="https://www.google.com/maps?..." />
            </div>
        </div>
    </fieldset>
@endfor













