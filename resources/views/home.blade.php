@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-2 sidebar">
    @include('sidebar')
  </div>

  <div class="col-md-3 notes-bar">
    @include('notesbar')
  </div>

  <div class="col-md-7 contents-bar">
    @include('contentsbar')
  </div>
</div>
@endsection
