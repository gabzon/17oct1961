@php( $text_arabe = 'ماع سيراب ةرزجم 1961' )
<span id="website-footer">
    <a class="footer-text couvrefeu-text" style="position:fixed; bottom: 120px; left:-100px; font-size:28px;" href="{{ home_url('/') }}">{{ $text_arabe }}</a>
</span>

<footer class="content-info navbar fixed-bottom" style="padding:0">
    <div class="footer-panel text-center" style="display: none; width: 100%; height: 50px; background-color: white; border-top: 3px solid #8D4957; color:#8D4957; padding-top:10px;"></div>
    <div class="container">
        @php(dynamic_sidebar('sidebar-footer'))
    </div>
</footer>
