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
          <form action="{{ route('subrealizacie_add_post', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Index/poradie(1 = prvý na stránke, max = {{ $max }}) </div>
              <div class="column-3 w-col w-col-6"><input type="number" name="poradie" value="1" min="1" max="{{ $max }}"></div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Popis</div>
              <div class="column-3 w-col w-col-6"><input type="text" name="popis"></div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Obrázok/Obrázky</div>
              <div class="column-3 w-col w-col-6"><input name="files[]" type="file" multiple="multiple"></div>
            </div>
            <div class="row-cennik w-row">
              <input class="submit-button w-button" type="submit" name="submit" value="Pridať">
            </div>
          </form>

        </div>
      </div>
    </div>
@endsection
