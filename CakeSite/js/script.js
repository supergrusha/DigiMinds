$(document).ready(function(){


$(".col-md-4 .arrow.img-responsive.center-block").on({
 "mouseover" : function() {
    this.src = 'img/cake-buttonhover.jpg';
  },
  "mouseout" : function() {
    this.src='img/cake-button.jpg';
  }
});

var slider = $('ul.slider'); 
var effect = 'scrollHorz';


	if(slider.length > 0) {
		$('ul.slider').cycle({ 
			timeout:  6000,
			fx:     effect,
			pager: '.bannernav',
			next: '.arrow-right',
			prev: '.arrow-left'			
		});
}


});