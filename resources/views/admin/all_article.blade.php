@extends('admin.layout')

@section('title', 'Articles')


@section('content')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
    <h1 class="text-center font-weight-bold">
      Listes de articles 
      <a class="btn btn-success" href="{{ route('admin.create')}}">Ajouter un article</a>
    </h1>
    <div class="row">
      @foreach ($articles as $article)
      <div class="col-md-6">
        <div class="card mb-6" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="image_illutstrative">
          <div class="card-body">
            <h5 class="card-title">{{ $article->title}}</h5>
            <p class="card-text">{{ Str::limit($article->description, 100, '...') }}</p>
            <a href="{{ route('admin.show', $article)}}" class="btn btn-primary">Voir plus</a>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>

@endsection