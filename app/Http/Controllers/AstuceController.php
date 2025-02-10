<?php

namespace App\Http\Controllers;

use App\Models\Astuce;
use App\Models\AstuceImage;
use Illuminate\Http\Request;

class AstuceController extends Controller
{
    

public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'contenus' => 'required|string',
    ]);

    $astuce = Astuce::create([
        'titre' => $request->titre,
        'contenus' => $request->contenus,
        'user_id' => auth()->id(),
    ]);

    // Extraire les URLs des images du contenu
    preg_match_all('/<img.*?src="([^"]+)"/', $request->contenus, $matches);

    foreach ($matches[1] as $imageUrl) {
        AstuceImage::create([
            'astuce_id' => $astuce->id,
            'image_url' => $imageUrl
        ]);
    }

    return redirect()->route('astuces.index')->with('success', 'Astuce publiée avec succès !');
}

}
