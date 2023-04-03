@extends('layouts.app')
@section('content')
    <div class="sekcia-obsah">
      <div class="obsah-strany w-container">
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif
        <div class="w-form" style="border-bottom:5px solid red;">
          <form action="{{ route('subrealizacie_edit_post',['id' => $id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Index/poradie(1 = prvý na stránke, max = {{ $max }})</div>
              <div class="column-3 w-col w-col-6"><input type="number" name="poradie" value="{{ $data->poradie }}" min="1" max="{{ $max }}"></div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Popis</div>
              <div class="column-3 w-col w-col-6"><input type="text" name="popis" value="{{ $data->popis }}"></div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Obrázok/Obrázky</div>
              <div class="column-3 w-col w-col-6"><input name="files[]" type="file" multiple="multiple"></div>
            </div>
            <div class="row-cennik w-row">
              <input class="submit-button w-button" type="submit" name="submit" value="Upraviť">
            </div>
          </form>
        </div>
        <div class="w-form" style="border-bottom:5px solid red;">
          <form action="{{ route('sub_obr_del',['id' => $id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            Zaškrtnuté budú odstránené
            <div class="w-row">
              <?php foreach ($obr as $ob): ?>
                <div class="w-col w-col-4">
                  <a href="#" class="w-inline-block w-lightbox"><img alt='{{ $ob->obr }}' src="../../../images/realizacie/{{$data->realizacie_id}}/{{$id}}/{{ $ob->obr }}" class="image-3"></a>
                  <input type="checkbox" name="{{ $ob->id }}" value="{{ $ob->id }}">
                </div>
              <?php endforeach; ?>
            </div>
            <div class="row-cennik w-row">
              <input class="submit-button w-button" type="submit" name="submit" value="Odstrániť">
            </div>
          </form>
        </div>

      </div>
    </div>
@endsection
