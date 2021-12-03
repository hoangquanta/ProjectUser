<div class="row my-4">
    <div class="col-12">        
      <div class="card">
        <h2 class="card-title ms-5 mt-5 d-inline">Manage Users</h2>
        {{-- Create New User --}}
        <div class="text-end">
            <button class="btn bg-gradient-primary btn_sm mb-2 me-5" onclick="showCreatePopup()">Add new</button>
        </div>
        
        <div class="table-responsive">
          <table class="table align-items-center mb-0">            
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
            <tbody>
              {{-- Main data section --}}
              @foreach ($users as $user)                                    
                <tr>
                  <td><h6 class="mb-0 text-sm" style="padding-left: 15px">{{$user->id}}</h6></td>                  
                  <td><p class="text-sm text-secondary mb-0">{{$user->full_name}}</p></td>                  
                  <td class="align-middle text-center text-sm">
                    <p class="text-secondary mb-0 text-sm">{{$user->username}}</p></td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-sm">{{$user->password}}</span></td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-sm">{{$user->created_by}}</span></td>                    
                  <td class="align-middle text-center">                                                  
                    {{--Edit User  --}}
                    <button class="btn bg-gradient-secondary btn_sm mb-0 me-3" onclick="showUpdatePopup('{{$user->id}}')">Edit</button> 
                    {{-- Delete User--}}
                    <button class="btn bg-gradient-danger btn_sm align-midle mb-0" onclick="showDeletePopup('{{$user->id}}')">Delete</button>                      
                  </td>
                </tr>                  
              @endforeach                                             
            </tbody>
            
          </table>
        </div>
      </div>  
      @if ($errors->has('id'))             
        <div class="alert ">
          <div id="warning" class="text-lg text-danger text-center">{{$errors->first('id')}}</div>
        </div>          
      @endif 
      @if (session('message')) <div class="noti text-success text-center mt-5"> {{ session('message') }} </div> @endif                    
    </div>
  </div>  