$(document).ready(function() {
	function getNotes(params = false) {
		$.ajax({
		  url: "/notes",
		  dataType: "json",
		  success: function (notes) {
		    $.each(notes, function(key, note) {
					var current = $('.cloneable-note').clone();
					$(current).find('.note-title-text').text(note.title);
					$(current).find('.note-snippet').text(note.title);
					$(current).appendTo('.notes-list').fadeIn('fast');
				});
		  },
		  error: function(jqXHR, textStatus, errorThrown) {
		    console.log(textStatus, errorThrown);
		  }
		});
	}

	getNotes();
});