
function init(){



  document.getElementById('clientForm').addEventListener('submit', function(e){process(e, 'Client')}, false);


  document.getElementById('sameAsperson').addEventListener('click', samePersonCopy, false);
 

     
   
} 

function samePersonCopy() {

    if (document.getElementById('sameAsperson').checked == true) {


      document.getElementById('inputFirstnamePrimaryClient').value = document.getElementById('inputFirstnameSubmittingClient').value;
      document.getElementById('inputLastnamePrimaryClient').value = document.getElementById('inputLastnameSubmittingClient').value;
      document.getElementById('inputEmailPrimaryClient').value = document.getElementById('inputEmailSubmittingClient').value;
      document.getElementById('inputPhonePrimaryClient').value = document.getElementById('inputPhoneSubmittingClient').value;


    }


}






var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
var namePattern = /^([a-zA-Z ]){2,15}$/;
var phoneNumberPattern = /^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/;
var textPattern = /^([a-zA-Z ]){2,100}$/;
var addressPattern = /^[A-Za-z0-9'\.\-\s\,]/;
var zipPattern = /^[0-9]{5}(?:-[0-9]{4})?$/;



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
  
  // var emailSocial = document.getElementById('inputEmailSocial'+ page).value;

  // if (emailPattern.test(emailSocial)) {
  //   removeErrorMessage('inputEmailSocial'+ page);
  // } else {
  //   addErrorMessage('inputEmailSocial'+ page, 'The email should follow xyz@abc.efg');
  //   err ++;
  // }

  var emailSubmitting = document.getElementById('inputEmailSubmitting'+ page).value;


  if (emailPattern.test(emailSubmitting)) {
    removeErrorMessage('inputEmailSubmitting'+ page);
  } else {
    addErrorMessage('inputEmailSubmitting'+ page, 'Please enter a valid email address');
    err ++;
  }

/*  var emailPrimary = document.getElementById('inputEmailPrimary'+ page).value;


  if (emailPattern.test(emailPrimary)) {
    removeErrorMessage('inputEmailPrimary'+ page);
  } else {
    addErrorMessage('inputEmailPrimary'+ page, 'Please enter a valid email address');
    err ++;
  }
*/


  // firstname validation 


  var firstnameInfo = document.getElementById('inputFirstnameInfo' + page).value;

  if (namePattern.test(firstnameInfo)) {
    removeErrorMessage('inputFirstnameInfo' + page);
  } else {
    addErrorMessage('inputFirstnameInfo' + page, 'Please complete with letters only, up to 15 characters');
    err ++;
  } 


  // var firstnameSocial = document.getElementById('inputFirstnameSocial' + page).value;

  // if (namePattern.test(firstnameSocial)) {
  //   removeErrorMessage('inputFirstnameSocial' + page);
  // } else {
  //   addErrorMessage('inputFirstnameSocial' + page, 'The first name should be filled and no more than 15 letters');
  //   err ++;
  // } 



  var firstnameSubmitting = document.getElementById('inputFirstnameSubmitting' + page).value;

  if (namePattern.test(firstnameSubmitting)) {
    removeErrorMessage('inputFirstnameSubmitting' + page);
  } else {
    addErrorMessage('inputFirstnameSubmitting' + page, 'Please complete with letters only, up to 15 characters');
    err ++;
  } 

/*   var firstnamePrimary = document.getElementById('inputFirstnamePrimary' + page).value;

  if (namePattern.test(firstnamePrimary)) {
    removeErrorMessage('inputFirstnamePrimary' + page);
  } else {
    addErrorMessage('inputFirstnamePrimary' + page, 'The first name should be filled and no more than 15 letters');
    err ++;
  } 
*/

  // lastname validation 

var lastnameInfo = document.getElementById('inputLastnameInfo' + page).value;

  if (namePattern.test(lastnameInfo)) {
    removeErrorMessage('inputLastnameInfo' + page);
  } else {
    addErrorMessage('inputLastnameInfo' + page, 'Please complete with letters only, up to 15 characters');
    err ++;
  } 


  // var lastnameSocial = document.getElementById('inputLastnameSocial' + page).value;

  // if (namePattern.test(lastnameSocial)) {
  //   removeErrorMessage('inputLastnameSocial' + page);
  // } else {
  //   addErrorMessage('inputLastnameSocial' + page, 'The Last name should be filled and no more than 15 letters');
  //   err ++;
  // } 



  var lastnameSubmitting = document.getElementById('inputLastnameSubmitting' + page).value;

  if (namePattern.test(lastnameSubmitting)) {
    removeErrorMessage('inputLastnameSubmitting' + page);
  } else {
    addErrorMessage('inputLastnameSubmitting' + page, 'Please complete with letters only, up to 15 characters');
    err ++;
  } 

/*   var lastnamePrimary = document.getElementById('inputLastnamePrimary' + page).value;

  if (namePattern.test(lastnamePrimary)) {
    removeErrorMessage('inputLastnamePrimary' + page);
  } else {
    addErrorMessage('inputLastnamePrimary' + page, 'Please complete with letters only, up to 15 characters');
    err ++;
  } 
*/

  // phonenumber validation 


  // var phoneSocial = document.getElementById('inputPhoneSocial' + page).value;

  // if (phoneNumberPattern.test(phoneSocial)) {
  //   removeErrorMessage('inputPhoneSocial' + page);
  // } else {
  //   addErrorMessage('inputPhoneSocial' + page, 'The phone number should be numberic and contain 10 numbers');
  //   err ++;
  // } 


  var phoneSubmitting = document.getElementById('inputPhoneSubmitting' + page).value;

  if (phoneNumberPattern.test(phoneSubmitting)) {
    removeErrorMessage('inputPhoneSubmitting' + page);
  } else {
    addErrorMessage('inputPhoneSubmitting' + page, 'Please enter a valid 10-digit phone number');
    err ++;
  } 


/*    var phonePrimary= document.getElementById('inputPhonePrimary' + page).value;

  if (phoneNumberPattern.test(phonePrimary)) {
    removeErrorMessage('inputPhonePrimary' + page);
  } else {
    addErrorMessage('inputPhonePrimary' + page, 'The phone number should be numberic and contain 10 numbers');
    err ++;
  } 
*/

  // Address


  var street = document.getElementById('inputStreetAdd' + page).value;


  if (addressPattern.test(street)) {
    removeErrorMessage('inputStreetAdd' + page);
  } else {
    addErrorMessage('inputStreetAdd' + page, 'Please enter a street address');
    err ++;
  }


   var city = document.getElementById('inputCityAdd' + page).value;


  if (addressPattern.test(city)) {
    removeErrorMessage('inputCityAdd' + page);
  } else {
    addErrorMessage('inputCityAdd' + page, 'Please enter the city');
    err ++;
  }

  var state = document.getElementById('inputStateAdd' + page).value;


  if (addressPattern.test(state)) {
    removeErrorMessage('inputStateAdd' + page);
  } else {
    addErrorMessage('inputStateAdd' + page, 'Please enter the state');
    err ++;
  }

   var zipcode = document.getElementById('inputZipcodeAdd' + page).value;


  if (zipPattern.test(zipcode)) {
    removeErrorMessage('inputZipcodeAdd' + page);
  } else {
    addErrorMessage('inputZipcodeAdd' + page, 'Please enter the ZIP code');
    err ++;
  }



//birthday 


var birthdate = document.getElementById('inputBirthdayInfo' + page).value;

if (birthdate != "") {
removeErrorMessage('inputBirthdayInfo' + page);
  } else {
    addErrorMessage('inputBirthdayInfo' + page, 'Please enter the birthdate');
    err ++;
  }


// radio validation 


var chidlrenHomeArr = document.getElementsByName('client_childrenHome');
    var childrenHomeFlag = "";
    for (var i = 0; i < chidlrenHomeArr.length; i++) {
      if (chidlrenHomeArr[i].checked){
        childrenHomeFlag = chidlrenHomeArr[i].value;
        break;
      }
    }

    if (childrenHomeFlag == ""){
      addErrorMessage('client_childrenHome', 'Please choose an option');
      err ++;
    } else {
      removeErrorMessage('client_childrenHome');
    }


// describe spinal cord injury validation 

var DescribeSCIClient = document.getElementById('inputDescribeSCI' + page).value;

if (DescribeSCIClient != "") {
removeErrorMessage('inputDescribeSCI' + page);
  } else {
    addErrorMessage('inputDescribeSCI' + page, 'Please provide a description');
    err ++;
  }
  

// Type of assistance requested validation 

  var AssistanceRequestedList = []; // an empty array ready to store newsletter picks
      var AssistanceRequestedArr = document.getElementsByName('client_assistType');
       var AssistanceRequestedFlag = "";
      // loop through all checkboxes
      for (i=0;i<AssistanceRequestedArr.length ;i++ ){
        // for each checkbox, see if it is checked
        if (AssistanceRequestedArr[i].checked)
        {
          // add ('push') the value of this checked checkbox into the newsletterList array
         var AssistanceRequestedFlag = 1;
         break;
        }
      }

      if (AssistanceRequestedFlag == ""){
      addErrorMessage('client_assistType', 'Please select at least one option');
        err ++;
      } else {
        removeErrorMessage('client_assistType');
      }


// patient's needs in order of importance validation 

var PatientNeeds = document.getElementById('inputPatientNeeds' + page).value;

if (DescribeSCIClient != "") {
removeErrorMessage('inputPatientNeeds' + page);
  } else {
    addErrorMessage('inputPatientNeeds' + page, 'Please describe the patient\'s needs');
    err ++;
  }

  // Will patient be using catheters validation 


var client_catheterUseArr = document.getElementsByName('client_catheterUse');
    var client_catheterUseFlag = "";
    for (var i = 0; i < client_catheterUseArr.length; i++) {
      if (client_catheterUseArr[i].checked){
        client_catheterUseFlag = client_catheterUseArr[i].value;
        break;
      }
    }

    if (client_catheterUseFlag == ""){
      addErrorMessage('client_catheterUse', 'Please choose an option');
      err ++;
    } else {
      removeErrorMessage('client_catheterUse');
    }

  //client_insured

var client_insuredArr = document.getElementsByName('client_insured');
    var client_insuredFlag = "";
    for (var i = 0; i < client_insuredArr.length; i++) {
      if (client_insuredArr[i].checked){
        client_insuredFlag = client_insuredArr[i].value;
        break;
      }
    }

    if (client_insuredFlag == ""){
      addErrorMessage('client_insured', 'Please choose an option');
      err ++;
    } else {
      removeErrorMessage('client_insured');
    }


  //Is patient a mediacaid?*

var client_medicareArr = document.getElementsByName('client_medicare');
    var client_medicareFlag = "";
    for (var i = 0; i < client_medicareArr.length; i++) {
      if (client_medicareArr[i].checked){
        client_medicareFlag = client_medicareArr[i].value;
        break;
      }
    }

    if (client_medicareFlag == ""){
      addErrorMessage('client_medicare', 'Please choose an option');
      err ++;
    } else {
      removeErrorMessage('client_medicare');
    }

      //Is patient a veteran?*

var client_veteranArr = document.getElementsByName('client_veteran');
    var client_veteranFlag = "";
    for (var i = 0; i < client_veteranArr.length; i++) {
      if (client_veteranArr[i].checked){
       client_veteranFlag = client_veteranArr[i].value;
        break;
      }
    }

    if (client_veteranFlag == ""){
      addErrorMessage('client_veteran', 'Please choose an option');
      err ++;
    } else {
      removeErrorMessage('client_veteran');
    }
  



 

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


