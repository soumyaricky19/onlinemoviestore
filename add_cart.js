$(document).ready(function() 
{
	$("#btn").click(function () {
		$.ajax({
			url: 'add_cart.php',
			type: 'POST',
			data:  {movie_id: $("#m").val() , quantity: $("#q").val()},
			success:function(data){
                alert(data);
                // alert("Added to cart");
				$("#add_btn").hide();			
			}
		});	
	});
});