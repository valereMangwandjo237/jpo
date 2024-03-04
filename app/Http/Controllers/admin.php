<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();

        return view("admin/all_article", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        session()->flash('status', 'Article ajouté!');

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::find($id);

        if (!$article) {
            // Si l'article n'est pas trouvé, retournez une réponse 404
            abort(404);
        }

        return view('admin/article', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('admin/edit', compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Récupérer les données du formulaire
        $data = $request->all();

        $rules = [
            'title' => 'required|string|max:100',
            'description' => 'required',
        ];

        $messages = [
            'title.required' => 'Le titre est requis.',
            'descrption.required' => 'Le texte est obligatoire est requis.',
        ];

        // Valider les données
        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            dd("error");
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        $article = Article::where('id', $id);
        $article->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        session()->flash('status', 'Article modifié avec succèss!');

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        session()->flash('status', 'Article supprimé avec succèss!');

        return redirect()->route('admin.index');
    }
}
