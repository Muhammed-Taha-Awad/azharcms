@php
    Theme::set('pageTitle', $project->name);
    Theme::set('headerStyle', theme_option('header_style', 'style-1'));
    Theme::set('headerTopStyle',theme_option('header_top_sidebar_style', 'style-1'));
@endphp

<section class="project-details-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="project-details-wrap">
                    <div class="row">
                        @if ($image = $project->image)
                            <div class="col-71">
                                <div class="project-details-thumb">
                                    {{ RvMedia::image($image, $project->name) }}
                                </div>
                            </div>
                        @endif
                        <div class="col-29">
                            <div class="project-details-info">
                                <h4 class="title">{{ __('Project Information') }}</h4>
                                <ul class="list-wrap">
                                    @if($project->client)
                                        <li><span class="me-1">{{ __('Client') }}:</span>{{ $project->client }}</li>
                                    @endif
                                    @if($project->start_date)
                                        <li><span class="me-1">{{ __('Date') }}:</span>{{ $project->start_date->translatedFormat('M d, Y') }}
                                        </li>
                                    @endif
                                    @if ($project->category)
                                        <li><span class="me-1">{{ __('Category') }}:</span> <a href="{{ $project->category->url }}">{{ $project->category->name }}</a></li>
                                    @endif
                                    @if ($project->author)
                                        <li><span class="me-1">{{ __('Author') }}:</span> {{ $project->author }}</li>
                                    @endif
                                    @if($project->place)
                                        <li><span class="me-1">{{ __('Place') }}:</span> {{ $project->place }}</li>
                                    @endif
                                    <li class="social">
                                        <span>{{ __('Share') }}:</span>

                                        <ul class="list-wrap">
                                            <li>
                                                <a
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($project->url) }}"
                                                    title="Facebook"
                                                    target="_blank"
                                                ><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://twitter.com/intent/tweet?url={{ urlencode($project->url) }}&text={{ strip_tags(SeoHelper::getDescription()) }}"
                                                    title="Twitter"
                                                    target="_blank"
                                                ><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://pinterest.com/pin/create/button?media={{ urlencode(RvMedia::getImageUrl($project->image, null, false, RvMedia::getDefaultImage())) }}&url={{ urlencode($project->url) }}&description={{ strip_tags(SeoHelper::getDescription()) }}"
                                                    title="Pinterest"
                                                    target="_blank"
                                                ><i class="fab fa-pinterest-p"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="project-details-content">
                        <h2 class="title">{{ $project->name }}</h2>
                        @if ($description = $project->description)
                            <p>{!! BaseHelper::clean($description) !!}</p>
                        @endif

                        <div class="ck-content">{!! BaseHelper::clean($project->content) !!}</div>

                        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null, $project) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    {!! dynamic_sidebar('project_detail_bottom_sidebar') !!}
</section>
