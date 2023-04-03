<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-wf-page="5af3ec4ed6bc3607ab18b99b" data-wf-site="5af3ec4ed6bc367a3518b995">
<head>
    <meta charset="utf-8">
    <title>
        @isset($title)
            {{ $title }} |
        @endisset
            inovacio.sk
    </title>
    <meta content="Projekty interiérov a dizajn nábytku. Tvorime projekty interiérov rodinných domov, bytov a verejných priestorov. Ukážkové projekty a ceny na webe. Návrh interiéru Zvolen, Banská Bystrica, Detva, Žiar nad Hronom, Žarnovica, Nitra, Zlaté Moravce, Topoľčany, Partizánske, Bánovce nad Bebravou, Martin, Žilina, Trenčín" name="description">
    <meta content="inovacio.sk - Projekty interiérov a dizajn nábytku." property="og:title">
    <meta content="Projekty interiérov a dizajn nábytku. Tvorime projekty interiérov rodinných domov, bytov a verejných priestorov. Ukážkové projekty a ceny na webe. Návrh interiéru Zvolen, Banská Bystrica, Detva, Žiar nad Hronom, Žarnovica, Nitra, Zlaté Moravce, Topoľčany, Partizánske, Bánovce nad Bebravou, Martin, Žilina, Trenčín" property="og:description">
    <meta content="summary" name="twitter:card">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/inovacio-firma.webflow.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]  }});</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="{{ asset('images/32_132.png') }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ asset('images/256.png') }}" rel="apple-touch-icon">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>
    <script type="text/javascript" id="cookiebanner" src="https://cdn.jsdelivr.net/gh/dobarkod/cookie-banner@1.2.1/dist/cookiebanner.min.js" data-position="top" data-font-family="montserrat" data-close-style="float:right;padding-left:5px;" data-zindex="1001" data-linkmsg="Viac informácií.." data-message="Použivame cookies, aby sme vedeli lepšie poskytovať naše služby.">
    </script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
</head>

<body class="body">
  <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
    <div class="w-container"><a href="{{ route('index') }}" class="brand w-nav-brand"><img src="images/logo.png" width="234" class="image"><h1 class="textbrand"><span class="text-span-3">inovacio</span></h1></a>
      <nav role="navigation" class="nav-menu w-nav-menu">
        <div data-delay="0" class="w-dropdown">
          <div class="dropdown-toggle-3 w-dropdown-toggle"></div>
          <nav class="w-dropdown-list"><a href="#" class="w-dropdown-link">Link 1</a><a href="#" class="w-dropdown-link">Link 2</a><a href="#" class="w-dropdown-link">Link 3</a></nav>
        </div>
        <a href="{{ route('index') }}" class="nav-link-2 w-nav-link {{ $nav_index or ''  }}">miestnosti</a>
        <a href="{{ route('cennik') }}" class="nav-link-2 w-nav-link {{ $nav_cennik or ''  }}">cenník</a>
        <a href="{{ route('postup-prace') }}" class="nav-link-2 w-nav-link {{ $nav_postup or ''  }}">postup práce</a>
        <a href="{{ route('realizacie') }}" class="nav-link-2 w-nav-link {{ $nav_realizacie or ''  }}">realizácie</a>
        <a href="{{ route('kontakt') }}" class="nav-link-2 w-nav-link {{ $nav_kontakt or ''  }}">kontakt</a>
          @if (Auth::guard('users')->check())
          <a class="nav-link-2 w-nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
          @else
          @endif
          </nav>
      <div class="menu-button w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="div-block">
    <div class="section">
      <div data-delay="4000" data-animation="fade" data-autoplay="1" data-duration="1500" data-infinite="1" class="slider w-slider">
        <div class="w-slider-mask">
          <div class="slide1 w-slide">
            <div class="motto-right w-container">
              <p class="slide-right-motto">Moderné riešenia interiérov</p>
            </div>
          </div>
          <div class="slide2 w-slide">
            <div class="motto-left w-container">
              <p class="slide-right-motto">Praktické a účelné bývanie</p>
            </div>
          </div>
          <div class="slide3 w-slide">
            <div class="motto-left w-container">
              <p class="slide-right-motto">Nadčasové a dlhodobé riešenia</p>
            </div>
          </div>
          <div class="slide4 w-slide">
            <div class="motto-right w-container">
              <p class="slide-right-motto">Najnovšie trendy v bývaní</p>
            </div>
          </div>
        </div>
        <div class="w-slider-arrow-left">
          <div class="icon-2 w-icon-slider-left"></div>
        </div>
        <div class="w-slider-arrow-right">
          <div class="icon w-icon-slider-right"></div>
        </div>
        <div class="slider-nav w-slider-nav"></div>
      </div>
    </div>

    @if (session('status'))
    <div class="sekcia-obsah" style="font-size:25px;border-bottom:5px solid red;color:green;">
      <div class="obsah-strany w-container" >
        {{ session('status') }}
      </div>
    </div>
    @endif

    @yield('content')

    <div class="footer">
      <div class="container-2 w-container">
        <p class="paragraph">Telefón: +421 948 470 710 (Prosíme volať po 10:00) E-mail: <a href="mailto:projekt@inovacio.sk" class="link">projekt@inovacio.sk</a></p>
      </div>
      <div class="container-2 w-container">
        <p class="paragraph">Copyright © 2015 - 2018 INOVACIO s.r.o. Obsah www stránky je možné používať len so súhlasom majiteľa stránky.</p><a href="https://www.tomasjedno.com/" target="_blank" class="link-block w-inline-block w-clearfix"><img src="{{ asset('images/TJblackFavIco32_1TJblackFavIco32.png') }}" alt="www.tomasjedno.com" class="tomasjednocom"></a></div>
    </div>
  </div>

</body>
</html>
