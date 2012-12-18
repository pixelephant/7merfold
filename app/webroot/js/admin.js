$(document).ready(function(){

	$('#TripCountryId').change(function() {
		var country = $('#TripCountryId').val();
	  $.post('/7merfold/regions/' + country, function(data) {
	  	  data = $.parseJSON(data);
	  	  var options = '';
		  $.each(data, function(id, name) {
		    options += '<option value="' + id + '">' + name + '</option>';
		  });
		  $("#TripRegionId").html(options);
		});
	});

});