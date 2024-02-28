<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{

    public function index(){
        // ? EAGER LOADING con il nome del metodo presente all'interno del model
        $cocktails = Cocktail::paginate(5);
        return response()->json(
            [
                "success" => true,
                "results" => $cocktails
            ]);
    }

    public function show(Cocktail $cocktail){
        return response()->json([
            "success" => true,
            "results" => $cocktail
        ]);
    }

    public function search(Request $request){
        $data = $request->all();

        if ( isset($data['title'])){
            $stringa = $data['title'];
            $cocktails = Cocktail::where('title', 'LIKE', "%{$stringa}%")->get();
        } elseif ( is_null($data['title'])) {
            $cocktails = Cocktail::all();
        } else {
            abort(404);
        }

        return response()->json([
            "success" => true,
            "results" => $cocktails,
            "matches" => count($cocktails)
        ]);
    }
}
