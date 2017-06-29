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
    //$current_year = '';
    @endphp

    @if ( $query->have_posts() )
        <div class="mt-5 articles">
            @while ($query->have_posts())
                @php( $query->the_post() )
                @php( $year = get_post_meta(get_the_ID(),'article_year', true ) )
                @if ($current_year != $year)
                    <div class="text-right sticky-top">
                        <span class="couvrefeu-text" style="position:absolute; right:5px; top:20px; background:white;">&nbsp;{{ $year }}&nbsp;&nbsp;</span>
                    </div>
                    @php( $current_year = $year)
                @endif
                @include('partials.article')
            @endwhile
        </div>
        @php(wp_reset_postdata())
    @else
        // no posts found
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
