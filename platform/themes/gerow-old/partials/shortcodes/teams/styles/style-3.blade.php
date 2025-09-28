<section class="team-area-four pt-120 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title-two text-center mb-50 tg-heading-subheading animation-style2">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title tg-element-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean(nl2br($description)) !!}</p>
                    @endif
                </div>
            </div>
        </div>
        @if (count($teams) > 0)
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
                        <div class="team-item-four">
                            <div class="team-thumb-four">
                                {{ RvMedia::image($team->photo, $team->name) }}

                                <div class="team-social-three">
                                    <div class="social-toggle-icon">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    @if ($socials = $team->socials)
                                        <ul class="list-wrap">
                                            @foreach (['facebook', 'twitter', 'instagram'] as $social)
                                                @if ($url = Arr::get($socials, $social))
                                                    @switch($social)
                                                        @case('twitter')
                                                            <li>
                                                                <a href="{{ $url }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                        @break

                                                        @case('facebook')
                                                            <li>
                                                                <a href="{{ $url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                        @break

                                                        @case('instagram')
                                                            <li>
                                                                <a href="{{ $url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                                            </li>
                                                        @break
                                                    @endswitch
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="bg-social"></div>
                                    <div class="bg-social fg-social"></div>
                                </div>
                            </div>
                            <div class="team-content-four">
                                <h2 class="title"><a href="{{ $team->url }}">{{ $team->name }}</a></h2>
                                <span>{{ $team->title }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
