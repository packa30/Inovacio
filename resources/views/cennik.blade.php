<?php $nav_cennik = 'w--current'; ?>
@extends('layouts.app')
@section('content')
    <div class="sekcia-obsah">
      <div class="obsah-strany w-container">
        <h2 class="nadpis-h2">Cenník</h2>
          @if (Auth::guard('users')->check())
        <a class="nav-link-2 w-nav-link" href="{{ route('get_cennik') }}">
          Upraviť cenník
        </a>
        @else
        @endif
        <div class="row-cennik w-row">
          <div class="column-2 w-col w-col-6 w-col-small-6 w-col-tiny-6">
            <h3 class="heading-4">Miestnosť</h3>
            <p class="paragraph-4">
              <?php foreach ($cennik as $value): ?>
                {{ $value->popis }} <br>
              <?php endforeach; ?></p>
          </div>
          <div class="column-3 w-col w-col-6 w-col-small-6 w-col-tiny-6">
            <h3 class="heading-4-copy">Cena od - do</h3>
            <p class="paragraph-4-copy">
              <?php foreach ($cennik as $value): ?>
                  {{ $value->cena }} <br>
              <?php endforeach; ?>
              </p>
          </div>
        </div>
        <p class="paragraph-6">Nie sme platcami DPH.</p><a href="kontakt.html" class="link-2-center">Mám záujem o vypracovanie  cenovej ponuky projektu interiéru</a>
        <h2 class="nadpis-h2">Čo bude obsahovať Váš projekt interiéru?</h2>
        <p class="text">Projekt interiéru bude obsahovať kompletnú vizuálnu grafickú časť (návrh + samostatné pohľady na navrhnutý interiér, samostatné pohľady na navrhnuté dizajnové nábytky, farebné varianty a riešenia) a výkresovú časť (výkresy pre elektrikára, stolára, krbára, pokladača, maliara,vodára, sadrokartónistu, murára) potrebnú k realizácií Vášho budúceho interiéru.</p>
        <h1 class="nadpis-h2">Vizuálna grafická časť</h1>
        <div class="row-2 w-row">
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="../images/vizual-1.jpg" srcset="../images/vizual-1-p-800.jpeg 800w, ../images/vizual-1-p-1080.jpeg 1080w, ../images/vizual-1-p-1600.jpeg 1600w, ../images/vizual-1-p-2000.jpeg 2000w, ../images/vizual-1-p-2600.jpeg 2600w, ../images/vizual-1-p-3200.jpeg 3200w, ../images/vizual-1.jpg 7014w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0a093812804112f23289",
      "fileName": "vizual 1.jpg",
      "origFileName": "vizual 1.jpg",
      "width": 7014,
      "height": 4201,
      "fileSize": 1067112,
      "url": "images/vizual-1.jpg"
    }
  ],
  "group": "visual"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vizual-2.jpg" srcset="images/vizual-2-p-1080.jpeg 1080w, images/vizual-2-p-1600.jpeg 1600w, images/vizual-2-p-2000.jpeg 2000w, images/vizual-2-p-2600.jpeg 2600w, images/vizual-2-p-3200.jpeg 3200w, images/vizual-2.jpg 7014w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0a09cde3eaf5d5b576b4",
      "fileName": "vizual 2.jpg",
      "origFileName": "vizual 2.jpg",
      "width": 7014,
      "height": 4201,
      "fileSize": 1302822,
      "url": "images/vizual-2.jpg"
    }
  ],
  "group": "visual"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vizual-3.jpg" srcset="images/vizual-3-p-1080.jpeg 1080w, images/vizual-3-p-1600.jpeg 1600w, images/vizual-3-p-2000.jpeg 2000w, images/vizual-3-p-2600.jpeg 2600w, images/vizual-3-p-3200.jpeg 3200w, images/vizual-3.jpg 7014w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0a09cde3ea31bfb576b3",
      "fileName": "vizual 3.jpg",
      "origFileName": "vizual 3.jpg",
      "width": 7014,
      "height": 4201,
      "fileSize": 1105593,
      "url": "images/vizual-3.jpg"
    }
  ],
  "group": "visual"
}</script></a></div>
        </div>
        <div class="w-row">
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vizual-4.jpg" srcset="images/vizual-4-p-1080.jpeg 1080w, images/vizual-4-p-1600.jpeg 1600w, images/vizual-4-p-2000.jpeg 2000w, images/vizual-4-p-2600.jpeg 2600w, images/vizual-4-p-3200.jpeg 3200w, images/vizual-4.jpg 7014w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0a0973b2fd5c5d870bb8",
      "fileName": "vizual 4.jpg",
      "origFileName": "vizual 4.jpg",
      "width": 7014,
      "height": 4201,
      "fileSize": 996615,
      "url": "images/vizual-4.jpg"
    }
  ],
  "group": "visual"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vizual-5.jpg" srcset="images/vizual-5-p-500.jpeg 500w, images/vizual-5-p-800.jpeg 800w, images/vizual-5-p-1080.jpeg 1080w, images/vizual-5-p-1600.jpeg 1600w, images/vizual-5-p-2000.jpeg 2000w, images/vizual-5-p-2600.jpeg 2600w, images/vizual-5.jpg 7014w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0a10cde3ea7f00b576b8",
      "fileName": "vizual 5.jpg",
      "origFileName": "vizual 5.jpg",
      "width": 7014,
      "height": 4201,
      "fileSize": 789597,
      "url": "images/vizual-5.jpg"
    }
  ],
  "group": "visual"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vizual-6.jpg" srcset="images/vizual-6-p-500.jpeg 500w, images/vizual-6-p-800.jpeg 800w, images/vizual-6-p-1080.jpeg 1080w, images/vizual-6-p-1600.jpeg 1600w, images/vizual-6-p-2000.jpeg 2000w, images/vizual-6-p-2600.jpeg 2600w, images/vizual-6.jpg 7014w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0a1043b23b61e7f4df03",
      "fileName": "vizual 6.jpg",
      "origFileName": "vizual 6.jpg",
      "width": 7014,
      "height": 4201,
      "fileSize": 698302,
      "url": "images/vizual-6.jpg"
    }
  ],
  "group": "visual"
}</script></a></div>
        </div>
        <h1 class="nadpis-h2">Výkresová časť</h1>
        <div class="row-2 w-row">
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vykresova-1.jpg" srcset="images/vykresova-1-p-800.jpeg 800w, images/vykresova-1-p-1080.jpeg 1080w, images/vykresova-1-p-1600.jpeg 1600w, images/vykresova-1-p-2000.jpeg 2000w, images/vykresova-1-p-2600.jpeg 2600w, images/vykresova-1-p-3200.jpeg 3200w, images/vykresova-1.jpg 7000w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0aa282e3a60d504f1289",
      "fileName": "vykresova 1.jpg",
      "origFileName": "vykresova 1.jpg",
      "width": 7000,
      "height": 4200,
      "fileSize": 1007455,
      "url": "images/vykresova-1.jpg"
    }
  ],
  "group": "vykres"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vykresova-2.jpg" srcset="images/vykresova-2-p-500.jpeg 500w, images/vykresova-2-p-800.jpeg 800w, images/vykresova-2-p-1080.jpeg 1080w, images/vykresova-2-p-1600.jpeg 1600w, images/vykresova-2-p-2000.jpeg 2000w, images/vykresova-2-p-2600.jpeg 2600w, images/vykresova-2-p-3200.jpeg 3200w, images/vykresova-2.jpg 7000w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0aa182e3a6570a4f1287",
      "fileName": "5af3ec4ed6bc360aed18b9e6_vykresova 2.jpg",
      "origFileName": "vykresova 2.jpg",
      "width": 7000,
      "height": 4200,
      "fileSize": 674951,
      "url": "images/vykresova-2.jpg"
    }
  ],
  "group": "vykres"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vykresova-3.jpg" srcset="images/vykresova-3-p-800.jpeg 800w, images/vykresova-3-p-1080.jpeg 1080w, images/vykresova-3-p-1600.jpeg 1600w, images/vykresova-3-p-2000.jpeg 2000w, images/vykresova-3-p-2600.jpeg 2600w, images/vykresova-3-p-3200.jpeg 3200w, images/vykresova-3.jpg 7000w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0aa13812800565f232f5",
      "fileName": "vykresova 3.jpg",
      "origFileName": "vykresova 3.jpg",
      "width": 7000,
      "height": 4200,
      "fileSize": 618346,
      "url": "images/vykresova-3.jpg"
    }
  ],
  "group": "vykres"
}</script></a></div>
        </div>
        <div class="w-row">
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vykresova-4.jpg" srcset="images/vykresova-4-p-500.jpeg 500w, images/vykresova-4-p-800.jpeg 800w, images/vykresova-4-p-1080.jpeg 1080w, images/vykresova-4-p-1600.jpeg 1600w, images/vykresova-4-p-2000.jpeg 2000w, images/vykresova-4-p-2600.jpeg 2600w, images/vykresova-4-p-3200.jpeg 3200w, images/vykresova-4.jpg 7000w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0aa282e3a6782b4f1288",
      "fileName": "vykresova 4.jpg",
      "origFileName": "vykresova 4.jpg",
      "width": 7000,
      "height": 4200,
      "fileSize": 983814,
      "url": "images/vykresova-4.jpg"
    }
  ],
  "group": "vykres"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vykresova-5.jpg" srcset="images/vykresova-5-p-500.jpeg 500w, images/vykresova-5-p-800.jpeg 800w, images/vykresova-5-p-1080.jpeg 1080w, images/vykresova-5-p-1600.jpeg 1600w, images/vykresova-5-p-2000.jpeg 2000w, images/vykresova-5-p-2600.jpeg 2600w, images/vykresova-5-p-3200.jpeg 3200w, images/vykresova-5.jpg 6976w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0aa6d7dd9408b07adf1e",
      "fileName": "vykresova 5.jpg",
      "origFileName": "vykresova 5.jpg",
      "width": 6976,
      "height": 4201,
      "fileSize": 924131,
      "url": "images/vykresova-5.jpg"
    }
  ],
  "group": "vykres"
}</script></a></div>
          <div class="w-col w-col-4"><a href="#" class="w-inline-block w-lightbox"><img src="images/vykresova-6.jpg" srcset="images/vykresova-6-p-800.jpeg 800w, images/vykresova-6-p-1080.jpeg 1080w, images/vykresova-6-p-1600.jpeg 1600w, images/vykresova-6-p-2000.jpeg 2000w, images/vykresova-6-p-2600.jpeg 2600w, images/vykresova-6-p-3200.jpeg 3200w, images/vykresova-6.jpg 7000w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 229.328125px, 299.984375px" class="image-5"><script type="application/json" class="w-json">{
  "items": [
    {
      "type": "image",
      "_id": "5adf0aa843b23b47c6f4e031",
      "fileName": "vykresova 6.jpg",
      "origFileName": "vykresova 6.jpg",
      "width": 7000,
      "height": 4200,
      "fileSize": 1381201,
      "url": "images/vykresova-6.jpg"
    }
  ],
  "group": "vykres"
}</script></a></div>
        </div>
        <h2 class="nadpis-h2">Myslite na svoje nové priestory už pred zahájením stavby alebo rekonštrukcie</h2>
        <p class="text">schematické zakreslenie interiéru v pôdorysných plánoch nemusí byť vždy ideálne. Zmena rozmiestnenia nábytkov a posun priečok v postavenom dome sú už takmer nereálne či už zo stavebného, ergonomického alebo ekonomického hľadiska. S vopred navrhnutým interiérom sa dajú tieto nedostatky odstrániť, presnejšie sa určia miesta prípojok vody, elektriky, plynu a vedenia odpadov. Ideálne je mať vypracovaný projekt interiéru už pred začiatkom stavby alebo rekonštrukcie.</p>
        <h2 class="nadpis-h2">Váš budúci interiér uvidíte ešte skôr ako sa bude realizovať</h2>
        <p class="text">vďaka fotorealistickým pohľadom máte možnosť sa vopred uistiť, že Váš interiér presne zodpovedá Vašim predstavám o bývaní, prípadne môžete stále zvážiť všetky svoje potreby a požiadavky na výzorové a funkčné vlastnosti Vášho budúceho interiéru.</p>
        <h2 class="nadpis-h2">Originálne interiéry</h2>
        <p class="text">užívajte si navrhnutý dizajnový interiér presne na Vašu mieru. Pochváľte sa priateľom a známym jedinečným riešením svojho bývania.</p>
        <h2 class="nadpis-h2">Jednoduchšia komunikácia</h2>
        <p class="text">murárovi, elektrikárovi, obkladačovi, stolárovi - všetkým profesiám sa bude ľahšie realizovať Váš budúci interiér pokiaľ budú vidieť čo, kde a ako majú urobiť.</p>
      </div>
    </div>
@endsection
