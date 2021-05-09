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
					$(current).appendTo('#notes-list').show();

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

	function getTags(params = false) {
		$.ajax({
		  url: "/tags",
		  dataType: "json",
		  success: function (tags) {
		    $.each(tags, function(key, tag) {
					var current = $('.cloneable-tag').clone();
					$(current).removeClass('cloneable-tag');
					$(current).find('.tag-title').text(tag.name);
					$(current).appendTo('#side-tags-section').show();
				});
		  },
		  error: function(jqXHR, textStatus, errorThrown) {
		    console.log(textStatus, errorThrown);
		  }
		});
	}

	getTags();
	getNotes();
});