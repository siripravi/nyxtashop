
import "../scss/custom.scss";

  $(window).on('load',function(){
        $('#loader').fadeOut(500, function(){ $('#loader').remove(); } );
    });
 $(".navbar-toggler").on("click", function() {
    $(".menu").addClass("active");
	 $(".header").addClass("active");
	 $(".header").css("z-index","-1");
	 $(".super_container_inner").addClass("active");
  $(".overlay").fadeIn("slow")

})
$(".super_overlay").on("click", function() {
    $(".menu").removeClass("active");
	 $(".header").removeClass("active");
	 $(".header").css("z-index","100");
	 $(".super_container_inner").removeClass("active");
     $(".overlay").fadeIn("slow")

})
$(".header.active.header_overlay").on("click", function() {
    $(".menu").removeClass("active");
	 $(".header").removeClass("active");
	 $(".super_container_inner").removeClass("active");
     $(".overlay").fadeIn("slow")

})
$(".overlay").on("click", function() {

  $(this).fadeOut();
  $(".navbar-collapse").removeClass("in").addClass("collapse")
})

$(document).ready(function() {
  //carousel options
  $('#quote-carousel').carousel({
    pause: true, interval: 10000,
  });
});