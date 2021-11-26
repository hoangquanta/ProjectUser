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
                      <button class="btn bg-gradient-danger btn_sm align-midle mb-0" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$user->id}}">Delete</button>                      
                    </td>
                    
                  </tr>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="deleteModal-{{$user->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Delete comfirmation</h5>
                          <button type="button" class="align-center" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>

                        <div class="modal-body">
                          Are you sure you want to delete this user? (id:{{$user->id}})
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                          {{-- Send to route --}}                          
                          <form class="align-midle text-center d-inline-block ms-3 mb-0" action="{{route('users.delete',['id'=>$user->id])}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary">Delete</button>
                          </form>                          
                        </div>
                      </div>
                    </div>
                  </div>
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
        @if ($errors->has('id'))             
          <div class="alert ">
            <div id="warning" class="text-lg text-danger text-center">{{$errors->first('id')}}</div>
          </div>          
        @endif                
        
      </div>
    </div>                  
  </div>
  

@endsection

