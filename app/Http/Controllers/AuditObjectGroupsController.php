<?php

namespace App\Http\Controllers;

use App\AuditObjectGroup;
use Illuminate\Http\Request;

class AuditObjectGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audit_object_groups = AuditObjectGroup::all();
        return view('AuditObjectGroups.index', compact('audit_object_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AuditObjectGroups.form');
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
        AuditObjectGroup::create($request->all());
        return redirect()->route('audit_object_groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuditObjectGroup $clCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AuditObjectGroup $clCategory)
    {
        //
        return redirect()->route('audit_object_groups.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuditObjectGroup  $AuditObjectGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditObjectGroup $AuditObjectGroup)
    {
        $entity = $AuditObjectGroup;
        return view('AuditObjectGroups.form', compact('entity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuditObjectGroup  $AuditObjectGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditObjectGroup $AuditObjectGroup)
    {
        $this->validate($request,[
            'title' => 'required|min:3'
        ]);
        $AuditObjectGroup->update($request->all());
        return redirect()->route('audit_object_groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuditObjectGroup $AuditObjectGroup
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(AuditObjectGroup $AuditObjectGroup)
    {
        $AuditObjectGroup->delete();
        return redirect()->route('audit_object_groups.index');
    }
}
