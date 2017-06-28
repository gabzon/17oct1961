{{--
Template Name: Homepage 2
--}}

@extends('layouts.couvrefeu')

@php( $query = get_terms(['taxonomy' => 'annee']) )

@section('content')
    <input type="text" id="input"  onfocus="this.value = '';" value="Start Searching" style="margin-top: 100px;"/>
    @foreach ($query as $term)
        @php
        $posts = get_posts([
            'post_type'     => 'post',
            'numberposts'   => -1,
            'tax_query'     => array(
                [ 'taxonomy' => 'annee', 'field' => 'id', 'terms' => $term->term_id ]
            )
        ]);
        @endphp
        @if ($term->name === date('Y'))
            @php( $current_year = 'text-white bg-danger' )
        @else
            @php( $current_year = '' )
        @endif
        <div id="datafetch">
            <div class="mt-1 pt-1{{$current_year}}">
                <div class="sticky-top float-lg-right pr-5">
                    <h5 class="year" style="padding-top: 30px; transform:rotate(90deg); margin-right:-60px; margin-top:10px;">{{ $term->name }}</h5>
                </div>
                @foreach ($posts as $p)
                    @if (get_post_meta($p->ID,'width', true))
                        @php( $width = 'width: ' . get_post_meta($p->ID,'width', true)  . 'px;' )
                    @endif
                    @if (get_post_meta($p->ID,'height', true))
                        @php( $height = 'height: ' . get_post_meta($p->ID,'height', true) . 'px;' )
                    @endif

                    <div class="mt-1 pt-1 article" style="{{ $width }} {{ $height }} display:inline-block; overflow:scroll" data-label="{{ display_the_tags($p->ID) }}">
                        <img src="{{get_the_post_thumbnail_url($p->ID)}}" alt="" class="img-fluid">
                        <!-- Button trigger modal -->
                        @if (get_post_format( $p->ID ) === 'image')
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target=".image-zoom">
                                Launch demo modal
                            </a>

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
                        @endif

                        {{-- <strong>{{$p->post_title}}</strong> --}}
                        @php
                        //$p->post_content
                        echo apply_filters( 'the_content', get_post_field('post_content', $p->ID) );
                        @endphp
                        <div class="panel">
                            {{ $p->post_title }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        <script type="text/javascript">

        jQuery(document).ready(function() {
            // Read the value of text field when key is up
            $('#input').on( "keyup", function() {
                // get the value from text field
                var input = $(this).val();
                // check wheather the matching element exists
                // by default every list element will be shown
                $("#datafetch .article").show();
                // Non related element will be hidden after input
                $("#datafetch .article").not("[data-label*="+ input +"]").hide();

            });
        });
        </script>
    </div>
@endsection
