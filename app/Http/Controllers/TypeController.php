<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{


    public function index()
    {

        $types = Type::paginate(6);
// dd($pokemons);

        return view('type.index', [
            'types' => $types,

        ]);
    }

    public function create()
    {
        return view('type.create');
    }






    public function destroy(Type $type)
   {
        $type->delete();
        return redirect()->back();
   }

}
