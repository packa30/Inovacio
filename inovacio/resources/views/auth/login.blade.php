@extends('layouts.app')

@section('content')
<div class="sekcia-obsah">
  <div class="obsah-strany w-container">
    <div class="w-form">
      <form id="email-form" data-name="Email Form" class="form" method="post" action="{{ route('login') }}" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="row-cennik w-row">
          Meno:  <input type="text" name="name">
        </div>
        <div class="row-cennik w-row">
          Heslo:  <input type="text" name="password" >
        </div>
        <input type="submit" value="Prihlásiť" class="submit-button w-button">
        </form>
    </div>


  </div>
</div>


@endsection
