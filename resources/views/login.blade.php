@extends('layouts.form')

@section('form-content')
  <div class="card card-plain">
    <div class="card-header pb-0 text-start">
      <h4 class="font-weight-bolder">Login</h4>
      <p class="mb-0">Enter username and password to login</p>
    </div>
    <div class="card-body">
      <form role="form">
        <div class="mb-3">
          <input name="username" type="text" class="form-control form-control-lg" placeholder="Username">
        </div>
        <div class="mb-3">
          <input name="password" type="text" class="form-control form-control-lg" placeholder="Password">
        </div>

        <div class="text-center">
          <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Login</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('graphic-discription')
  <h4 class="text-white font-weight-bolder">"Attention is the new currency"</h4>
  <p class="text-white">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
@endsection