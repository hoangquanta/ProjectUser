{{-- Editing Popup --}}
<div class="modal fade" id="update-popup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Edit a user</h5>
          <button type="button" class="align-center" data-bs-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <div class="card card-plain">       
            <div class="card-body pb-3">
              <form  role="form" method="POST">
                                  
                <label>Fullname</label>
                <div class="mb-3">
                  <input name="fullname" type="text" class="form-control" placeholder="Fullname" value="{{old('fullname')}}">
                </div>
                @if ($errors->has('fullname'))
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
                  <input name="passwordConfirmation" type="password" class="form-control" placeholder="Confirm Password" value="{{old('passwordConfirmation')}}">
                </div>    
                @if ($errors->has('passwordConfirmation'))
                    <div class="text-danger text-end mt-n3 ">{{$errors->first('passwordConfirmation')}}</div>
                @endif

              </form>
            </div>                        
          </div>
        </div>
        <div class="modal-footer">
            {{-- Todo: cancel and submit form --}}
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>               
          <button type="button" class="btn btn-primary confirm-btn">Update</button>                       
        </div>
      </div>
    </div>
</div>  