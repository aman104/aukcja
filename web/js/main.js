$(function() {

	$('.licitationForm input[type="text"]').blur(function() 
	{
		var val = parseInt($(this).val(), 10);
		var mod = (val % 10);		
		if(mod > 0)
		{		
			val = val + (10-(val%10));
			$(this).val(val);	
		}	
		
	});

	$('.main-gallery a').mouseover(function() {
	    $(this).find("span").show();
	  }).mouseout(function(){
	    $(this).find("span").hide();
	  });


	
});	

	function createJson()
	{		
		var i = 0;
		var json = '{"auctions": [';

		$('.auction-params').each(function() {
			var id = $(this).children('.auction-param-id').text();
			var hId = $(this).children('.auction-param-h-id').text();
			var t = $(this).children('.auction-param-time').text();
			
			if(i > 0) json += ',';

			json += '{"auction_id": "'+id+'", "history_id": "'+hId+'", "time": "'+t+'"}';

			i++;			
		});

		json += ']}';	
		
		return json;
	}

	function checkAuctions(one)
	{
		json = createJson();
		$.ajax({
		  url: '/check-auctions',
    	  processData: true,		  
		  async: false,
		  cache: false,
		  data: json,
		  type: "POST",
		  success: function(sData){
		      var arr = $.parseJSON(sData);
		      var length = arr['auction'].length;
			  for (var i = 0; i < length; i++) {
			  	if(! one)
			  	{
			  		updateAuction(arr['auction'][i]);
			  	}
			  	else
			  	{
			  		window.location = window.location;
			  	}
			  }

			  var d = new Date(arr['time'] * 1000);
			  

			  var text = $('#updates-text').text() + d.toLocaleTimeString();

			  $('#updates span').fadeOut();
		      $('#updates span').html(text);
		      $('#updates span').fadeIn();

		  }
		});
	}


	function updateAuction(id)
	{
		$.ajax({
		  url: '/update-auction/'+id,
		  async: false,
		  cache: false,
		  success: function(sData){
		  	  $('#tr-auction-'+id).fadeOut();
		      $('#tr-auction-'+id).html(sData);
		      $('#tr-auction-'+id).fadeIn();
		  }
		});	
	}

	function updateLastAuctions()
	{
		$.ajax({
		  url: '/update-last-auctions',
		  async: false,
		  cache: false,
		  success: function(sData){
		    $('#lastAuctions').html(sData);	  
		  }
		});	
	}


	
