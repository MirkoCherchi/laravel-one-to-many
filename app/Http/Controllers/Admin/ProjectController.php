<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validated($request);

        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $project = new Project();

        $project->fill($data);

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Il progetto "' . $project->title . '" è stato creato correttamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $this->validated($request);
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);
        $project->update($data);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Il progetto "' . $project->title . '" è stato eliminato correttamente.');
    }

    public function validated(Request $request)
    {


        $messages = [
            'title.required' => 'Il campo Titolo è obbligatorio.',
            'description.nullable' => 'Il campo Descrizione deve essere vuoto o valido.',

        ];
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',

        ], $messages);
    }
}
