

var mybutton = document.getElementById('goTop');


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 86 || document.documentElement.scrollTop > 86) {
      document.getElementById("navbar").style.boxShadow = "0 14px 8px -10px grey";
       mybutton.style.display = 'block';
  } else {
      document.getElementById("navbar").style.boxShadow = "0 0px 0px 0px grey";
      mybutton.style.display = 'none';
  }


}

   function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
