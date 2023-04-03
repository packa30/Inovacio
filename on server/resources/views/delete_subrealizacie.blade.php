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
          <form action="{{ route('subrealizacie_delete_post',['id' => $id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Index/poradie</div>
              <div class="column-3 w-col w-col-6">{{ $data->poradie }}</div>
            </div>
            <div class="row-cennik w-row">
              <div class="column-2 w-col w-col-6">Popis</div>
              <div class="column-3 w-col w-col-6">{{ $data->popis }}</div>
            </div>
            <div class="row-cennik w-row">
              <input class="submit-button w-button" type="submit" name="submit" value="Odstrániť">
            </div>
          </form>

        </div>
      </div>
    </div>
@endsection
