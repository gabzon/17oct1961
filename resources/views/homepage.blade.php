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
                @php( $search_tags = strtolower(get_the_title()) . strtolower(display_the_tags($p->ID)) )
                @php( $year = get_post_meta(get_the_ID(),'article_year', true ) )
                @if ($current_year != $year)
                    <div class="text-right sticky-top">
                        <span class="couvrefeu-text" style="position:absolute; right:5px; top:20px; background:white;">&nbsp;{{ $year }}&nbsp;&nbsp;</span>
                    </div>
                    @php( $current_year = $year)
                @endif
                @if (get_post_format( $p->ID ) === 'image')
                    <div class="pt-1" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} display:inline-block; overflow:scroll">
                        <a data-toggle="modal" data-target=".image-zoom">
                            @php(the_content())
                        </a>
                        <!-- Modal -->
                        <div class="modal fade image-zoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content text-center">
                                    @php(the_content())
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="p-1" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} display:inline-block; overflow:scroll">                        
                        @php( the_content() )
                    </div>
                @endif
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
            $(".articles div").show();
            // Non related element will be hidden after input
            $(".articles div").not("[data-label*="+ input.toLowerCase() +"]").hide();

            // For Search Variable, total number of lists and number of matched elements
            var total = $(".articles div").length;
            var matched = $(".articles div[data-label*="+ input +"]").length;
            if(input.length > 0){
                $('.input').show();
                $('.input').html('Searched for "' + input + '" (' + matched + ' Matched out of ' + total + ' )');
            } else {
                $('.input').hide();
                $(".articles div").show();
            }
        });
    });
    </script>
@endsection
