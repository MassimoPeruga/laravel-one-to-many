<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();
        $new_type = new Type();
        $new_type->fill($data);
        $new_type->slug = Str::slug($data['title']);
        $new_type->save();
        return redirect()->route('admin.types.index')->with('message', "Tipologia $new_type->title aggiunta correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $projects = Project::where('type_id', $type->id)->get();
        return view('admin.types.show', compact('type', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->slug = Str::of($data['title'])->slug('-');
        $type->update($data);

        return redirect()->route('admin.types.show', $type)->with('message', "Tipologia $type->title modificata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type_title = $type->tile;

        $type->delete();
        return redirect()->route('admin.types.index')->with('message', "Tipologia $type_title cancellata correttamente");
    }
}
