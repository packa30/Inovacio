<?php $nav_realizacie = 'w--current'; ?>
@extends('layouts.app',['title' => 'Realizácie - inovacio.sk - Projekty interiérov a dizajn nábytku.'])
@section('content')

    <div class="sekcia-obsah">
      <div class="obsah-strany w-container">
        @if (Auth::guard('users')->check())
        <a class="nav-link-2 w-nav-link" href="{{ route('realizacie_add_get') }}">
          Pridať realizáciu
        </a>
        @else
        @endif
        <?php foreach ($realizacie as $real): ?>
          <h2 class="nadpis-h2">
            @if (Auth::guard('users')->check())
            {{$real->poradie}}.
            @else
            @endif
            {{ $real->popis }}</h2>
            @if (Auth::guard('users')->check())
            <a class="nav-link-2 w-nav-link" href="{{ route('realizacie_edit_get',['id' => $real->id]) }}">
              Upraviť
            </a>
            <a class="nav-link-2 w-nav-link" href="{{ route('subrealizacie_add_get',['id' => $real->id]) }}">
              Pridať podblok realizacie
            </a>
            <a class="nav-link-2 w-nav-link" href="{{ route('realizacie_delete_get',['id' => $real->id]) }}">
              Odstrániť realizáciu
            </a>
            @else
            @endif
          <?php foreach ($subrealizacie as $sub): ?>
            <?php if ($real->id == $sub->realizacie_id): ?>
              <h3 class="heading-3b">
                @if (Auth::guard('users')->check())
                {{$real->poradie}}.{{$sub->poradie}}.
                @else
                @endif
                {{ $sub->popis }}</h3>
              @if (Auth::guard('users')->check())
              <a class="nav-link-2 w-nav-link" href="{{ route('subrealizacie_edit_get',['id' => $sub->id]) }}">
                Upraviť podblok realizácie
              </a>
              <a class="nav-link-2 w-nav-link" href="{{ route('subrealizacie_delete_get',['id' => $sub->id]) }}">
                Odstrániť podblok realizácie
              </a>
              @else
              @endif
              <?php $so = '0' ?>
              <div class="w-row">
              <?php foreach ($obrazky as $ob): ?>
                <?php if ($sub->id == $ob->subrealizacie_id): ?>
                    <div class="w-col w-col-4"><a href="#" class="lightbox-link w-inline-block w-lightbox"><img src="../images/realizacie/{{$real->id}}/{{$sub->id}}/{{ $ob->obr }}" alt="{{ $ob->obr }}" srcset="../images/realizacie/{{$real->id}}/{{$sub->id}}/500-{{ $ob->obr }} 500w, ../images/realizacie/{{$real->id}}/{{$sub->id}}/800-{{ $ob->obr }} 800w, ../images/realizacie/{{$real->id}}/{{$sub->id}}/1080-{{ $ob->obr }} 1080w, ../images/realizacie/{{$real->id}}/{{$sub->id}}/1200-{{ $ob->obr }} 1200w" sizes="100vw" class="image-3"><script type="application/json" class="w-json">{
                    "items": [
                      {
                        "type": "image",
                        "_id": "{{ $ob->id }}",
                        "caption": "Realizacia č.{{$real->id}}, {{$sub->popis}}, {{$ob->obr}}",
                        "fileName": "{{ $ob->obr }}",
                        "origFileName": "{{ $ob->obr }}",
                        "width": 1200,
                        "height": 720,
                        "url": "../images/realizacie/{{$real->id}}/{{$sub->id}}/{{ $ob->obr }}"
                      }
                    ],
                    "group": "{{ $real->popis }}"
                    }</script></a></div>
                    <?php $so = $ob->poradie ?>
                    <?php if (($ob->poradie % 3) == 0): ?>
                    </div>
                    <div class="w-row">
                    <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if (($so % 3) != 0): ?>
                <div class="w-col w-col-4"></div>
                <?php $so += 1; ?>
              <?php endif; ?>
              <?php if (($so % 3) != 0): ?>
                <div class="w-col w-col-4"></div>
                <?php $so += 1; ?>
              <?php endif; ?>
            </div>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>
    </div>

@endsection
