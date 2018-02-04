<?php

namespace App\Http\Controllers;

use App\User;
use App\AuditObject;
use App\AuditObjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuditObjectsController extends Controller
{
    // For API
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getObjects(Request $request)
    {
        $user = Auth::user();
        $objects = AuditObject::with('audit_object_group', 'user')->where('user_id', $user->id)->get();
        return response()->json($objects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audit_objects = AuditObject::with('audit_object_group', 'user')->get();
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
        $users = User::all();
        return view('AuditObjects.form', compact('audit_object_groups', 'users'));
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
        return redirect()->route('audit_objects.index');
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
        $users = User::all();
        return view('AuditObjects.form', compact('audit_object_groups','entity', 'users'));
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
        return redirect()->route('audit_objects.index');
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
        return redirect()->route('audit_objects.index');
    }
}
