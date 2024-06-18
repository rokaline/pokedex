<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttaqueCreateRequest;
use App\Models\Attaque;
use Illuminate\Http\Request;

class AttaqueController extends Controller
{

    public function index()
    {

    //    $pokemon->attaque = $request->validated()['attaque'];
    //    $pokemon->image = $request->validated()['attaque_image_path'];
    //    $pokemon->dégâts =$request->validated()['dégâts'];
    //    $pokemon->description = $request->validated()['description'];

        $attaques = Attaque::paginate(6);
// dd($attaques);
//return "Ceci est un test pour la vue des attaques";



        return view('attaque.index', [
            'attaques' => $attaques,

        ]);
    }


    /*pour affichage du attaque et ses caracteristiques*/
//     public function show($id)
//     {
// //dd($id);
//         $attaque = Attaque::with(['attaques', 'attaques.type'])->findOrFail($id);

//         return view('attaque.show', compact('attaque'));
//     }


    public function create()
    {
        return view('attaque.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dégâts' => 'required|integer|min:0',
            'description' => 'required|string|max:1000',
            'type_id' => 'required|exists:types,id',  // S'assurer que le type_id envoyé existe dans la table des types
        ]);

        $attaque = new Attaque();
        $attaque->nom = $request->nom;
        $attaque->dégâts = $request->dégâts;
        $attaque->description = $request->description;
        $attaque->type_id = $request->type_id; // Assurez-vous que cette valeur est fournie par la requête

        if ($request->hasFile('img_path')) {
            $path = $request->file('img_path')->store('attaques', 'public');
            $attaque->img_path = $path;
        }

        $attaque->save();

        return redirect()->route('attaque.index');  // Modifier selon le nom de la route appropriée
    }



   /**
    * Display the specified resource.
    */

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Attaque $attaque)
   {
       $types = Attaque::all();
       $attaques = Attaque::all();
       return view('admin.attaques.edit', compact('attaque', 'types', 'attaques'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(AttaqueUpdateRequest $request, Attaque $attaque)
   {
       // On modifie les propriétés du attaque
       $attaque->nom = $request->validated()['nom'];
       $attaque->image = $request->validated()['image_path'];
       $attaque->pv = $request->validated()['pv'];
       $attaque->poids = $request->validated()['poids'];
       $attaque->taille = $request->validated()['taille'];
       $attaque->couleur =$request->validated()['type'];
       $attaque->image = $request->validated()['type_image_path'];
       $attaque->couleur = $request->validated()['couleur'];
       $attaque->attaque = $request->validated()['attaque'];
       $attaque->image = $request->validated()['attaque_image_path'];
       $attaque->dégâts =$request->validated()['dégâts'];
       $attaque->description = $request->validated()['description'];


       // Si il y a une image, on la sauvegarde
       if ($request->hasFile('image')) {
           $path = $request->file('image')->store('attaques', 'public');
           $attaque->img_path = $path;
       }

       // On sauvegarde les modifications en base de données
       $attaque->save();

       return redirect()->back();




// // Création de l'attaque
        // $attaque = new Attaque();
        // $attaque->nom = $request->validated()['attaque_nom'];
        // $attaque->dégâts = $request->validated()['dégâts'];
        // $attaque->description = $request->validated()['description'];
        // $attaque->type_id = $type->id; // Associer l'attaque au type créé ci-dessus

        // // Récupérer et enregistrer l'image de l'attaque
        // if ($request->hasFile('attaque_img_path')) {
        //     $attaquePath = $request->file('attaque_img_path')->store('attaques', 'public');
        //     $attaque->img_path = $attaquePath;
        // }

        // $attaque->save();
        // $pokemon->attaques()->attach($attaque);


   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Attaque $attaque)
   {
       $attaque->delete();
       return redirect()->back();
   }
}
