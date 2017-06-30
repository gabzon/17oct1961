{{--
Template Name: Homepage
--}}

@extends('layouts.couvrefeu')
@section('content')
    @while(have_posts()) @php(the_post())
        @include('partials.content-page')
    @endwhile
    @php
    $args = [
        'post_type'         => 'post',
        'posts_per_page'    => -1,
        'meta_key'          => 'article_year',
        'orderby'           => 'meta_value',
        'order'             => 'ASC'
    ];
    $query = new WP_Query( $args );
    $current_year = '0';
    $year_block_state = 'start';

    @endphp


    @if ( $query->have_posts() )
        <div class="mt-5 articles">
            @while ($query->have_posts())
                @php( $query->the_post() )
                @php( $year = get_post_meta(get_the_ID(),'article_year', true ) )
                @if ($year === date('Y'))
                    @php( $current_year_color = 'text-white bg-warning' )
                @else
                    @php( $current_year_color = '' )
                @endif
                @if ( $current_year < $year )

                    @if ($year_block_state === 'start')
                        @php( $search_tags = display_search_keywords( get_the_ID() ) )
                        <div class="year-block mt-3 {{ $current_year_color }}">
                            <div class="text-right sticky-top pt-5 cf-article" style="z-index:1;" data-label="{{$search_tags}}">
                                <h5 class="couvrefeu-text" style="position:absolute; right:5px; top:20px; width: 30px;">{{ $year }}</h5>
                            </div>
                            @include('partials.article')
                            @php( $year_block_state = 'inside' )
                    @else
                        </div>
                        <div class="year-block mt-3 {{ $current_year_color }}">
                            <div class="text-right sticky-top pt-5 cf-article" style="z-index:1;" data-label="{{$search_tags}}">
                                <h5 class="couvrefeu-text" style="position:absolute; right:5px; top:20px; width: 30px;">{{ $year }}</h5>
                            </div>
                        @include('partials.article')
                    @endif
                    @php( $current_year = $year )
                @elseif ($current_year === $year)
                    @include('partials.article')
                @endif
            @endwhile
        </div>
        @php(wp_reset_postdata())
    @else
        // Pas d'articles trouvé
    @endif

    <script type="text/javascript">
    // http://mobifreaks.com/coding/html5-data-attributes-search-using-jquery
    jQuery(document).ready(function() {
        $('#search-input').on( "keyup", function() {
            // get the value from text field
            var input = $(this).val();
            // check wheather the matching element exists
            // by default every list element will be shown
            $(".articles div.cf-article").show();
            // Non related element will be hidden after input
            $(".articles div.cf-article").not("[data-label*="+ input.toLowerCase() +"]").hide();

            // For Search Variable, total number of lists and number of matched elements
            var total = $(".articles div.cf-article").length;
            var matched = $(".articles div.cf-article[data-label*="+ input +"]").length;
            if(input.length > 0){
                $('.input').show();
                $('.input').html('Searched for "' + input + '" (' + matched + ' Matched out of ' + total + ' )');
            } else {
                $('.input').hide();
                $(".articles div.cf-article").show();
            }
        });
    });
    </script>
@endsection
