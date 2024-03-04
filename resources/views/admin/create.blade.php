@extends('admin.layout')

@section('title', 'creation')


@section('content')
<h1 class="text-center">Formulaire de creation d'article</h1>

<form method="POST" action="{{ route('admin.store') }}">

    @csrf

    <div class="form-group">
      <label for="title">Titre</label>
      <input type="text" name="title" class="form-control" id="title" required>
    </div>
    <div class="form-group">
      <label for="description">Texte</label>
      <textarea class="form-control" name="description" id="description" rows="10" required></textarea>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="mt-3 btn btn-success btn-block">Enregistrer</button>
        </div>
    </div>
    
    
  </form>

@endsection