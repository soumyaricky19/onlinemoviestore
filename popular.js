$(document).ready(function() 
{
		$.ajax({
			url: 'popular.php',
			type: 'GET',
			success:function(data){
				$("#popular").empty();
				$("#popular").append(data);
			}
		});	
});