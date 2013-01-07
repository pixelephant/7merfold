$(document).ready(
	function()
	{
		$('textarea:not(.non-redactor)').redactor({
			toolbar: 'custom'
		});
		setTimeout(function(){
			$("label[for=TripPrice]").parent().find(".redactor_frame").css("height", "250px");
		}, 2000);
		
	}
);