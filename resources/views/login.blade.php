@extends('layouts.form')

@section('form-content')
  <div class="card card-plain">
    <div class="card-header pb-0 text-start">
      <h4 class="font-weight-bolder">Login</h4>
      <p class="mb-0">Enter username and password to login</p>
    </div>
    <div class="card-body">

      <form role="form" action="{{route('login.submit')}}" method="POST">
        @csrf
        {{-- Username --}}
        <div class="mb-3">
          <input name="username" type="text" class="form-control form-control-lg" placeholder="Username">
        </div>
        @if ($errors->has('username'))
                <div class="text-danger text-end mt-n3 ">{{$errors->first('username')}}</div>
        @endif

        {{-- Password --}}
        <div class="mb-3">
          <input name="password" type="password" class="form-control form-control-lg" placeholder="Password">
        </div>
        @if ($errors->has('password'))
                <div class="text-danger text-end mt-n3 ">{{$errors->first('password')}}</div>
        @endif

        <div class="text-center">
          <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Login</button>
        </div>
      </form>
      <a href="{{route('admin.create')}}"><button class="btn bg-gradient-success btn_sm mb-0" type="submit">Create Admin</button></a>
    </div>
  </div>
  @if (session('message')) <div class="text-danger text-center"> {{ session('message') }} </div> @endif
@endsection

@section('graphic-discription')
  <h4 class="text-white font-weight-bolder">"Attention is the new currency"</h4>
  <p class="text-white">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
@endsection