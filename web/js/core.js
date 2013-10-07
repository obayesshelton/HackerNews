var hackerNews = function() {

	this.checkNetworkStatus = function() {

	}

	this.loadCatgories = function() {

		$.ajax({
	    	url: '/categories/all',  
	    	success:function(data) {
	      		var container = $('#categories-list');
	    		$.each(data.categories, function(index, value) {
	    			container.append('<li class="icon icon-arrow-left"><a class="icon icon-display providers" onclick="hackerNews.loadProviders(' + value.id + ')">' + value.name + '</a></li>');
	    		});

	    	}
	  	});

	}

	this.loadProviders = function(id) {

		$.ajax({
	    	url: '/providers/categorid/' + id,  
	    	success:function(data) {
	      		
	    		$.each(data.providers, function(index, value) {


// BEN NEED TO LOOP THROUGH AND ADD PROVIDERS IN A LIST TO CLICK

	    			console.log(value);
	    		});

	    	}
	  	});

	}

	this.loadItems = function(id) {
		$.ajax({
	    	url: '/items/provider-id/' + id,  
	    	success:function(data) {
	    		var container = $('#items');
	      		$.each(data.items, function(index, value) {
	    			container.append('<li><div class="post_number">' + value.id + '</div><a href="' + value.link + '" class="title"><strong>' + value.title + '</strong> (' + value.pub_date + ')</a></li>');
	    		});
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
});

});

$(window).resize( function() {
	// center(headline)
	// feedStart()
		// layout()
		center(right_action)
});
