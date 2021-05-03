
var page;

 function init(){




  document.getElementById('contactForm').addEventListener('submit', function(e){process(e, 'Contact')}, false);


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
    addErrorMessage('inputEmail'+ page, 'Please enter a valid email address');
    err ++;
  }




  var firstname = document.getElementById('inputFirstname' + page).value;

  if (namePattern.test(firstname)) {
    removeErrorMessage('inputFirstname' + page);
  } else {
    addErrorMessage('inputFirstname' + page, 'The first name should be letters only and up to 15 characters');
    err ++;
  }



  var lastname = document.getElementById('inputLastname' + page).value;


  if (namePattern.test(lastname)) {
    removeErrorMessage('inputLastname' + page);
  } else {
    addErrorMessage('inputLastname' + page, 'The last name should be letters only and up to 15 characters');
    err ++;
  }

  var phoneNumber = document.getElementById('inputPhoneNumber' + page).value;

  if (phoneNumber=="") {
     removeErrorMessage('inputPhoneNumber' + page);


  } else { 

    if (phoneNumberPattern.test(phoneNumber)) {
      removeErrorMessage('inputPhoneNumber' + page);
    } else {
      addErrorMessage('inputPhoneNumber' + page, 'Please enter a valid 10-digit phone number');
      err ++;
    }

  } 

  var subject = document.getElementById('inputSubject' + page).value;


  if (subject != "") {
    removeErrorMessage('inputSubject' + page);
  } else {
    addErrorMessage('inputSubject' + page, 'Please add a subject to your message');
    err ++;
  }


  var messageForm = document.getElementById('inputMessage' + page).value;

  if (messageForm != "") {
    removeErrorMessage('inputMessage' + page);
  } else {
    addErrorMessage('inputMessage' + page, 'Please enter your message');
    err ++;
  }


  var message = "";

  if (err == 0) {
  

     window.location.replace("thankyou.php");


  } else {

  
  }
    


 

  if (evt.preventDefault)
    {
      evt.preventDefault();
    } else {
      evt.returnValue = false;
    }

  

}






window.addEventListener('load', init, false);
