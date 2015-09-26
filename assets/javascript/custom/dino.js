// dino js
var bheight = $(window).height();

$('#mainnav').css('top', bheight+20);

function toggleList() {
  $('.group-header').toggleClass('open');
  $('.navigation').toggleClass('topnav-open');
  //if ($('.navigation').hasClass('topnav-open')){
  //  $('.button.plus').bind('click', toggleList);  
  //} else {
  //  $('.button.plus').unbind('click', toggleList);  
  //}
}

$('#group-overview').click(function() {
  toggleList();
});

$('.burger').click(function() {
  $('#mainnav').toggleClass('open')
  $('.navigation').toggleClass('mainnav-open')
});

