<?php

namespace App\Http\Controllers\API;

use App\Audit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function putAudits(Request $request)
    {
        $user = Auth::user();
        $data = $request->json()->all();
        if (isset($data['audit'])) {
            $object_id = $data['audit']['object_id'];
            $audit_title = $data['audit']['title'];
            $audit_add_date = $data['audit']['date_add'];
            $audit_id = 0;
            foreach ($data['audit']['check_list'] as $check_list){
                $check_list_id = $check_list['id'];
                $audit_id = DB::table('audits')->insertGetId(
                    [
                        'title' => $audit_title,
                        'date_add' => Carbon::parse($audit_add_date),
                        'user_id' => $user->id,
                        'checklist_id' => $check_list_id,
                        'object_id' => $object_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]
                );
                foreach ($check_list['requirement'] as $requirement) {
                    $requirement_id = $requirement['id'];
                    $status = $requirement['status'];
                    $comments = $requirement['comments'];
                    $comment_text = isset($comments[0]['text']) ? $comments[0]['text'] : '';
                    DB::table('audit_results')->insert(
                        [
                            'audit_id' => $audit_id,
                            'requirement_id' => $requirement_id,
                            'result' => $status,
                            'comment' => $comment_text,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]
                    );
                }
            }
            return $audit_id;
        }else{
            return 0;
        }
    }

}
