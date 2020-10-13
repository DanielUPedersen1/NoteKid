<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link href="fonts/quicksand.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

    <title></title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 sidebar">
          <div class="list-group side-tags-section">
            <button type="button" class="list-group-item list-group-item-action active-note tag noborder mt-5">
              <i class="fa d-none d-lg-inline side-icon fa-bookmark-o"></i> All Notes
            </button>
            <button type="button" class="list-group-item list-group-item-action tag noborder mb-3">
              <i class="fa d-none d-lg-inline side-icon fa-trash-o"></i> Trash
            </button>

            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Work</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Programming</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Movies</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Music</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Comics</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Snippets</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Contacts</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> Lyrics</button>
            <button type="button" class="list-group-item list-group-item-action tag noborder"><i class="fa d-none d-lg-inline side-icon fa-hashtag"></i> ToDos</button>
          </div>
        </div>
        <div class="col-md-3 notes-bar">
          <div class="input-group mb-3 mt-3 pl-3 pr-3">
            <input type="text" class="form-control search" name="search" placeholder="Search notes">
            <div>
              <span class="create-note"><i class="create-note-icon" area-hidden="true"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></i></span>
            </div>
          </div>
          <hr></hr>
          <ul class="list-group list-group-flush notes-list">
            <li class="list-group-item single-note pt-1 pb-1">
              <span class="note-title"><h5>Grocery List</h5></span>
              <p class="note-snippet">Get flour, sweets, cakes and cady and also grab some more stuff to make...</p>
            </li>
            <li class="list-group-item single-note pt-1 pb-1">
              <span class="note-title"><h5>Quotes</h5></span>
              <p class="note-snippet">Get flour, sweets, cakes and cady and also grab some more stuff to make...</p>
            </li>
            <li class="list-group-item single-note pt-1 pb-1">
              <span class="note-title"><h5>Jokes</h5></span>
              <p class="note-snippet">Get flour, sweets, cakes and cady and also grab some more stuff to make...</p>
            </li>
            <li class="list-group-item single-note pt-1 pb-1">
              <span class="note-title"><h5>Recipies</h5></span>
              <p class="note-snippet">Get flour, sweets, cakes and cady and also grab some more stuff to make...</p>
            </li>
            <li class="list-group-item single-note pt-1 pb-1">
              <span class="note-title"><h5>Finances</h5></span>
              <p class="note-snippet">Get flour, sweets, cakes and cady and also grab some more stuff to make...</p>
            </li>
            <li class="list-group-item single-note pt-1 pb-1">
              <span class="note-title"><h5>Snippets</h5></span>
              <p class="note-snippet">Get flour, sweets, cakes and cady and also grab some more stuff to make...</p>
            </li>
          </ul>
        </div>
        <div class="col-md-7 contents-bar">
          <div class="content-title">
            <h1>Write down your ideas!</h1>
          </div>
          <div>
            <textarea id="content-body" style="display: none"></textarea>
          </div>
          <div class="content-body">
            <p>This is going to be the first line and I'll continue taking it forward for a bit and then decide to come down. But If I try to keep pushing the society, at some point, I'll suffer.</p>

            <p>However, the most important thing of this app for me is going to be the customizability and flexibility.</p>

            <h2>Don't limit yourself to plain text!</h2>
            <img src="image.jpg" width="80%">
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    {{-- <script type="text/javascript">
      function customMarkdownParser(plainText) {
        console.log(plainText);
        return plainText;
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
    </script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>