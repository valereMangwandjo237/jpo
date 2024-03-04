@extends('admin.layout')

@section('title', 'Articles')


@section('content')
<h1 class="text-center">Formulaire de modification, article #{{ $article->id}}</h1>

<form method="POST" action="{{ route('admin.update',  $article->id) }}">

    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="title">Titre</label>
      <input type="text" name="title" class="form-control" id="title" value="{{ $article->title}}" required>
    </div>
    <div class="form-group">
      <label for="description">Texte</label>
      <textarea class="form-control" name="description" id="description" rows="10" required>{{ $article->description }}</textarea>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="mt-3 btn btn-success btn-block">Mettre à jour</button>
        </div>
    </div>
    
    
  </form>

@endsection