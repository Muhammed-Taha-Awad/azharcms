@include(Theme::getThemeNamespace() . '::partials.shortcodes.azhar._repeater-assets')

@php
    $locations = azhar_decode_shortcode_json_attribute($attributes, 'locations');

    if (! is_array($locations) || empty($locations)) {
        $locations = collect(range(1, 4))
            ->map(function ($index) use ($attributes) {
                $title = data_get($attributes, "location_title_{$index}");
                $phone = data_get($attributes, "location_phone_{$index}");
                $address = data_get($attributes, "location_address_{$index}");
                $linkLabel = data_get($attributes, "location_link_label_{$index}");
                $linkUrl = data_get($attributes, "location_link_url_{$index}");
                $mapEmbed = data_get($attributes, "location_map_embed_{$index}");
                $mapUrl = data_get($attributes, "location_map_url_{$index}");

                if (! $title && ! $phone && ! $address && ! $linkLabel && ! $linkUrl && ! $mapEmbed && ! $mapUrl) {
                    return null;
                }

                return [
                    'title' => $title,
                    'phone' => $phone,
                    'address' => $address,
                    'link_label' => $linkLabel,
                    'link_url' => $linkUrl,
                    'map_embed' => $mapEmbed,
                    'map_url' => $mapUrl,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
@endphp

<div class="azhar-repeater">
    <input type="hidden" name="locations" data-azhar-repeater-json="locations" value='@json($locations)' />
<div data-repeater-list="locations">
    @forelse ($locations as $location)
        <div data-repeater-item class="border rounded-3 p-3 mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-sm btn-outline-danger" data-repeater-delete>&times;</button>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" name="title" value="{{ data_get($location, 'title') }}" placeholder="{{ __('City Office') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Phone number') }}</label>
                    <input class="form-control" name="phone" value="{{ data_get($location, 'phone') }}" placeholder="+966 12 345 6789" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Address') }}</label>
                    <textarea class="form-control" name="address" rows="2" placeholder="{{ __('Enter the address') }}">{{ data_get($location, 'address') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Directions label') }}</label>
                    <input class="form-control" name="link_label" value="{{ data_get($location, 'link_label') }}" placeholder="{{ __('Get Directions') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Directions URL') }}</label>
                    <input class="form-control" name="link_url" value="{{ data_get($location, 'link_url') }}" placeholder="https://maps.google.com/..." />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Map embed (iframe)') }}</label>
                    <textarea class="form-control" name="map_embed" rows="3" placeholder="{{ __('Paste an iframe embed code') }}">{{ data_get($location, 'map_embed') }}</textarea>
                    <small class="form-text text-muted">{{ __('If provided, this HTML embed will be used instead of the map URL.') }}</small>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Map URL') }}</label>
                    <input class="form-control" name="map_url" value="{{ data_get($location, 'map_url') }}" placeholder="https://www.google.com/maps?..." />
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
                    <input class="form-control" name="title" placeholder="{{ __('City Office') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Phone number') }}</label>
                    <input class="form-control" name="phone" placeholder="+966 12 345 6789" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Address') }}</label>
                    <textarea class="form-control" name="address" rows="2" placeholder="{{ __('Enter the address') }}"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Directions label') }}</label>
                    <input class="form-control" name="link_label" placeholder="{{ __('Get Directions') }}" />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Directions URL') }}</label>
                    <input class="form-control" name="link_url" placeholder="https://maps.google.com/..." />
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Map embed (iframe)') }}</label>
                    <textarea class="form-control" name="map_embed" rows="3" placeholder="{{ __('Paste an iframe embed code') }}"></textarea>
                    <small class="form-text text-muted">{{ __('If provided, this HTML embed will be used instead of the map URL.') }}</small>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('Map URL') }}</label>
                    <input class="form-control" name="map_url" placeholder="https://www.google.com/maps?..." />
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-3">
    <button type="button" class="btn btn-outline-primary" data-repeater-create>
        {{ __('Add location') }}
    </button>
</div>
</div>

















