{{--
Template Name: Homepage
--}}

@extends('layouts.couvrefeu')

@php( $query = get_terms(['taxonomy' => 'annee']) )

@section('content')

    @if (! empty( $query ) && ! is_wp_error( $query ))
        @php($previous_post_id = '')

        <div class="year-section p-2" style="margin-top:50px;" >
            @foreach ($query as $term)
                @if ($term->name === date('Y'))
                    @php( $current_year = 'text-white current-year' )
                @endif
                <div class="the-year p-2 {{$current_year}}" style="border:1px solid blue; width:100%;">
                    <div class="sticky-top float-lg-right">
                        <h5 class="year" style="padding-top: 30px; transform:rotate(90deg)">{{ $term->name }}</h5>
                    </div>
                    @php
                    $posts = get_posts([
                        'post_type'     => 'post',
                        'numberposts'   => -1,
                        'tax_query'     => array(
                            [ 'taxonomy' => 'annee', 'field' => 'id', 'terms' => $term->term_id ]
                        )
                    ]);
                    @endphp

                    @foreach ($posts as $p)
                        <div style="background:orange; width:{{ get_post_meta($p->ID,'width', true)}}px; display: inline-block;">
                            <div class="the-title uppercase text-danger">
                                <strong>{{ $p->post_title }}</strong>
                            </div>
                            <div class="the-content">
                                <img src="{{get_the_post_thumbnail_url($p->ID)}}" alt="" class="img-fluid">
                                {{ $p->post_content }}
                                {{ $p->post_permalink }}
                            </div>
                        </div>
                        <br>
                    @endforeach

                </div>
            @endforeach
        </div>

    @endif

@endsection
