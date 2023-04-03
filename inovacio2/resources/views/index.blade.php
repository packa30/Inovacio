<?php $nav_index = 'w--current'; ?>
@extends('layouts.app',['title' => 'inovacio.sk - Projekty interiérov a dizajn nábytku.'])
@section('content')
    <div class="sekcia-obsah">
      <div data-duration-in="300" data-duration-out="100" class="w-tabs">
        <div class="tabs-menu w-tab-menu">
          <a data-w-tab="Tab 1" class="tab-link-2 w-inline-block w-tab-link w--current">
            <div>obývačky</div>
          </a>
          <a data-w-tab="Tab 2" class="tab-link-2 w-inline-block w-tab-link">
            <div class="text-block-4">kuchyne</div>
          </a>
          <a data-w-tab="Tab 3" class="tab-link-2 w-inline-block w-tab-link">
            <div>detské izby</div>
          </a>
          <a data-w-tab="Tab 4" class="tab-link-2 w-inline-block w-tab-link">
            <div>spálne</div>
          </a>
          <a data-w-tab="Tab 5" class="tab-link-2 w-inline-block w-tab-link">
            <div>pracovne</div>
          </a>
          <a data-w-tab="Tab 6" class="tab-link-2 w-inline-block w-tab-link">
            <div>kúpeľne</div>
          </a>
          <a data-w-tab="Tab 7" class="tab-link-2 w-inline-block w-tab-link">
            <div>predsiene</div>
          </a>
        </div>
        <div class="w-tab-content">
          <div data-w-tab="Tab 1" class="tab-pane w-tab-pane w--tab-active">
            <div class="productinfo w-container">
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('get_add',['popis' => 'obyvacky']) }}">
                Pridať obývačku
              </a>
              @else
              @endif
              <?php foreach ($obyvacky as $value): ?>
                <h1 class="nadpis-h2">
                  @if (Auth::guard('users')->check())
                  {{$value->poradie}}.
                  @else
                  @endif
                  {{$value -> popis}}, {{$value->date}}, č. {{$value->id}}</h1>
                @if (Auth::guard('users')->check())
                <a class="nav-link-2 w-nav-link" href="{{ route('get_edit',['popis' => 'obyvacky','id' => $value->id]) }}">
                  Upraviť
                </a>
                <a class="nav-link-2 w-nav-link" href="{{ route('get_delete',['popis' => 'obyvacky','id' => $value->id]) }}">
                  Odstrániť
                </a>
                @else
                @endif
                <p class="text">{{$value->opis}}</p>
                <div class="w-row">
                  <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/obyvacky/{{$value->id}}/{{$value->obr1}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/obyvacky/{{$value->id}}/500-{{$value->obr1}} 500w, images/obyvacky/{{$value->id}}/800-{{$value->obr1}} 800w, images/obyvacky/{{$value->id}}/1080-{{$value->obr1}} 1080w, images/obyvacky/{{$value->id}}/1200-{{$value->obr1}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr1}}",
                    "origFileName": "{{$value->obr1}}",
                    "url": "images/obyvacky/{{$value->id}}/{{$value->obr1}}",
                    "_id": "{{$value->id}}a",
                    "type": "image"
                  }
                ],
                "group": "obyvacky"
              }</script></a></div>
                              <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/obyvacky/{{$value->id}}/{{$value->obr2}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/obyvacky/{{$value->id}}/500-{{$value->obr2}} 500w, images/obyvacky/{{$value->id}}/800-{{$value->obr2}} 800w, images/obyvacky/{{$value->id}}/1080-{{$value->obr2}} 1080w, images/obyvacky/{{$value->id}}/1200-{{$value->obr2}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr2}}",
                    "origFileName": "{{$value->obr2}}",
                    "url": "images/obyvacky/{{$value->id}}/{{$value->obr2}}",
                    "_id": "{{$value->id}}b",
                    "type": "image"
                  }
                ],
                "group": "obyvacky"
              }</script></a></div>
                            </div>
              <?php endforeach; ?>


            </div>
          </div>


          <div data-w-tab="Tab 2" class="w-tab-pane">
            <div class="productinfo w-container">
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('get_add',['popis' => 'kuchyne']) }}">
                Pridať kuchyňu
              </a>
              @else
              @endif
              <?php foreach ($kuchyne as $value): ?>
                <h1 class="nadpis-h2">
                  @if (Auth::guard('users')->check())
                  {{$value->poradie}}.
                  @else
                  @endif
                  {{$value -> popis}}, {{$value->date}}, č. {{$value->id}}</h1>
                @if (Auth::guard('users')->check())
                <a class="nav-link-2 w-nav-link" href="{{ route('get_edit',['popis' => 'kuchyne','id' => $value->id]) }}">
                  Upraviť
                </a>
                <a class="nav-link-2 w-nav-link" href="{{ route('get_delete',['popis' => 'kuchyne','id' => $value->id]) }}">
                  Odstrániť
                </a>
                @else
                @endif
                <p class="text">{{$value->opis}}</p>
                <div class="w-row">
                  <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/kuchyne/{{$value->id}}/{{$value->obr1}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/kuchyne/{{$value->id}}/500-{{$value->obr1}} 500w, images/kuchyne/{{$value->id}}/800-{{$value->obr1}} 800w, images/kuchyne/{{$value->id}}/1080-{{$value->obr1}} 1080w, images/kuchyne/{{$value->id}}/1200-{{$value->obr1}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr1}}",
                    "origFileName": "{{$value->obr1}}",
                    "url": "images/kuchyne/{{$value->id}}/{{$value->obr1}}",
                    "_id": "{{$value->id}}a",
                    "type": "image"
                  }
                ],
                "group": "kuchyne"
              }</script></a></div>
                              <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/kuchyne/{{$value->id}}/{{$value->obr2}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/kuchyne/{{$value->id}}/500-{{$value->obr2}} 500w, images/kuchyne/{{$value->id}}/800-{{$value->obr2}} 800w, images/kuchyne/{{$value->id}}/1080-{{$value->obr2}} 1080w, images/kuchyne/{{$value->id}}/1200-{{$value->obr2}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr2}}",
                    "origFileName": "{{$value->obr2}}",
                    "url": "images/kuchyne/{{$value->id}}/{{$value->obr2}}",
                    "_id": "{{$value->id}}b",
                    "type": "image"
                  }
                ],
                "group": "kuchyne"
              }</script></a></div>
                            </div>
              <?php endforeach; ?>

            </div>
          </div>



          <div data-w-tab="Tab 3" class="w-tab-pane">
            <div class="productinfo w-container">
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('get_add',['popis' => 'detske_izby']) }}">
                Pridať detskú izbu
              </a>
              @else
              @endif
              <?php foreach ($detske as $value): ?>
                <h1 class="nadpis-h2">
                  @if (Auth::guard('users')->check())
                  {{$value->poradie}}.
                  @else
                  @endif
                  {{$value -> popis}}, {{$value->date}}, č. {{$value->id}}</h1>
                @if (Auth::guard('users')->check())
                <a class="nav-link-2 w-nav-link" href="{{ route('get_edit',['popis' => 'detske_izby','id' => $value->id]) }}">
                  Upraviť
                </a>
                <a class="nav-link-2 w-nav-link" href="{{ route('get_delete',['popis' => 'detske_izby','id' => $value->id]) }}">
                  Odstrániť
                </a>
                @else
                @endif
                <p class="text">{{$value->opis}}</p>
                <div class="w-row">
                  <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/detske_izby/{{$value->id}}/{{$value->obr1}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/detske_izby/{{$value->id}}/500-{{$value->obr1}} 500w, images/detske_izby/{{$value->id}}/800-{{$value->obr1}} 800w, images/detske_izby/{{$value->id}}/1080-{{$value->obr1}} 1080w, images/detske_izby/{{$value->id}}/1200-{{$value->obr1}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr1}}",
                    "origFileName": "{{$value->obr1}}",
                    "url": "images/detske_izby/{{$value->id}}/{{$value->obr1}}",
                    "_id": "{{$value->id}}a",
                    "type": "image"
                  }
                ],
                "group": "detske"
              }</script></a></div>
                              <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/detske_izby/{{$value->id}}/{{$value->obr2}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/detske_izby/{{$value->id}}/500-{{$value->obr2}} 500w, images/detske_izby/{{$value->id}}/800-{{$value->obr2}} 800w, images/detske_izby/{{$value->id}}/1080-{{$value->obr2}} 1080w, images/detske_izby/{{$value->id}}/1200-{{$value->obr2}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr2}}",
                    "origFileName": "{{$value->obr2}}",
                    "url": "images/detske_izby/{{$value->id}}/{{$value->obr2}}",
                    "_id": "{{$value->id}}b",
                    "type": "image"
                  }
                ],
                "group": "detske"
              }</script></a></div>
                            </div>
              <?php endforeach; ?>
            </div>
          </div>



          <div data-w-tab="Tab 4" class="w-tab-pane">
            <div class="productinfo w-container">
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('get_add',['popis' => 'spalne']) }}">
                Pridať spálnu
              </a>
              @else
              @endif
              <?php foreach ($spalne as $value): ?>
                <h1 class="nadpis-h2">
                  @if (Auth::guard('users')->check())
                  {{$value->poradie}}.
                  @else
                  @endif
                  {{$value -> popis}}, {{$value->date}}, č. {{$value->id}}</h1>
                @if (Auth::guard('users')->check())
                <a class="nav-link-2 w-nav-link" href="{{ route('get_edit',['popis' => 'spalne','id' => $value->id]) }}">
                  Upraviť
                </a>
                <a class="nav-link-2 w-nav-link" href="{{ route('get_delete',['popis' => 'spalne','id' => $value->id]) }}">
                  Odstrániť
                </a>
                @else
                @endif
                <p class="text">{{$value->opis}}</p>
                <div class="w-row">
                  <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/spalne/{{$value->id}}/{{$value->obr1}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/spalne/{{$value->id}}/500-{{$value->obr1}} 500w, images/spalne/{{$value->id}}/800-{{$value->obr1}} 800w, images/spalne/{{$value->id}}/1080-{{$value->obr1}} 1080w, images/spalne/{{$value->id}}/1200-{{$value->obr1}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr1}}",
                    "origFileName": "{{$value->obr1}}",
                    "url": "images/spalne/{{$value->id}}/{{$value->obr1}}",
                    "_id": "{{$value->id}}a",
                    "type": "image"
                  }
                ],
                "group": "spalne"
              }</script></a></div>
                              <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/spalne/{{$value->id}}/{{$value->obr2}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/spalne/{{$value->id}}/500-{{$value->obr2}} 500w, images/spalne/{{$value->id}}/800-{{$value->obr2}} 800w, images/spalne/{{$value->id}}/1080-{{$value->obr2}} 1080w, images/spalne/{{$value->id}}/1200-{{$value->obr2}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr2}}",
                    "origFileName": "{{$value->obr2}}",
                    "url": "images/spalne/{{$value->id}}/{{$value->obr2}}",
                    "_id": "{{$value->id}}b",
                    "type": "image"
                  }
                ],
                "group": "spalne"
              }</script></a></div>
                            </div>
              <?php endforeach; ?>
            </div>
          </div>



          <div data-w-tab="Tab 5" class="w-tab-pane">
            <div class="productinfo w-container">
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('get_add',['popis' => 'pracovne']) }}">
                Pridať pracovňu
              </a>
              @else
              @endif
              <?php foreach ($pracovne as $value): ?>
                <h1 class="nadpis-h2">
                  @if (Auth::guard('users')->check())
                  {{$value->poradie}}.
                  @else
                  @endif
                  {{$value -> popis}}, {{$value->date}}, č. {{$value->id}}</h1>
                @if (Auth::guard('users')->check())
                <a class="nav-link-2 w-nav-link" href="{{ route('get_edit',['popis' => 'pracovne','id' => $value->id]) }}">
                  Upraviť
                </a>
                <a class="nav-link-2 w-nav-link" href="{{ route('get_delete',['popis' => 'pracovne','id' => $value->id]) }}">
                  Odstrániť
                </a>
                @else
                @endif
                <p class="text">{{$value->opis}}</p>
                <div class="w-row">
                  <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/pracovne/{{$value->id}}/{{$value->obr1}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/pracovne/{{$value->id}}/500-{{$value->obr1}} 500w, images/pracovne/{{$value->id}}/800-{{$value->obr1}} 800w, images/pracovne/{{$value->id}}/1080-{{$value->obr1}} 1080w, images/pracovne/{{$value->id}}/1200-{{$value->obr1}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr1}}",
                    "origFileName": "{{$value->obr1}}",
                    "url": "images/pracovne/{{$value->id}}/{{$value->obr1}}",
                    "_id": "{{$value->id}}a",
                    "type": "image"
                  }
                ],
                "group": "pracovne"
              }</script></a></div>
                              <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/pracovne/{{$value->id}}/{{$value->obr2}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/pracovne/{{$value->id}}/500-{{$value->obr2}} 500w, images/pracovne/{{$value->id}}/800-{{$value->obr2}} 800w, images/pracovne/{{$value->id}}/1080-{{$value->obr2}} 1080w, images/pracovne/{{$value->id}}/1200-{{$value->obr2}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr2}}",
                    "origFileName": "{{$value->obr2}}",
                    "url": "images/pracovne/{{$value->id}}/{{$value->obr2}}",
                    "_id": "{{$value->id}}b",
                    "type": "image"
                  }
                ],
                "group": "pracovne"
              }</script></a></div>
                            </div>
              <?php endforeach; ?>
            </div>
          </div>


          <div data-w-tab="Tab 6" class="w-tab-pane">
            <div class="productinfo w-container">
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('get_add',['popis' => 'kupelne']) }}">
                Pridať kúpelňu
              </a>
              @else
              @endif
              <?php foreach ($kupelne as $value): ?>
                <h1 class="nadpis-h2">
                  @if (Auth::guard('users')->check())
                  {{$value->poradie}}.
                  @else
                  @endif
                  {{$value -> popis}}, {{$value->date}}, č. {{$value->id}}</h1>
                @if (Auth::guard('users')->check())
                <a class="nav-link-2 w-nav-link" href="{{ route('get_edit',['popis' => 'kupelne','id' => $value->id]) }}">
                  Upraviť
                </a>
                <a class="nav-link-2 w-nav-link" href="{{ route('get_delete',['popis' => 'kupelne','id' => $value->id]) }}">
                  Odstrániť
                </a>
                @else
                @endif
                <p class="text">{{$value->opis}}</p>
                <div class="w-row">
                  <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/kupelne/{{$value->id}}/{{$value->obr1}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/kupelne/{{$value->id}}/500-{{$value->obr1}} 500w, images/kupelne/{{$value->id}}/800-{{$value->obr1}} 800w, images/kupelne/{{$value->id}}/1080-{{$value->obr1}} 1080w, images/kupelne/{{$value->id}}/1200-{{$value->obr1}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr1}}",
                    "origFileName": "{{$value->obr1}}",
                    "url": "images/kupelne/{{$value->id}}/{{$value->obr1}}",
                    "_id": "{{$value->id}}a",
                    "type": "image"
                  }
                ],
                "group": "kupelne"
              }</script></a></div>
                              <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/kupelne/{{$value->id}}/{{$value->obr2}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/kupelne/{{$value->id}}/500-{{$value->obr2}} 500w, images/kupelne/{{$value->id}}/800-{{$value->obr2}} 800w, images/kupelne/{{$value->id}}/1080-{{$value->obr2}} 1080w, images/kupelne/{{$value->id}}/1200-{{$value->obr2}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr2}}",
                    "origFileName": "{{$value->obr2}}",
                    "url": "images/kupelne/{{$value->id}}/{{$value->obr2}}",
                    "_id": "{{$value->id}}b",
                    "type": "image"
                  }
                ],
                "group": "kupelne"
              }</script></a></div>
                            </div>
              <?php endforeach; ?>
            </div>
          </div>


          <div data-w-tab="Tab 7" class="w-tab-pane">
            <div class="productinfo w-container">
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('get_add',['popis' => 'predsiene']) }}">
                Pridať predsieň
              </a>
              @else
              @endif
              <?php foreach ($predsiene as $value): ?>
                <h1 class="nadpis-h2">
                  @if (Auth::guard('users')->check())
                  {{$value->poradie}}.
                  @else
                  @endif
                  {{$value -> popis}}, {{$value->date}}, č. {{$value->id}}</h1>
                @if (Auth::guard('users')->check())
                <a class="nav-link-2 w-nav-link" href="{{ route('get_edit',['popis' => 'predsiene','id' => $value->id]) }}">
                  Upraviť
                </a>
                <a class="nav-link-2 w-nav-link" href="{{ route('get_delete',['popis' => 'predsiene','id' => $value->id]) }}">
                  Odstrániť
                </a>
                @else
                @endif
                <p class="text">{{$value->opis}}</p>
                <div class="w-row">
                  <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/predsiene/{{$value->id}}/{{$value->obr1}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/predsiene/{{$value->id}}/500-{{$value->obr1}} 500w, images/predsiene/{{$value->id}}/800-{{$value->obr1}} 800w, images/predsiene/{{$value->id}}/1080-{{$value->obr1}} 1080w, images/predsiene/{{$value->id}}/1200-{{$value->obr1}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr1}}",
                    "origFileName": "{{$value->obr1}}",
                    "url": "images/predsiene/{{$value->id}}/{{$value->obr1}}",
                    "_id": "{{$value->id}}a",
                    "type": "image"
                  }
                ],
                "group": "predsiene"
              }</script></a></div>
                              <div class="w-col w-col-6"><a href="#" class="w-inline-block w-lightbox"><img src="images/predsiene/{{$value->id}}/{{$value->obr2}}" alt="{{$value -> popis}}, {{$value->date}}, {{$value->id}}" srcset="images/predsiene/{{$value->id}}/500-{{$value->obr2}} 500w, images/predsiene/{{$value->id}}/800-{{$value->obr2}} 800w, images/predsiene/{{$value->id}}/1080-{{$value->obr2}} 1080w, images/predsiene/{{$value->id}}/1200-{{$value->obr2}} 1200w" sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" class="image-3"><script type="application/json" class="w-json">{
                "items": [
                  {
                    "width": 1200,
                    "caption": "{{$value -> popis}}, {{$value->date}}, č. {{$value->id}}",
                    "height": 720,
                    "fileName": "{{$value->obr2}}",
                    "origFileName": "{{$value->obr2}}",
                    "url": "images/predsiene/{{$value->id}}/{{$value->obr2}}",
                    "_id": "{{$value->id}}b",
                    "type": "image"
                  }
                ],
                "group": "predsiene"
              }</script></a></div>
                            </div>
              <?php endforeach; ?>
            </div>
          </div>


        </div>
      </div>
    </div>
@endsection
