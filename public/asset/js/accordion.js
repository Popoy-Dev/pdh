$(document).ready(function(){
  $(".accordion-title").click(function(e){
    console.log($())
    var accordionitem = $(this).attr("data-tab");
    $("#"+accordionitem).slideToggle().parent().siblings().find(".accordion-content").slideUp();

    $(this).toggleClass("active-title");
    $("#"+accordionitem).parent().siblings().find(".accordion-title").removeClass("active-title");

    $("i.mdi-chevron-down",this).toggleClass("mdi-chevron-up");
    $("#"+accordionitem).parent().siblings().find(".accordion-title i.mdi-chevron-up").removeClass("mdi-chevron-up");
  });

});
