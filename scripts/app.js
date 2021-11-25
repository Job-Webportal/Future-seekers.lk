// Scripting For Submit button 
function hover() {
  $(".submitBtn").on("mouseenter", function() {
      return $(this).addClass("hover");
  });
  }

  function hoverOff() {
  $(".submitBtn").on("mouseleave", function() {
      return $(this).removeClass("hover");
  });
  }

  function active() {
  $(".submitBtn").on("click", function() {
      return $(this).addClass("active");
  });
}

hover();
hoverOff();
active();

