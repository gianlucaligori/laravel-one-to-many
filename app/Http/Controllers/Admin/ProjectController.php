<?php

namespace App\Http\Controllers\Admin;

use App\Models\project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = project::paginate(5);

        return view('admin.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }
    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();

        $newProject->title          = $data['title'];
        $newProject->date           = $data['date'];
        $newProject->name           = $data['name'];
        $newProject->surname        = $data['surname'];
        $newProject->description    = $data['description'];
        $newProject->save();

        return to_route('admin.projects.show', ['project' => $newProject]);
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->title         = $data['title'];
        $project->date          = $data['date'];
        $project->name          = $data['name'];
        $project->surname       = $data['surname'];
        $project->description   = $data['description'];
        $project->update();

        return to_route('admin.projects.show', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('delete_success', $project);
    }
}
