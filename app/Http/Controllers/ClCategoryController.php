<?php

namespace App\Http\Controllers;

use App\ClCategory;
use Illuminate\Http\Request;

class ClCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cl_categories = ClCategory::all();
        return view('cl_categories.index', compact('cl_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cl_categories.form');
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
        ClCategory::create($request->all());
        return redirect()->route('cl_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClCategory  $clCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ClCategory $clCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClCategory  $clCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ClCategory $clCategory)
    {
        $entity = $clCategory;
        return view('cl_categories.form', compact('entity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClCategory  $clCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClCategory $clCategory)
    {
        $this->validate($request,[
           'title' => 'required|min:3'
        ]);
        $clCategory->update($request->all());
        return redirect()->route('cl_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClCategory $clCategory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ClCategory $clCategory)
    {
        $clCategory->delete();
        return redirect()->route('cl_categories.index');
    }
}
