
// Button Animation Script 
function hover() {
    $(".button").on("mouseenter", function() {
      return $(this).addClass("hover");
    });
  }
  
  function hoverOff() {
    $(".button").on("mouseleave", function() {
      return $(this).removeClass("hover");
    });
  }
  
  function active() {
    $(".button").on("click", function() {
      return $(this).addClass("active");
    });
  }
  
hover();
hoverOff();
active();

// Form Toggler Script 
  document.getElementById("seeker").style.display='none';
  document.getElementById("seeker-info").style.display='none';


function show(shown, hidden, shown_pic, hidden_pic) {
  // Form
   document.getElementById(shown).style.display='block';
   document.getElementById(hidden).style.display='none';
  // Images 
   document.getElementById(shown_pic).style.display='block';
   document.getElementById(hidden_pic).style.display='none';
   return false;
}
