<?php

namespace App\Http\Controllers;

use Auth;
use App\AuditObject;
use App\AuditObjectGroup;
use Illuminate\Http\Request;


class AuditObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audit_objects = AuditObject::with('audit_object_groups')->get();
//        $users = AuditObject::with('users')->get();
        return view('AuditObjects.index', compact('audit_objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audit_object_groups = AuditObjectGroup::all();
        $user_id = Auth::user()->id;
        return view('AuditObjects.form', compact('audit_object_groups', 'user_id'));
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
        AuditObject::create($request->all());
        return redirect()->route('AuditObjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param AuditObject $audit_object
     * @return void
     */
    public function show(AuditObject $audit_object)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AuditObject $audit_object
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditObject $audit_object)
    {
        $entity = $audit_object;
        $audit_object_groups = AuditObjectGroup::all();
        $user_id = Auth::user()->id;
        return view('AuditObjects.form', compact('audit_object_groups','entity', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param AuditObject $audit_object
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditObject $audit_object)
    {
        $this->validate($request,[
            'title' => 'required|min:3'
        ]);
        $audit_object->update($request->all());
        return redirect()->route('AuditObjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AuditObject $audit_object
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(AuditObject $audit_object)
    {
        $audit_object->delete();
        return redirect()->route('AuditObjects.index');
    }
}
