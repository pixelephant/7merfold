$(document).ready(function(){

	$('#TripCountryId').change(function() {
		var country = $('#TripCountryId').val();
	  $.post('/regions/' + country, function(data) {
	  	  data = $.parseJSON(data);
	  	  var options = '<option value="">Nincs régió</option>';
		  $.each(data, function(id, name) {
		    options += '<option value="' + id + '">' + name + '</option>';
		  });
		  $("#TripRegionId").html(options);
		});
	});

});