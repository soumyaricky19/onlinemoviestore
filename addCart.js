$(document).ready(function(){

	$(document).on("click", "div.cartButton button", function(){
		var val = this.id;
		var movieId = val.substring(3);
		var quantity = "#qty"+movieId;

		if($(quantity).val() == ""){
			alert("Please provide the quantity.")
		}
		else{
			alert("Movie id: "+movieId);
			alert("Quantity: " + $(quantity).val());
			$("#"+this.id).text("Added");		
			$(quantity).val("");		
		}

		// $.ajax({
		// 	url: 'add_cart.php',
		// 	type: 'POST',
		// 	data:  {movie_id: movieId, quantity: $(quantity).val()},
		// 	success:function(data){
        //         alert(data);
        //         // alert("Added to cart");
		// 		$(this.id).hide();			
		// 	}
		// });
	});
});