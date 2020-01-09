$(".nav-sidebar li > a").click(function(e){
  $(".nav-sidebar > ul").slideUp(),$(this).next().is(":visible") || $(this).next().slideDown(),e.stopPropagation()
})
