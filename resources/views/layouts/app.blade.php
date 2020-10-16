<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link href="assets/fonts/quicksand.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" >
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

    <title>NoteKid</title>
  </head>
  <body>
    <div class="container-fluid">
      @yield('contents')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.2.1.slim.min.js" ></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script type="text/javascript" src="assets/script.js"></script>
    <script type="text/javascript">
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
    </script>
  </body>
</html>