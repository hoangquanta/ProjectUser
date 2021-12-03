
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
function submitCreatePopup(){
    var data = readUserInput("#create-popup");

    sendPostRequest("http://127.0.0.1:8000/api/users/", data, () => {
        //Before
        showLoader();
    }, () => {
        //Success
        hideLoader();
        //Todo:
            //Close popup
        informSuccess();
    }, (ex) => {
        //Fail
        hideLoader();
        console.log(ex);
    });
}
function readUserInput(popupId){
    //Read inputs
    var fullname = document.querySelector(popupId + " input[name=fullname").value;
    var username = document.querySelector(popupId + " input[name=username]").value;
    var password = document.querySelector(popupId + " input[name=password]").value;
    var passwordConfirm = document.querySelector(popupId + " input[name=passwordConfirmation]").value;
    
    //Parse to JSON
    var data = {
        "fullname": fullname,
        "username": username,
        "password": password,
        "passwordConfirm": passwordConfirm
    };
    var result = JSON.stringify(data);
    return result;
}

/*
|--------------------------------------------------------------------------
| Update User Functions
|--------------------------------------------------------------------------
|
*/
function showUpdatePopup(userId){
    sendGetRequest("http://127.0.0.1:8000/api/users/" + userId, ()=>{
        //Before executing
        showLoader(); 

    }, (data) => {
        //Success              
        hideLoader();
        showUserData(data);
        
    }, (ex)=>{
        //Fail
        hideLoader();
        console.log(ex);
    });
}
function showUserData(data){
    //Access user data
    var user = data['data'];
    //Load data into form
    document.querySelector("#update-popup input[name=fullname").value = user.full_name;
    document.querySelector("#update-popup input[name=username]").value = user.username;
    document.querySelector("#update-popup input[name=password]").value = user.password;
    document.querySelector("#update-popup input[name=passwordConfirmation]").value = user.password;    

    //Show modal
    var modal = new bootstrap.Modal(document.getElementById('update-popup'));
    modal.show();
}
//
function submitUpdatePopup(userId){
    var data = readUserInput("#update-popup");

    sendPostRequest("http://127.0.0.1:8000/api/users/" + userId, data, () => {
        //Before executing
        showLoader();

    }, () => {
        //Success
        hideLoader();

        //Todo:
            //Close popup
            //Inform success message
    }, (ex) => {
        //Fail
        hideLoader();
        console.log(ex);
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
    confirmBtn.addEventListener('click', submitDeletePopup(userId));

    //Show modal
    var modal = new bootstrap.Modal(document.getElementById('delete-popup'));
    modal.show();
}
//
function submitDeletePopup(userId){
    sendDeleteRequest("http://127.0.0.1:8000/api/users/" + userId, () =>{
        showLoader();
    }, ()=>{
        hideLoader();
        //todo:
            //inform deleting successful
    }, (ex)=>{
        hideLoader();
        console.log(ex);
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
        var data = await axios.post(url,data);

        //Execution successful
        onTaskCompleted?.(data);
        
    } catch(ex){
        //Execution fail
        onTaskFailed?.(ex);
    }  
}

async function sendDeleteRequest(url, onTaskBegin = null, onTaskCompleted = null, onTaskFailed = null){
    //Before executing task
    onTaskBegin?.();
    try{
        var data = await axios.delete(url);

        //Execution successful
        onTaskCompleted?.(data);
        
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