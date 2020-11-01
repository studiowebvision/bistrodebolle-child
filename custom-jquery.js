(function($) {

	// disable option value 'Kies een datum' in traiteurlijst page
	$("select option:contains('Kies een datum'),select option:contains('Kies een tijdstip')").attr("disabled","disabled").attr('value',"");

	var delay = 100; setTimeout(function() {
	$('.elementor-tab-title').removeClass('elementor-active');
	$('.elementor-tab-content').css('display', 'none'); }, delay);
})( jQuery );
	
	// ajax request by change date on traiteur bestelling
	jQuery( '#form-field-datum' ).change(function() {
		var datum = jQuery(this).val();
		jQuery.ajax({
			url : scriptjs.ajaxurl,
			type : 'post',
			data : {
				action : 'get_datum',
				datum : datum,
				security : scriptjs.security // security layer
			},
			success : function( response ) {
				jQuery('#form-field-uur_afhaling').empty();
				jQuery('#form-field-uur_afhaling').append(response);
			}
		});
	});

jQuery(function($){

	$('#form-field-datum').attr('autocomplete','off');
		var zaterdag;
 		$("#form-field-datum").datepicker({
		// change: function(dateText, inst) {
		format: 'DD-MM-YYYY',
		beforeShowDay: noMondays,
		    onSelect: function (dateText, inst) {

            var eventDate = $('#form-field-datum').val().split("/");
			var date_split = eventDate[1]+"/"+eventDate[0]+"/"+eventDate[2];
			var new_date = new Date(date_split);
			var dayOfWeek = new_date.getUTCDay();

			$('#form-field-uur,#form-field-lunch,#form-field-lunch,#form-field-lunch').val('');
				if(dayOfWeek ==5 || dayOfWeek == 2){
					// zaterdag
					// enkel diner
					$("#form-field-lunch option[value='Lunch'],option[value='Déjeuner']").attr('disabled', true);

					// selecteer automatisch diner
					$("#form-field-lunch option[value='Diner']").prop('selected',true);

					// verwijder lunch uren uit de lijst
					$("#form-field-uur option[value='12:00'],option[value='12:15'],option[value='12:30'],option[value='12:45'],option[value='13:00'],option[value='13:15'],option[value='13:30'],option[value='13:45']").attr('disabled', true);

						if(dayOfWeek == 5){
							// zaterdag enkel vanaf 19:00 reservaties
							$("#form-field-uur option[value='18:30'],option[value='18:45']").attr('disabled', true);
						}
						else{
							// geen zaterdag dan reservaties vooir 19:00
							$("#form-field-uur option[value='18:30'],option[value='18:45']").attr('disabled', false);
						}

				}
				else{
					// wel lunch bij andere dagen dan zaterdag en woensdag
					$("#form-field-lunch option[value='Lunch'],option[value='Déjeuner']").attr('disabled', false);
				}
            },

		defaultDate: new Date()
  }).on('changeDate',function(e){
        });

	  $('#form-field-lunch').change(function() {
		 // variable geselecteerd lunch of diner
		var geselecteerde_option = $(this).children("option:selected").val();
		$('#form-field-uur').val('');

		if( geselecteerde_option == 'Lunch' || geselecteerde_option =='Déjeuner' ){
			// zet lunch uren aan
			$("option[value='18:30'],option[value='18:45'],option[value='19:00'],option[value='19:15'],option[value='19:30'],option[value='19:45'],option[value='20:00'],option[value='20:15'],option[value='20:30'],option[value='20:45'],option[value='21:00'],option[value='21:15']").attr('disabled', true);
			// zet diner uren uit
			$("option[value='12:00'],option[value='12:15'],option[value='12:30'],option[value='12:45'],option[value='13:00'],option[value='13:15'],option[value='13:30'],option[value='13:45']").attr('disabled', false);
		}

		else if( geselecteerde_option == 'Diner' || geselecteerde_option == 'Dîner' || geselecteerde_option == 'Dinner'){
			// zet diner uren aan
			$("option[value='12:00'],option[value='12:15'],option[value='12:30'],option[value='12:45'],option[value='13:00'],option[value='13:15'],option[value='13:30'],option[value='13:45']").attr('disabled', true);
			// zet lunch uren uit
			$("option[value='18:30'],option[value='18:45'],option[value='19:00'],option[value='19:15'],option[value='19:30'],option[value='19:45'],option[value='20:00'],option[value='20:15'],option[value='20:30'],option[value='20:45'],option[value='21:00'],option[value='21:15']").attr('disabled', false);
		}
		else{} 

    });

		  // verberg reservatie formulier wanneer bevestigingsmelding verschijnt

	  // reservatie, cadeaubon, contact formulier
	  $('#reservatie,#cadeaubon,#contact').on('submit_success', function(){
		$('#reservatie > .elementor-form-fields-wrapper, #cadeaubon > .elementor-form-fields-wrapper, #contact > .elementor-form-fields-wrapper').hide();
   })


function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parenta = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});
});

function noMondays(date){
      if (date.getDay() === 1 || date.getDay() === 2)  /* Monday */
            return [ false, "closed", "Gesloten op maandag & dinsdag" ]
      else
            return [ true, "", "" ]
}

