<span id="website-title">
    <a class="text-header couvrefeu-text" href="{{ home_url('/') }}" style="position:fixed; top: 100px; left:-72px;">{{ get_bloginfo('name', 'display') }}</a>
</span>
<header class="banner navbar fixed-top navbar-toggleable-md bg-faded" style="background:transparent; z-index:2;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <nav class="nav-primary">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
            @endif
        </nav>
        <form class="form-inline my-2 my-lg-0 mx-auto">
            → &nbsp;
            <input id="search-input" name="keyword" type="text" placeholder="rechercher" onfocus="this.value = '';" style="outline: none; font-family:'SuisseIntl';">
        </form>
    </div>
</header>
