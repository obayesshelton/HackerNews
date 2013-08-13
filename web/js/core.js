var hackerNews = function() {

	this.checkNetworkStatus = function() {

	}

	this.loadItems = function() {

		$('.spinner').show();

		$.ajax({
	    	url:"/items",  
	    	success:function(data) {
	      		$('#items').html(data);
	      		$('.spinner').hide();
	    	}
	  	});

	}

}

$(document).ready(function(){

	var hackerNewsClass = new hackerNews;
	hackerNewsClass.loadItems();

})