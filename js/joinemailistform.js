
var page;

 function init(){



  document.getElementById('joinlistForm').addEventListener('submit', function(e){process(e, 'Joinlist')}, false);
  
 
   
} 

var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
var namePattern = /^([a-zA-Z ]){2,15}$/;
var phoneNumberPattern = /^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/;
var textPattern = /^([a-zA-Z ]){2,100}$/;



function addErrorMessage(fieldId, msg){
    //console.log(msg);
    

    // check if an error message span is available
    if (document.getElementById(fieldId + "ErrMsg"))
    {
      // an error message span is already available, use it
      document.getElementById(fieldId + "ErrMsg").innerHTML = msg;
      document.getElementById(fieldId + "ErrMsg").style.display = "block";
    } else {
      
      // otherwise, create the error message span
      var messageSpan = document.createElement("span");
      messageSpan.className = "errMsg"; // set the CSS class to use
      messageSpan.id = fieldId + "ErrMsg"; // set the id
      messageSpan.innerHTML = msg;

      var inputLabel = document.getElementById(fieldId+'Label');
      console.log("inputLabel " + inputLabel);
      inputLabel.parentNode.appendChild(messageSpan);
      
    }
    
  }

 function removeErrorMessage (fieldId){
    if (document.getElementById(fieldId + "ErrMsg"))
    {
      document.getElementById(fieldId+"Label").style.color = "black";
      document.getElementById(fieldId + "ErrMsg").style.display = "none";
     
    }
    
  }



  function process(evt, page) {

    var err = 0;


  // email validation 
  

  var email = document.getElementById('inputEmail'+ page).value;


  if (emailPattern.test(email)) {
    removeErrorMessage('inputEmail'+ page);
  } else {
    addErrorMessage('inputEmail'+ page, 'The email should follow xyz@abc.efg');
    err ++;
  }




  var firstname = document.getElementById('inputFirstname' + page).value;

  if (namePattern.test(firstname)) {
    removeErrorMessage('inputFirstname' + page);
  } else {
    addErrorMessage('inputFirstname' + page, 'The first name should be filled and no more than 15 letters');
    err ++;
  } 

 

  var lastname = document.getElementById('inputLastname' + page).value;


  if (namePattern.test(lastname)) {
    removeErrorMessage('inputLastname' + page);
  } else {
    addErrorMessage('inputLastname' + page, 'The last name should be filled and no more than 15 letters');
    err ++;
  }


  var message = "";

  if (err == 0) {

    message = "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
    message += "<div class='modal-dialog'>";
    message += "<div class='modal-content'>";
    message += "<div class='modal-header'>";
    message += "<h5 class='modal-title' id='exampleModalLabel'>Thank you!</h5>";
    message += "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    message += "</div>";
    message += "<div class='modal-body'>";
    message += "You have submitted the following information. Thank you for your submission.<br><ul> ";
    message += "<li>First name: " + document.getElementById('inputFirstname' + page).value + "<br/>";
    message += "<li>Last name: " + document.getElementById('inputLastname' + page).value + "<br/>";
    message += "<li>Email: " + document.getElementById('inputEmail' + page).value + "<br/>";
   
    message += "</ul>";
    message += "</div>";


    message += "<div class='modal-footer'>";
    message += "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Do it again</button>"
    message += "<a href='test-"+page+".html' type='button' class='btn btn-success'>Correct?</a>"


    


  } else {

    message = "There are errors.";

  }



  console.log("message: " + message);

  document.getElementById('response').innerHTML = message;

  if (evt.preventDefault)
  {
    evt.preventDefault();
  } else {
    evt.returnValue = false;
  }


}


 



window.addEventListener('load', init, false);


