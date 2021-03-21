$(document).ready(function()
{
	    var url = '../functions/images.php';
	    var data = [];
	    var host = $(location).attr('hostname');

	    $('img').each(function(){
			data.push('http://content5.hunghapay.com'+$(this).attr('src'));
		});

	    $.post(url,
	    	{img : data},
	    	function(data){
	    		if (data != '1') {
	    			var src = [];
	    				src = data.split(';')
	    			var i = 0;
	    		$('img').each(function(){
					$(this).removeAttr( "src" );
					$(this).attr( "src",src[i]);
					++i;
				});	
	    		}
	    	});
});