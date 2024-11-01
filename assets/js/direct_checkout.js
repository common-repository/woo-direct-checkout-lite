jQuery(document).ready(function ($) {
    jQuery(".chk_out").on('click', function(event) { 
		
        if(jQuery('input.variation_id').val()!=0 && jQuery('.chk_out ').is('.wc-variation-is-unavailable') != true){
		if(!jQuery('.qty').val()){ // getting product quantity from quantity field 
			$qty=1;
		}else{
		$qty=jQuery('.qty').val();
		}
		var data = {
			
            action: "ca_myaction",
            'id': jQuery(this).attr('key'),
			'quantity': $qty,
			
        };
        //ajax request 
        jQuery.post(ajax_object.ajax_url,
            data
            , function (response) {
			
                if (response != "not added")
                    document.location.href = response;
            });
        }
        else{
            event.preventDefault();

        }
    });

});