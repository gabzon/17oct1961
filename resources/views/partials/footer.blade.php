@php( $text_arabe = 'ماع سيراب ةرزجم 1961' )
<span id="website-footer">
    <a class="footer-text couvrefeu-text" style="position:fixed; bottom: 120px; left:-100px; font-size:28px;" href="{{ home_url('/') }}">{{ $text_arabe }}</a>
</span>
<footer class="content-info navbar fixed-bottom">
    <div class="container">
        @php(dynamic_sidebar('sidebar-footer'))
    </div>
</footer>
