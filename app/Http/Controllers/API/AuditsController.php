<?php

namespace App\Http\Controllers\API;

use App\Audit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuditsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAudits(Request $request)
    {
        $user = Auth::user();
        $audits = Audit::with('checklist', 'user', 'audit_object')->where('user_id', $user->id)->get();
        return response()->json($audits);
    }

}
