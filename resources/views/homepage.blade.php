{{--
Template Name: Homepage
--}}

@extends('layouts.couvrefeu')

@php( $query = get_terms(['taxonomy' => 'annee']) )

@section('content')
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
            @php( $current_year = 'bg-info' )
        @endif
        <div class="mt-5 p-5 {{$current_year}}">
            <div class="sticky-top float-lg-right">
                <h5 class="year" style="padding-top: 30px; transform:rotate(90deg); margin-right:-50px">{{ $term->name }}</h5>
            </div>
            @foreach ($posts as $p)
                <div class="m-4 p-2 bd-callout bd-callout-danger" style="width:{{ get_post_meta($p->ID,'width', true)}}px; height:{{ get_post_meta($p->ID,'height', true)}}px; display:inline-block; overflow:scroll">
                    <img src="{{get_the_post_thumbnail_url($p->ID)}}" alt="" class="img-fluid">
                    <strong>{{$p->post_title}}</strong>
                    {{$p->post_content}}
                    @php
                        echo apply_filters( 'the_content', get_post_field('post_content', $p->ID) );
                    @endphp

                </div>
            @endforeach
        </div>
    @endforeach
@endsection
