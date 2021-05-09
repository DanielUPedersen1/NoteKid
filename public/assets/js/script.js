$(document).ready(function() {
	function getNotes(params = false) {
		$.ajax({
		  url: "/notes",
		  dataType: "json",
		  success: function (notes) {
		    $.each(notes, function(key, note) {
					var current = $('.cloneable-note').clone();
					$(current).removeClass('cloneable-note');
					$(current).find('.note-title-text').text(note.title);
					$(current).find('.note-snippet').text(note.title);
					$(current).appendTo('.notes-list').show();

					// if this is first note, also display
					// in reading panel
					if (key < 1) {
						$('#content-title > #content-title-text').text(note.title);
						$('#content-body').text(note.content)
					}
				});
		  },
		  error: function(jqXHR, textStatus, errorThrown) {
		    console.log(textStatus, errorThrown);
		  }
		});
	}

	getNotes();
});