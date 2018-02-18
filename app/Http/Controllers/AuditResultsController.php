<?php

namespace App\Http\Controllers;

use App\AuditResult;
use Illuminate\Http\Request;

class AuditResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $audit_id = key($request->all());
        $audit_results = AuditResult::with('audit', 'requirement')->where('audit_id', $audit_id)->get();
        return view('AuditResults.index', compact('audit_results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuditResult  $auditResult
     * @return \Illuminate\Http\Response
     */
    public function show(AuditResult $auditResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuditResult  $auditResult
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditResult $auditResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuditResult  $auditResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditResult $auditResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuditResult  $auditResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditResult $auditResult)
    {
        //
    }
}
