jQuery(document).ready(function($) {
  $('ul.selectdropdown').each(function(){
    var list=$(this),
      select = $(document.createElement('select')).insertBefore($(this).hide()).change(function () {
          window.open($(this).val(), '_self')
      });
    $('>li a', this).each(function(){
      var option=$(document.createElement('option'))
       .appendTo(select)
       .val(this.href)
       .html($(this).html());
      if($(this).attr('class') === 'selected'){
        option.attr('selected','selected');
      }
    });
    list.remove();
    });
});


jQuery(document).ready(function($){
  var offset = 100;
  var speed = 250;
  var duration = 500;
      $(window).scroll(function(){
          if ($(this).scrollTop() < offset) {
                    $('.topbutton') .fadeOut(duration);
          } else {
                    $('.topbutton') .fadeIn(duration);
          }
      });
   $('.topbutton').on('click', function(){
          $('html, body').animate({scrollTop:0}, speed);
          return false;
          });
});