<section class="team-area-two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title-two text-center mb-50">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean(nl2br($description)) !!}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($teams as $team)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="team-item-two">
                        <div class="team-thumb-two">
                            <a href="{{ $team->url }}">
                                {{ RvMedia::image($team->photo, $team->name) }}
                            </a>
                            @if ($socials = $team->socials)
                                <div class="team-social-two">
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
                                </div>
                            @endif
                        </div>
                        <div class="team-content-two">
                            <h2 class="title"><a href="{{ $team->url }}">{{ $team->name }}</a></h2>
                            <span>{{ $team->title }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
