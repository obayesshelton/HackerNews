var hackerNews = function() {

	this.checkNetworkStatus = function() {

	}

	this.loadItems = function(feed, id) {

		$.ajax({
	    	url: feed,  
	    	success:function(data) {
	      		$('#' + id).html(data);
	    	}
	  	});

	}

}

function center(cElement) {
	var windowH = $(window).outerHeight()
	var elementH = $(cElement).outerHeight()
	var wH = windowH / 2
	var eH = elementH / 2

	var topH = (wH - eH)

	$(cElement).css({marginTop: topH, position: 'fixed'});

}

// function feedStart() {
// 	var windowH = $(window).outerHeight()
// 	var feedH = windowH - 70

// 	$('.wrapper').css({top: feedH});
// }

// function layout() {
// 	var windowW = $(window).outerWidth()

// 	var main = windowW - 400
// 	$('.wrapper').css({width: main});
// }

$(document).ready( function() {
	// center(headline)
	center(right_action)

	//var hackerNewsClass = new hackerNews;
	//hackerNewsClass.loadItems('/items-engadget', 'engadget');
	
	// layout()
	
	// feedStart()

	 // $('body').keyup(function(event) {
  //       var direction = null;
  //       // handle cursor keys
  //       if (event.keyCode == 37) {
  //           // slide left
  //           nextPage(animcursor);
  //       } else if (event.keyCode == 39) {
  //           // slide right
  //          nextPage(animcursor = 19);
  //       }

  //       if (direction != null) {
  //           $('.'+ direction).click()
  //       }
  //   });

$('.grow').on( 'click', function() {
			$('.wrapper').animate({left: '60%'}, 500);
			$('.author, .points').hide();
			$('.title').css({width: '60%'})

		} );




});

$(window).resize( function() {
	// center(headline)
	// feedStart()
		// layout()
		center(right_action)
});
