@extends('layouts.app')
@section('content')
    <div class="sekcia-obsah">
      <div class="obsah-strany w-container">
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif
        <div class="w-form">
          <form action="{{ route('post_edit', ['popis' => $popis,'id' => $zaznam->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Index/poradie(1 = prvý na stránke, max = {{ $max }}) </div>
              <div class="column-3 w-col w-col-6"><input type="number" name="poradie" value="{{$zaznam->poradie}}" min="1" max="{{ $max }}"></div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Popis</div>
              <div class="column-3 w-col w-col-6"><input type="text" name="popis" value="{{$zaznam->popis}}"></div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Rok</div>
              <div class="column-3 w-col w-col-6"><input type="text" name="datum" value="{{$zaznam->date}}"></div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Obrázok ľavý</div>
              <div class="column-3 w-col w-col-6"><input type="file" name="obr1" >{{$zaznam->obr1}}</div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Obrázok pravý</div>
              <div class="column-3 w-col w-col-6"><input type="file" name="obr2" >{{$zaznam->obr2}}</div>
            </div>
            <div class="row-cennik w-row">
              <input class="submit-button w-button" type="submit" name="submit" value="Editovať">
            </div>
          </form>

        </div>
      </div>
    </div>
@endsection
