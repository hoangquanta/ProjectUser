@extends('layouts.form')

@section('form-content')
    {{-- Form --}}              
    <div class="card card-plain">              
        {{-- Form header --}}                
        <div class="card-header pb-0 text-left">
          <h4 class="font-weight-bolder">Create new user</h4>
          <p class="mb-0">Enter account information to register</p>
        </div>

        {{-- Form body --}}                
        <div class="card-body pb-3">
          <form role="form">

            <label>Fullname</label>
            <div class="mb-3">
              <input name="fullname" type="text" class="form-control" placeholder="Fullname" >
            </div>
            <label>Username</label>
            <div class="mb-3">
              <input name="username" type="text" class="form-control" placeholder="Username" >
            </div>
            <label>Password</label>
            <div class="mb-3">
              <input name="password" type="email" class="form-control" placeholder="Password" >
            </div>
            <label>Confirm Password</label>
            <div class="mb-3">
              <input name="passwordConfirm" type="password" class="form-control" placeholder="Password" >
            </div>                    
            
            <div class="text-center">
              <button type="button" class="btn bg-gradient-primary w-100 mt-4 mb-0">Sign up</button>
            </div>
          </form>
        </div>                
      </div>
@endsection

@section('graphic-discription')
    <h4 class="text-white font-weight-bolder">Your journey starts here</h4>
    <p class="text-white">Just as it takes a company to sustain a product, it takes a community to sustain a protocol.</p>                          
@endsection