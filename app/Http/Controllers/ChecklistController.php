<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\ClCategory;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklists = Checklist::with('cl_category', 'requirement')->get();
        return view('checklists.index', compact('checklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cl_categories = ClCategory::all();
        return view('checklists.form', compact('cl_categories'));
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
        Checklist::create($request->all());
        return redirect()->route('checklists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show(Checklist $checklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist)
    {
        $entity = $checklist;
        $cl_categories = ClCategory::all();
        return view('checklists.form', compact('cl_categories','entity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checklist $checklist)
    {
        $this->validate($request,[
            'title' => 'required|min:3'
        ]);
        $checklist->update($request->all());
        return redirect()->route('checklists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checklist $checklist
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('checklists.index');
    }
}
