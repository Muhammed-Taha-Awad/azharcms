@php
    $locations = collect(data_get($shortcode, 'locations', []))
        ->map(function ($location) {
            return (object) [
                'title' => data_get($location, 'title'),
                'address' => data_get($location, 'address'),
                'phone' => data_get($location, 'phone'),
                'directions_label' => data_get($location, 'link_label') ?: __('Get Directions'),
                'directions_url' => data_get($location, 'link_url'),
                'map_embed' => data_get($location, 'map_embed'),
                'map_url' => data_get($location, 'map_url'),
            ];
        })
        ->filter(function ($location) {
            return $location->title || $location->address || $location->phone || $location->map_embed || $location->map_url;
        });

    if ($locations->isEmpty()) {
        $locations = collect(range(1, 4))->map(function ($index) use ($shortcode) {
            $title = $shortcode->{"location_title_{$index}"} ?? null;
            $address = $shortcode->{"location_address_{$index}"} ?? null;
            $phone = $shortcode->{"location_phone_{$index}"} ?? null;
            $directionsLabel = $shortcode->{"location_link_label_{$index}"} ?? null;
            $directionsUrl = $shortcode->{"location_link_url_{$index}"} ?? null;
            $mapEmbed = $shortcode->{"location_map_embed_{$index}"} ?? null;
            $mapUrl = $shortcode->{"location_map_url_{$index}"} ?? null;

            if (! $title && ! $address && ! $phone && ! $mapEmbed && ! $mapUrl) {
                return null;
            }

            return (object) [
                'title' => $title,
                'address' => $address,
                'phone' => $phone,
                'directions_label' => $directionsLabel ?: __('Get Directions'),
                'directions_url' => $directionsUrl,
                'map_embed' => $mapEmbed,
                'map_url' => $mapUrl,
            ];
        })->filter();
    }
@endphp

@if ($locations->isNotEmpty())
    <section class="locations-section">
        <div class="locations-container">
            @foreach ($locations as $location)
                <div class="location-card">
                    <div class="map-image-placeholder">
                        @if ($location->map_embed)
                            {!! $location->map_embed !!}
                        @elseif ($location->map_url)
                            <iframe
                                src="{{ $location->map_url }}"
                                width="100%"
                                height="300"
                                style="border:0;"
                                allowfullscreen
                                loading="lazy"
                            ></iframe>
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($location->title)
                            <h3 class="location-title">{{ $location->title }}</h3>
                        @endif
                        @if ($location->address)
                            <p class="location-address">{{ $location->address }}</p>
                        @endif
                        @if ($location->phone)
                            <p class="location-phone">{{ $location->phone }}</p>
                        @endif
                        @if ($location->directions_url)
                            <a class="get-directions" href="{{ $location->directions_url }}" target="_blank" rel="noopener">
                                {{ $location->directions_label }}
                            </a>
                        @elseif ($location->directions_label)
                            <span class="get-directions">{{ $location->directions_label }}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif

