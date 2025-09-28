@php use Illuminate\Support\Arr; use Illuminate\Support\Str; @endphp
@php
     = collect(range(1, 6))->map(function (
        
    ) use (
        
    ) {
         = ->{"tab_title_{}"} ?? null;
         = ->{"tab_content_{}"} ?? null;

        if (!  && ! ) {
            return null;
        }

        return (object) [
            'title' =>  ?: __('Tab :number', ['number' => ]),
            'content' => ,
            'id' => ->{"tab_id_{}"} ?: \\Illuminate\\Support\\Str::slug( ?: 'tab-' . ),
        ];
    })->filter()->values();

     = (int) (->active_tab ?? 1) - 1;
    if ( < 0 ||  >= ->count()) {
         = 0;
    }
@endphp

@if (
    ->isNotEmpty()
)
    <section class="about-tabs-section">
        <div class="about-tabs-container">
            <nav class="tabs-nav">
                <ul class="tabs-list">
                    @foreach ( as )
                        @php
                             = ->index === ;
                        @endphp
                        <li>
                            <a class="tab-link {{  ? 'active-tab' : '' }}" href="#{{ ->id }}" data-tab-target="{{ ->id }}">
                                {{ ->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="tabs-content-wrapper">
            @foreach ( as )
                @php
                     = ->index === ;
                @endphp
                <div id="{{ ->id }}" class="tab-content {{  ? 'active-content' : '' }}">
                    <div class="ck-content">
                        {!! BaseHelper::clean(->content) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif

