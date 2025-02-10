<?php
namespace App\Http\Controllers;

use App\Models\Enregistrement;
use App\Models\Astuce;
use Illuminate\Http\Request;

class EnregistrementController extends Controller
{
    // Afficher tous les posts enregistrés par l'utilisateur
    public function index()
    {
        $savedPosts = auth()->user()->savedPosts()->with('user')->latest()->get();
        return view('enregistrements.index', compact('savedPosts'));
    }

    // Enregistrer un post
    public function store(Request $request, Astuce $post)
    {
        // Vérifier si l'utilisateur a déjà enregistré ce post
        if (!auth()->user()->savedPosts()->where('astuce_id', $post->id)->exists()) {
            auth()->user()->savedPosts()->attach($post->id); // Enregistrer le post
            return redirect()->back()->with('success', 'Astuce enregistré avec succès.');
        }

        return redirect()->back()->with('info', 'Vous avez déjà enregistré ce post.');
    }

    // Supprimer un post enregistré
    public function destroy(Astuce $post)
    {
        auth()->user()->savedPosts()->detach($post->id); // Supprimer le post enregistré
        return redirect()->back()->with('success', 'Astuce retiré de vos enregistrements.');
    }
}