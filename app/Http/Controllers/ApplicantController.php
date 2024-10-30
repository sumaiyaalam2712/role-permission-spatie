<?php

namespace App\Http\Controllers;
use App\Models\Level;
use App\Models\Applicant;


use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApplicantController extends Controller
{
public function index(Request $request)
{


    if ($request->ajax()) {
        $data = Level::with('applicants')->get();

        $formattedData = $data->flatMap(function ($level) {
            return $level->applicants->map(function ($applicant) use ($level) {
                return [
                    'name' => $level->name,
                    'section' => $level->section,
                    'level_id' => $applicant->level_id,
                    'previous_institution' => $applicant->previous_institution,

                ];
            });
        });

        return DataTables::of($formattedData)
        ->addIndexColumn()
            ->make(true);
    }
  return view('relationship');
}

}