{{--
Template Name: Scrollmagic
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        @include('partials.page-header')
        @include('partials.content-page')

        <div class="scrollContent">
            <section id="titlechart">
                <div id="description">
                    <h1 class="badge gsap">Simple Tweening</h1>
                    <h2>Two examples of basic animation.</h2>
                    <ol>
                        <li>When no duration is defined for the scene, the tween will simply start playing when the scroll reaches the trigger position.</li>
                        <li>If the scene has a duration the progress of the tween will directly correspond to the scroll position.</li>
                    </ol>
                    <p>
                        This example uses the shorthand version of <a href="../../docs/animation.GSAP.html#Scene.setTween">Scene.setTween()</a> to add <a href="http://greensock.com/docs/#/HTML5/GSAP/TweenMax/to/" target="_blank">TweenMax.to()</a> animations.<br>
                        To see how to build more advanced tweens check out the <a href="../advanced/advanced_tweening.html">Advanced Tweening Example</a><a>.
                        </a></p><a>
                        </a><a href="#" class="viewsource">view source</a>
                    </div>
                    <script>
                    // init controller
                    var controller = new ScrollMagic.Controller();
                    </script>
                </section>
                <section class="demo">
                    <div class="spacer s2"></div>
                    <div id="trigger1" class="spacer s0"></div>
                    <div id="animate1" class="box2 skin">
                        <p>You wouldn't like me, when I'm angry!</p>
                        <a href="#" class="viewsource">view source</a>
                    </div>
                    <div class="spacer s2"></div>
                    <script>

                    </script>
                </section>
                <section class="demo">
                    <div class="spacer s1"></div>
                    <div id="trigger2" class="spacer s1"></div>
                    <div class="spacer s0"></div>
                    <div id="animate2" class="box1 black">
                        <p>Smurf me!</p>
                        <a href="#" class="viewsource">view source</a>
                    </div>
                    <div class="spacer s2"></div>
                    <script>
                    jQuery(document).ready(function(){
                        var scroll_pos = 0;
                        jQuery(".spacer").scroll(function() {
                            scroll_pos = $(this).scrollTop();
                            if(scroll_pos > 210) {
                                jQuery("spacer").css('background-color', '#1A1A1A');
                            } else {
                                jQuery("#left-panel").css('background-color', 'red');
                            }
                            console.log(scroll_pos);
                        });
                    });
                    </script>
                </section>
                <div class="spacer s_viewport"></div>
            </div>

        @endwhile
    @endsection
