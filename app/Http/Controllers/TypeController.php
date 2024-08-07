<?php
namespace App\Http\Controllers;

use App\Http\Requests\TypeCreateRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(6);
        return view('type.index', compact('types'));
    }

    public function create()
    {
        return view('type.create');
    }

    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    public function store(TypeCreateRequest $request)
    {
        $type = new Type();
        $type->nom = $request->validated()['nom'];
        $type->couleur = $request->validated()['couleur'];

        if ($request->hasFile('type_img_path')) {
            $path = $request->file('type_img_path')->store('images', 'public');
            $type->img_path = $path;
        }

        $type->save();
        return redirect()->route('type.index');
    }

    public function update(TypeUpdateRequest $request, Type $type)
    {
        $type->nom = $request->validated()['nom'];
        $type->couleur = $request->validated()['couleur'];

        if ($request->hasFile('type_img_path')) {
            $path = $request->file('type_img_path')->store('images', 'public');
            $type->img_path = $path;
        }

        $type->save();
        return redirect()->route('type.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back();
    }
}
