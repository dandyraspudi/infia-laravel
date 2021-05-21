<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicantCollection;
use App\Http\Resources\CareerListsCollection;
use App\Models\Applicant;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lists(Request $request)
    {
        return view('admin.applicant.list');
    }

    public function dataTable()
    {
        $applicant = Applicant::all();
//         dd($applicant);
        $datatables = datatables()->of(ApplicantCollection::collection($applicant))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '
                        <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="eye"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-icon">
                            <i data-feather="edit-2"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                        </button>
                    ';

                return $btn;
            })
            ->rawColumns(['action', 'link', 'cv_download_link'])
            ->toJson();

        return $datatables;
    }

    public function downloadCV(Applicant $applicant)
    {
//        dd($applicant);
        return Storage::download($applicant->file);
    }

    public function test()
    {
        $applicant = Applicant::all();

        dd($applicant[0]->file);
    }
}
