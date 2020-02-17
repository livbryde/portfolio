 //Masonry

jQuery(document).ready(function($){

var $container = $('.masonry').imagesLoaded( function() {
//var $container = $('.masonry');
$container.imagesLoaded(function(){
$container.masonry({
  // options
  //columnWidth: '.grid-sizer',
  itemSelector: '.grid-item',
  percentPosition: true,
  //columnWidth: 200
});});});

// init Masonry
var $grid = $('.portfolio-gallery').masonry({
  itemSelector: ".album-item",
});
// layout Masonry after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});

  $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
  $('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
      menu.removeClass('open');
    } else {
      menu.addClass('open');
    }
  });
});

