var hackerNews = function() {

	this.checkNetworkStatus = function() {

	}

	this.loadItems = function() {

		$('#t1').show();
		$('#overlay').show();

		$.ajax({
	    	url:"/items",  
	    	success:function(data) {
	      		$('#items').html(data);
	      		$('#t1').hide();
	      		$('#overlay').hide();
	    	}
	  	});

	}

}

$(document).ready(function(){

	var hackerNewsClass = new hackerNews;
	hackerNewsClass.loadItems();

})