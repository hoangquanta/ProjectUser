@extends('layouts.form')

@section('form-content')
    {{-- Form --}}              
    <div class="card card-plain">              
        {{-- Form header --}}                
        <div class="card-header pb-0 text-left">
          <h4 class="font-weight-bolder">Update user info</h4>
          <p class="mb-0">Enter content to edit account info</p>
        </div>
        

        {{-- Form body --}}                
        <div class="card-body pb-3">
          <form action="{{route('users.update.submit', ['id' => $user->id])}}" role="form" method="POST">
            @csrf
            <label>Fullname</label>
            <div class="mb-3">
              <input name="fullname" type="text" class="form-control" placeholder="Fullname" value="{{old('fullname') ?? $user->full_name}}">
            </div>
            @if ($errors->has('fullname'))
                <div class="text-danger text-end mt-n3 ">{{$errors->first('fullname')}}</div>
            @endif

            <label>Username</label>
            <div class="mb-3">
              <input name="username" type="text" class="form-control" placeholder="Username" value="{{old('username') ?? $user->username}}">
            </div>
            @if ($errors->has('username'))
                <div class="text-danger text-end mt-n3 ">{{$errors->first('username')}}</div>
            @endif

            <label>Password</label>
            <div class="mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password" value="{{old('password') ?? $user->password}}">
            </div>
            @if ($errors->has('password'))
                <div class="text-danger text-end mt-n3 ">{{$errors->first('password')}}</div>
            @endif

            <label>Confirm Password</label>
            <div class="mb-3">
              <input name="passwordConfirmation" type="password" class="form-control" placeholder="Password" value="{{old('passwordConfirm')}}">
            </div>    
            @if ($errors->has('passwordConfirmation'))
                <div class="text-danger text-end mt-n3 ">{{$errors->first('passwordConfirmation')}}</div>
            @endif                    
            
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Submit</button>
            </div>
          </form>
        </div>                
      </div>
@endsection

@section('graphic-discription')
    <h4 class="text-white font-weight-bolder">Your journey starts here</h4>
    <p class="text-white">Just as it takes a company to sustain a product, it takes a community to sustain a protocol.</p>                          
@endsection