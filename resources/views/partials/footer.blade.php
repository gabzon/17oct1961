@php( $text_arabe = 'ماع سيراب ةرزجم 1961' )
<span id="website-footer">
    <a class="footer-text couvrefeu-text" style="position:fixed; bottom: 120px; left:-100px; font-size:28px; color:black;" href="{{ home_url('/') }}">{{ $text_arabe }}</a>
</span>

<footer class="content-info navbar fixed-bottom" style="padding:0">
    <div class="footer-panel text-center" style="display: none; width: 100%; height: 50px; background-color: white; border-top: 3px solid #8D4957; color:#8D4957; padding-top:10px;"></div>
    <div class="container">
        @php(dynamic_sidebar('sidebar-footer'))
    </div>
</footer>
<script type="text/javascript">
function scroll_style() {
    var window_top = jQuery(window).scrollTop();
    var div_top = jQuery('.year-block.bg-warning').offset().top;
    console.log(window_top);
    console.log(div_top);
    if (window_top > div_top-400){
        jQuery('#website-footer a.footer-text').css({"color":"white"});
    }else{
        jQuery('#website-footer a.footer-text').css({"color":"black"});
    }
}
jQuery(function() {
    jQuery(window).scroll(scroll_style);
    scroll_style();
});

</script>
