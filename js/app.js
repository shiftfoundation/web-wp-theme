jQuery(function($){
  $('.menu-toggle').click(function(){
    $('#masthead').toggleClass('active');
  });

  $('.subnav a').click(function(){

    $(this).parent().addClass('selected').siblings().removeClass('selected');
    
    window.location = $(this).attr('href');
    
    $(window).scrollTop(0);

    return false;
  }).first().click();
  
});
