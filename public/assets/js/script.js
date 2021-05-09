$(document).ready(function() {
	function getNotes(params = false) {
		$.get( "ajax/test.html", function( data ) {
		  $( ".result" ).html( data );
		  alert( "Load was performed." );
		});
	}

	function getNotesByCategory(category) {

	}

	function getNotesByTag(tag) {

	}

	function getNotesByKeyword(keyword) {

	}

	let notes = getNotes()

});