$(document).ready(function() {
     $('a[name=modal]').click(function(e) {
     e.preventDefault();
     var id = $(this).attr('href');
     /*var maskHeight = $(document).height();*/
     var maskHeight = $(document).height();
     var maskWidth = $(document).width();     
/*     var maskHeight = $(window).height();
     var maskWidth = $(window).width();*/
     $('#mask').css({'width':maskWidth,'height':maskHeight});
     $('#mask').fadeIn(1000);
     $('#mask').fadeTo("slow",0.8);
     var winH = $(window).height();
     var winW = $(window).width();
     $(id).css('top', winH/2-$(id).height()/2);
     $(id).css('left', winW/2-$(id).width()/2);
     $(id).fadeIn(2000);
     });
     $('.window .close').click(function (e) {
     e.preventDefault();
     $('#mask, .window').hide();
     });
     $('#mask').click(function () {
     $(this).hide();
     $('.window').hide();
     });
     });
     
     
     
     
     $(document).ready(function () {
     $(window).resize(function () {
        var box = $('#modalBoxes .window');
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
      
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
               
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();
        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);
});
});