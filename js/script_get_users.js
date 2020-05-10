$( function() {

	var oldVal, newVal, id;

	$( '.edit' ).keypress( function( e ) {
		if ( e.which == 13 ) {
			return false;
		}
	} );

	$( '.edit' ).focus( function() {
		oldVal = $( this ).text();
		id = $( this ).data( 'id' );
	} ).blur( function() {
		newVal = $( this ).text();
		if ( newVal != oldVal ) {
			$.ajax ( {
				url: 'users.php',
				type: 'POST',
				data: {new_val: newVal, id: id},
				success: function( res ) {
					console.log( res );
				}, 
				error: function() {
					alert( 'Error!' );
				}
			} );
		} else console.log("Значеник не изменено");
	});

} );