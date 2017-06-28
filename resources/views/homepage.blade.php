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
    @endphp

    @if ( $query->have_posts() )
        <ul id="articles" class="mt-5">
            @while ($query->have_posts())
                @php( $query->the_post() )
                @php
                $search_tags = strtolower(get_the_title()) . strtolower(display_the_tags($p->ID));
                @endphp
                @if (get_post_format( $p->ID ) === 'image')
                    <li class="p-1" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }}">
                        <a data-toggle="modal" data-target=".image-zoom">
                            @php(the_content())
                        </a>
                        <h4>{{  get_the_title() }}</h4>
                        <h6>{{ get_post_meta(get_the_ID(),'article_year', true )}}</h6>
                        <!-- Modal -->
                        <div class="modal fade image-zoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content text-center">
                                    @php(the_content())
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="p-1" data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }}">
                        @php(the_content())
                        <h1>{{ get_the_title() }}</h1>
                        <h6>{{ get_post_meta(get_the_ID(),'article_year', true )}}</h6>
                    </li>
                @endif
            @endwhile
        </ul>

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
            $("ul li").show();
            // Non related element will be hidden after input
            $("ul li").not("[data-label*="+ input.toLowerCase() +"]").hide();

            // For Search Variable, total number of lists and number of matched elements
            var total = $("ul li").length;
            var matched = $("ul li[data-label*="+ input +"]").length;
            if(input.length > 0){
                $('.input').show();
                $('.input').html('Searched for "' + input + '" (' + matched + ' Matched out of ' + total + ' )');
            } else {
                $('.input').hide();
                $("ul li").show();
            }
        });
    });
    </script>
@endsection
