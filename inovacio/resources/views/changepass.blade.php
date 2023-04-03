@extends('layouts.app')

@section('content')
<div class="sekcia-obsah">
  <div class="obsah-strany w-container">
    <div class="w-form">
      <form id="email-form" data-name="Email Form" class="form" method="post" action="{{ route('change_post') }}" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="row-cennik w-row">
          <input type="text" name="name" value="meno">
        </div>
        <div class="row-cennik w-row">
        </label><input type="text" name="oldpassword" value="staré heslo">
        </div>
        <div class="row-cennik w-row">
        </label><input type="text" name="newpassword" value="nové heslo">
        </div>
        <div class="row-cennik w-row">
        </label><input type="text" name="newpassword2" value="nové heslo znova">
        </div>
        <input type="submit" value="zmeniť" class="submit-button w-button">
        </form>
    </div>


  </div>
</div>


@endsection
