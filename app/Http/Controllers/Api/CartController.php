<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  tableau associatif contenant uniquement les données validées.
         * @var array
         */
        $validated = $request->validate([
            'productId' => 'required|integer|exists:products,id',
        ]);

        /**
         * contient l'ID du produit
         * find retourne une instance du modele (type : objet)
         * @var mixed
         */
        $product = Product::find($validated['productId']);

        /**
         * Vérifie que le produit existe et qu'il est actif
         * response : Fonction helper Laravel qui crée un objet de réponse HTTP.
         * json : méthode de l'interface ResponseFactory qui Convertit
         * le tableau en format JSON (format utilisé en API).
         */
        if (!$product || !$product->active) {
            return response()->json([
                'message' => 'Produit non disponible.',
            ], 404);
        }

        //$product = Product::where('id', $request->productId)->firt();

        // return response()->json([
        //     'message' => 'Produit ajouté avec succès.',
        //     'product' => $product,
        // ]);

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
