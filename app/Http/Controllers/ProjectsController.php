<?php

namespace App\Http\Controllers;

use App\Events\ProjectCreatedEvent;
use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//can apply to certain methods
    }

    public function index(){
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){

        $attributes = $this->validateProject();
        $attributes['owner_id'] = auth()->id();
//        $project = new Project();
//        $project->title = request('title');
//        $project->description = request('description');
//        $project->save();
        $project = Project::create($attributes);
        event(new ProjectCreatedEvent($project));
        flash('New project has been created.');
        return redirect('/projects');
    }

    public function show(Project $project){
        //GET|HEAD  | projects/{project}      | projects.show
        $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }
    public function update(Request $request, Project $project){
        //PUT|PATCH | projects/{project}      | projects.update
        $attributes = $this->validateProject();
        $project->update($attributes);
        flash('Project has been updated.');
        return redirect($project->path());
    }
    public function destroy(Project $project){
        //DELETE    | projects/{project}      | projects.destroy
        $project->delete();
        flash('Project has been deleted.');
        return redirect('/projects');
    }
    public function edit(Project $project){
        //GET|HEAD  | projects/{project}/edit | projects.edit
        return view('projects.edit', compact('project'));
    }
    protected function validateProject(){
        return request()->validate([
            'title' => 'required',
            'description' =>'required'
        ]);
    }
}
