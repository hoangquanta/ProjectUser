/*
|--------------------------------------------------------------------------
| Index Functions
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| Create User Functions
|--------------------------------------------------------------------------
|
*/
function showCreatePopup(){
    var myModal = new bootstrap.Modal(document.getElementById('create-popup'));
    myModal.show();   
}
//
function submitCreatePopup(event){
    event.preventDefault();
    var data = readUserInput("#create-popup");

    sendPostRequest("http://127.0.0.1:8000/api/users/", data, () => {
        //Before
        showLoader();
    }, (res) => {
        //Success
        hideLoader();
        $('#create-popup').modal('hide');
        showMessage("Create new user successfully");
        setTimeout(() => {
            location.reload();
        }, 1600);
    }, (ex) => {
        //Fail
        hideLoader();
        console.log(ex);
        showMessage("Create new user fail");
    });
}
function readUserInput(popupId){
    var form = document.querySelector(popupId + " form");
    var formData = new FormData(form);
    return formData;
}

/*
|--------------------------------------------------------------------------
| Update User Functions
|--------------------------------------------------------------------------
|
*/
function showUpdatePopup(userId){
    //Request user data from Axios request -> API route -> UserController->getUserById()
    sendGetRequest("http://127.0.0.1:8000/api/users/" + userId, ()=>{
        //Before executing
        showLoader(); 

    }, (response) => {
        //Success              
        hideLoader();
        showUserData(response);

    }, (ex)=>{
        //Fail
        hideLoader();
        console.log(ex);
    });    
}
function showUserData(response){
    //Access user data
    var user = response['data'];
    //Load data into form
    document.querySelector("#update-popup input[name=fullname").value = user.full_name;
    document.querySelector("#update-popup input[name=username]").value = user.username;
    document.querySelector("#update-popup input[name=password]").value = user.password;
    document.querySelector("#update-popup input[name=passwordConfirmation]").value = user.password;    

    //Pass userId from mainpage into the update button
    var userId = user.id;
    var confirmBtn = document.querySelector("#update-popup button.confirm-btn");
    confirmBtn.addEventListener('click', function (event) {
        submitUpdatePopup(event, userId);
    });
    //Show modal
    var modal = new bootstrap.Modal(document.getElementById('update-popup'));
    modal.show();
}
//
function submitUpdatePopup(event, userId){
    event.preventDefault();
    var data = readUserInput("#update-popup");

    sendPostRequest("http://127.0.0.1:8000/api/users/" + userId, data, () => {
        //Before executing
        showLoader();

    }, (res) => {
        //Success
        hideLoader();        
        $('#update-popup').modal('hide');
        showMessage("Updating user succeed");
        setTimeout(() => {
            location.reload();
        }, 1600);

        //Todo:
            //Close popup
            //Inform success message
    }, (ex) => {
        //Fail
        hideLoader();
        console.log(ex);
        showMessage("Updating user fail");
    });
}

/*
|--------------------------------------------------------------------------
| Delete User Functions
|--------------------------------------------------------------------------
|
*/
function showDeletePopup(userId){
    //Pass userId from mainpage into the delete button in delete popup
    var confirmBtn = document.querySelector("#delete-popup button.confirm-btn");
    confirmBtn.addEventListener('click', function () {
        submitDeletePopup(userId);
    });

    //Show modal
    var modal = new bootstrap.Modal(document.getElementById('delete-popup'));
    modal.show();
}
//
function submitDeletePopup(userId){
    sendDeleteRequest("http://127.0.0.1:8000/api/users/" + userId, () =>{
        showLoader();
    }, (res)=>{
        hideLoader();        
        $('#delete-popup').modal('hide');
        showMessage("Deleting user succeed");
        setTimeout(() => {
            location.reload();
        }, 1600);

    }, (ex)=>{
        hideLoader();
        console.log(ex);
        showMessage("Deleting user fail");
    });
}


/*
|--------------------------------------------------------------------------
| Axios Request Functions
|--------------------------------------------------------------------------
|
*/
async function sendGetRequest(url, onTaskBegin = null, onTaskCompleted = null, onTaskFailed = null){
    //Before executing task
    onTaskBegin?.();
    try{
        var data = await axios.get(url);

        //Execution successful
        onTaskCompleted?.(data);
        
    } catch(ex){
        //Execution fail
        onTaskFailed?.(ex);
    } 
}

async function sendPostRequest(url, data, onTaskBegin = null, onTaskCompleted = null, onTaskFailed = null){
    //Before executing task
    onTaskBegin?.();
    try{
        var res = await axios.post(url, data);
        //Execution successful
        onTaskCompleted?.(res);
        
    } catch(ex){
        //Execution fail
        onTaskFailed?.(ex.response.data);
    }  
}

async function sendDeleteRequest(url, onTaskBegin = null, onTaskCompleted = null, onTaskFailed = null){
    //Before executing task
    onTaskBegin?.();
    try{
        var response = await axios.delete(url);

        //Execution successful
        onTaskCompleted?.(response);

        
    } catch(ex){
        //Execution fail
        onTaskFailed?.(ex);
    } 
}


/*
|--------------------------------------------------------------------------
| Animation Functions
|--------------------------------------------------------------------------
|
*/
function showLoader(){
    $('#loading').attr('style', 'display: block');
}
function hideLoader(){    
    $('#loading').attr('style', 'display: none');
}
function showMessage(message) {
    var x = document.getElementById("snackbar");
    x.innerHTML = message;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
  }