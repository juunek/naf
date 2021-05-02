function init(){

  document.getElementById('donationForm').addEventListener('submit', process, false);
  document.getElementById('DonationType').addEventListener('change', showType, false);
   
} 


var xmlHttp;

function showType(){

    xmlHttp=GetXmlHttpObject();
    if (xmlHttp==null)
      {
        alert ("Your browser does not support AJAX!");// how to ensure users can still use the applicaiton?
        return;
      }

    var url ="donation_type_catalog.xml";

    var userInput = document.getElementById('DonationType').value;
  

    xmlHttp.addEventListener('readystatechange',function(){stateChanged(userInput)}, false);

    xmlHttp.open("GET",url,true);

    xmlHttp.send();
}

function stateChanged(userChoice){


  if (xmlHttp.readyState==4) {

     xmlDoc=xmlHttp.responseXML;

     var output = "";

     var typeArr = xmlDoc.getElementsByTagName("Type");
    
     var descriptionArr = xmlDoc.getElementsByTagName("Description");
    

     var exampleArr = xmlDoc.getElementsByTagName("Example");
    


     output = output + "<ul>";

    for(i=0;i<typeArr.length;i++){
        typeValue = typeArr[i].childNodes[0].nodeValue;
       
        if (typeValue == userChoice) {

          output = output + "<li>" + descriptionArr[i].childNodes[0].nodeValue + "</li>";
          output = output + "<li>" + exampleArr[i].childNodes[0].nodeValue + "</li>";

        }
     }

     output = output + "</ul>";

     
     document.getElementById("typeDetails").innerHTML = output;

  }


}



 function GetXmlHttpObject()
  {
    var xmlHttp=null;
    if (window.XMLHttpRequest) {
      xmlHttp = new window.XMLHttpRequest();// for non-IE browser
    } else if (window.ActiveXObject) {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); // for IE
    }
    return xmlHttp;
  }


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


function process(evt){

  var err = 0;

  // email validation 
  var email = document.getElementById('inputEmailDonation').value;
    var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    if (emailPattern.test(email)) {
      removeErrorMessage('inputEmailDonation');
    } else {
      addErrorMessage('inputEmailDonation', 'The email should follow xyz@abc.efg');
      err ++;
    }

    var firstName = document.getElementById('inputFirstnameDonation').value;
      var namePattern = /^([a-zA-Z ]){2,15}$/;
      if (namePattern.test(firstName)) {
        removeErrorMessage('inputFirstnameDonation');
      } else {
        addErrorMessage('inputFirstnameDonation', 'The first name should be filled and no more than 15 letters');
        err ++;
      } 

    var lastName = document.getElementById('inputLastnameDonation').value;
      var namePattern = /^([a-zA-Z ]){2,15}$/;
      if (namePattern.test(lastName)) {
        removeErrorMessage('inputLastnameDonation');
      } else {
        addErrorMessage('inputLastnameDonation', 'The last name should be filled and no more than 15 letters');
        err ++;
      }

      var phoneNumber = document.getElementById('inputPhoneNumberDonation').value;
      var phoneNumberPattern = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
      if (phoneNumberPattern.test(phoneNumber)) {
        removeErrorMessage('inputPhoneNumberDonation');
      } else {
        addErrorMessage('inputPhoneNumberDonation', 'The phone number should be numberic and contain 10 numbers');
        err ++;
      }  

      var type = document.getElementById('DonationType').value;
      console.log("typee: " + type);
      
      if (type == "none") {
         console.log("why: " + type);
       addErrorMessage('DonationType', 'Please select a type');
        err ++;
      } else {
         removeErrorMessage('DonationType');
      } 

    var donationDetail = document.getElementById('inputDetailDonation').value;
     
      if (donationDetail != "") {
        removeErrorMessage('inputDetailDonation');
      } else {
        addErrorMessage('inputDetailDonation', 'Please fill out donation details');
        err ++;
      }



//output the message when click submit
      var message = "";


      var jsFirstName = document.getElementById('inputFirstnameDonation').value;
      var jsLastName = document.getElementById('inputLastnameDonation').value;
      var jsEmail = document.getElementById('inputEmailDonation').value;
      var jsPhoneNumber = document.getElementById('inputPhoneNumberDonation').value;
      var jsDonationType = document.getElementById('DonationType').value;
      var jsDonationDetail = document.getElementById('inputDetailDonation').value;

      var inputArr = [jsFirstName, jsLastName, jsEmail, jsPhoneNumber, jsDonationType, jsDonationDetail];
     

      // Creating a cookie after the document is ready
      $(document).ready(function(){
          createCookie("cookieArr", inputArr, "10");
      });

      function createCookie(name, value, days){

          var expires;

          if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
          } else {
          expires = "";
          }
      
        document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";


      }
      
        if (err == 0) {

         window.location.replace("thankyou.php");


        } else {

         

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
