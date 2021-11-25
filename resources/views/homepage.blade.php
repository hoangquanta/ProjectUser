@extends('layouts.master')

@section('main-content')
  <div class="container-fluid py-4">
    <div class="row my-4">
      <div class="col-12">
        <div class="card">
          <div class="table-responsive">

            <table class="table align-items-center mb-0">

              {{-- Table head --}}              
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>                  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                  <th></th>
                </tr>
              </thead>

              {{-- Table body --}}
              <tbody>
                @foreach ($users as $user)                                    
                  <tr>
                    <td>
                      <h6 class="mb-0 text-sm" style="padding-left: 15px">{{$user->id}}</h6>                    
                    </td>                  
                    <td>
                      <p class="text-sm text-secondary mb-0">{{$user->full_name}}</p>
                    </td>                  
                    <td class="align-middle text-center text-sm">
                      <p class="text-secondary mb-0 text-sm">{{$user->username}}</p>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-sm">{{$user->password}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-sm">{{$user->created_by}}</span>
                    </td>                    
                    <td class="align-middle text-center">                                            
                      <a href="{{route('users.update.open', ['id' => $user->id])}}"><button class="btn bg-gradient-secondary btn_sm mb-0 me-3" type="submit">Edit</button></a>
                      <form class="align-midle text-center d-inline-block ms-3" action="{{route('users.delete',['id'=>$user->id])}}" method="POST">
                          @method('delete')
                          @csrf
                          <button class="btn bg-gradient-danger btn_sm align-midle mb-0" type="submit">Delete</button>
                      </form>
                  </td>
                  </tr>
                                     
                @endforeach 
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="align-middle text-center">                    
                    <a href="{{route('users.create.open')}}"><button class="btn bg-gradient-secondary btn_sm mb-0" type="submit">Add new</button></a>
                  </td>
                </tr> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>                  
  </div>
@endsection

