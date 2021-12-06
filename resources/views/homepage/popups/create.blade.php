<!-- Creating Popup -->
<div class="modal fade" id="create-popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bolder" id="deleteModalLabel">Create new user</h5>
          <button type="button" class="align-center" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <div class="card card-plain">              
            <div class="card-header pb-0 text-left">
              <p class="mb-0">Enter account information to register</p>
            </div>              
            <div class="card-body pb-3">
              <form role="form">
                @csrf

                <label>Fullname</label>
                <div class="mb-3">
                  <input name="fullname" type="text" class="form-control fullname" placeholder="Fullname" value="{{old('fullname')}}">
                </div>
                @if ($errors->first('fullname'))
                    <div class="text-danger text-end mt-n3 ">{{$errors->first('fullname')}}</div>
                @endif
    
                <label>Username</label>
                <div class="mb-3">
                  <input name="username" type="text" class="form-control" placeholder="Username" value="{{old('username')}}">
                </div>
                @if ($errors->has('username'))
                    <div class="text-danger text-end mt-n3 ">{{$errors->first('username')}}</div>
                @endif
    
                <label>Password</label>
                <div class="mb-3">
                  <input name="password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                </div>
                @if ($errors->has('password'))
                    <div class="text-danger text-end mt-n3 ">{{$errors->first('password')}}</div>
                @endif
    
                <label>Confirm Password</label>
                <div class="mb-3">
                  <input name="passwordConfirmation" type="password" class="form-control" placeholder="Password" value="{{old('passwordConfirmation')}}">
                </div>   
                @if ($errors->has('passwordConfirmation'))
                    <div class="text-danger text-end mt-n3 ">{{$errors->first('passwordConfirmation')}}</div>
                @endif                 
                
                <div class="text-center">
                  <button class="btn bg-gradient-primary w-100 mt-4 mb-0" onclick="submitCreatePopup(event)">Create</button>
                </div>
              </form>
            </div>                        
          </div>
        </div>            
      </div>
    </div>
</div>