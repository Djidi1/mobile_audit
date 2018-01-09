<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Requirement;
use App\Requirements_type;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirements = Requirement::with('checklist')->get();
        return view('requirements.index', compact('requirements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checklists = Checklist::all();
        $requirements = Requirements_type::all();
        return view('requirements.form', compact('checklists', 'requirements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:3'
        ]);
        Requirement::create($request->all());
        return redirect()->route('requirements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        $entity = $requirement;
        $checklists = Checklist::all();
        $requirements = Requirements_type::all();
        return view('requirements.form', compact('checklists','requirements','entity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirement $requirement)
    {
        $this->validate($request,[
            'title' => 'required|min:3'
        ]);
        $requirement->update($request->all());
        return redirect()->route('requirements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requirement $requirement
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        return redirect()->route('requirements.index');
    }
}
