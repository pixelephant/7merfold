$(document).ready(function(){$("#TripCountryId").change(function(){var e=$("#TripCountryId").val();$.post("/7merfold/regions/"+e,function(e){e=$.parseJSON(e);var t="";$.each(e,function(e,n){t+='<option value="'+e+'">'+n+"</option>"});$("#TripRegionId").html(t)})})});