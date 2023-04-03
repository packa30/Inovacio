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
          <form action="{{ route('post_cennik') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <?php foreach ($data as $value): ?>
              <div class="row-cennik w-row">
                <div class="column-2 w-col w-col-6"><input type="text" name="popis{{ $value->id }}" value="{{ $value->popis }}" ></div>
                <div class="column-3 w-col w-col-6"><input type="text" name="cena{{ $value->id }}" value="{{ $value->cena }}"></div>
              </div>
            <?php endforeach; ?>

            <div class="row-cennik w-row">
              <input class="submit-button w-button" type="submit" name="submit" value="Uložiť">
            </div>
          </form>

        </div>
      </div>
    </div>
@endsection
