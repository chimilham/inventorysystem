
$(document).ready(function() {
   $('#Football').hide();     
  });
  
//jQuery(function () {
   //     $("#txtDate").datepicker({
    //       changeMonth: true,
	//		changeYear: true,
	//		yearRange: "1960:2030"
			
    //    });
   // });

$(document).ready(function(){
    $('#option').on('change', function() {
      if ( this.value == '2')
      {
        $("#tu").show();
		$("#Football").hide();
      }      
	  else
	  {
		$("#Football").show();
		$("#tu").hide();
	  }
    });
});

