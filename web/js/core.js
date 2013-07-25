var hackerNews = function() {

	this.checkNetworkStatus = function() {

	}

	this.loadItems = function() {

		$('#items').html('<img src="bootstrap/img/ajax-loader.gif"/>');

		$.ajax({
	    	url:"/items",  
	    	success:function(data) {
	    		$('#items').html('');
	      		$('#items').html(data);
	    	}
	  	});

	}

}

$(document).ready(function(){

	var hackerNewsClass = new hackerNews;
	hackerNewsClass.loadItems();

})