{{--
Template Name: Slicker
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        @include('partials.page-header')
        @include('partials.content-page')
    @endwhile

    <div class="slicker">
        <div>
            <img src="http://localhost/couvre-feu/wp-content/uploads/2017/06/Weltreise_mit_dem_Tandem.jpg" alt="">
        </div>
        <div><img src="http://localhost/couvre-feu/wp-content/uploads/2017/06/futbol-generic-entry-point.jpg" alt=""></div>
        <div><img src="http://localhost/couvre-feu/wp-content/uploads/2017/06/putin.jpg" alt=""></div>
        <div><img src="http://localhost/couvre-feu/wp-content/uploads/2017/06/simon.jpg" alt=""></div>
        <div><img src="http://localhost/couvre-feu/wp-content/uploads/2017/06/bundeskanzlerin_angela_merkel.jpg" alt=""></div>
    </div>
@endsection
