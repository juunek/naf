
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 86 || document.documentElement.scrollTop > 86) {
      document.getElementById("navbar").style.boxShadow = "0 14px 8px -10px grey";
  } else {
      document.getElementById("navbar").style.boxShadow = "0 0px 0px 0px grey";
  }
}




$(document).ready(function() {  
      function toggleNavbarMethod() {  
          if ($(window).width() > 992) {  
              $('.navbar .dropdown').on('mouseover', function(){  
                  $('.dropdown-toggle', this).trigger('click');   
              }).on('mouseout', function(){  
                  $('.dropdown-toggle', this).trigger('click').blur();  
              });  
          }  
          else {  
              $('.navbar .dropdown').off('mouseover').off('mouseout');  
          }  
      }  
      toggleNavbarMethod();  
      $(window).resize(toggleNavbarMethod);  
    });







 