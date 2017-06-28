{{--
Template Name: Homepage 3
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
        <ul id="articles">
            @while ($query->have_posts())
                @php( $query->the_post() )
                @php
                $search_tags = strtolower(get_the_title()) . strtolower(display_the_tags($p->ID));
                @endphp
                @if ($current_year != get_post_meta(get_the_ID(),'article_year', true ))
                    <li class="sticky-top float-lg-right pr-5" style="display: block;">
                        <h5 class="year" style="padding-top: 30px; transform:rotate(90deg); margin-right:-60px; margin-top:10px;">{{ get_post_meta(get_the_ID(),'article_year', true ) }}</h5>
                    </li>
                    @php( $current_year = get_post_meta(get_the_ID(),'article_year', true ) )
                @else
                    @if (get_post_format( $p->ID ) === 'image')
                        <li data-label="{{ $search_tags }}" style="{{ display_styles(get_the_ID()) }} display:inline; overflow:scroll">
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target=".image-zoom">
                                @php(the_content())
                            </a>
                            <h4>{{  get_the_title() }}</h4>
                            <h6>{{ get_post_meta(get_the_ID(),'article_year', true )}}</h6>
                        </li>
                        <!-- Modal -->
                        <div class="modal fade image-zoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content text-center">
                                    @php
                                    echo apply_filters( 'the_content', get_post_field('post_content', $p->ID) );
                                    @endphp
                                </div>
                            </div>
                        </div>
                    @else
                        <li data-label="{{ $search_tags }}" style="display:inline-block; overflow:scroll">
                            <h1>{{  get_the_title() }}</h1>
                            <h6>{{ get_post_meta(get_the_ID(),'article_year', true )}}</h6>
                        </li>
                    @endif
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
