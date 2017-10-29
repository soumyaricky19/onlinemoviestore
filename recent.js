$(document).ready(function() 
{
		$.ajax({
			url: 'recent.php',
			type: 'GET',
			success:function(data){
				$("#recent").empty();
				$("#recent").append(data);
			}
		});	
});