$(document).ready(function() {
	function customMarkdownParser(plainText) {
    console.log(plainText);
    return plainText;
  }

	function getNotes(params = false) {
		$.ajax({
		  url: "/notes",
		  dataType: "json",
		  success: function (notes) {
		    $.each(notes, function(key, note) {
					var current = $('.cloneable-note').clone();
					$(current).removeClass('cloneable-note');
					$(current).find('.note-title-text').text(note.title);
					$(current).find('.note-snippet').text(note.content.substring(0,75) + '...');
					$(current).appendTo('#notes-list').show();

					// if this is first note, also display
					// in reading panel
					if (key < 1) {
						$('#content-title > #content-title-text').text(note.title);
						simplemde.value(note.content)
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

	var simplemde = new SimpleMDE({
    element: $("#content-body")[0],
    status: false,
    toolbar: false,
    spellChecker: false,
    previewRender: function(plainText) {
      return customMarkdownParser(plainText); // Returns HTML from a custom parser
    }
  });

  $('.CodeMirror-wrap').css({'border': 'none', 'padding': 0});

	getTags();
	getNotes();
});