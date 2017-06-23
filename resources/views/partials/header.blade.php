<header class="banner navbar fixed-top navbar-toggleable-md bg-faded" style="background:transparent;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="text-header" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <nav class="nav-primary">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
            @endif
        </nav>
        <form class="form-inline my-2 my-lg-0 mx-auto">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>  
            <input id="my-search" type="text" placeholder="rechercher">
        </form>
    </div>
</header>
