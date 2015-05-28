$("button#submit").click( function() {
  $("#apply").hide();
    $.post( $("#apply").attr("action"),
	        $("#apply :input").serializeArray(),
			function(data) { //if data submitted successfully, hide the form otherwise, display form along with error message.
			if(data==0)
				{
			  $("div#ack").html("<h4>Result stored in database. Click here to submit another entry. Thank you.<h4>");
			   $( '#apply' ).each(function(){
    this.reset();
});
			  $("#apply").hide;
				}
			  else 
				{
			   $("div#ack").html("<h4>Error. Please enter details again and submit. Ensure that all details are entered<h4>");
			   $("#apply").show();}
			});
 
	$("#apply").submit( function() {
	   return false;	
	});

});
//make the form visible again for future entries
$("#ack").click(function(){
if($("#apply").is(':visible'))
{
}
else
{
$("div#ack").html("<h4>Enter your details below.</h4>");
$("#apply").show();
}
});