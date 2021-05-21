<?php

namespace App\Http\Controllers\Admins;

//use App\Helpers\Formatter;
use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\CareerListsCollection;
use App\Models\Career;
use App\Models\Division;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CareersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lists(Request $request)
    {
        return view('admin.careers.list');
    }

    public function dataTable()
    {
        $careers = Career::with('applicants')->withCount('applicants')->get();
//         dd($careers);
        $datatables = datatables()->of(CareerListsCollection::collection($careers))
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
            ->rawColumns(['action'])
            ->toJson();

        return $datatables;
    }

    public function showCreateForm()
    {
        $data['division'] = Division::all();

        return response()
            ->view('admin.careers.create', $data, 200);
    }

    public function create(Request $request)
    {

        $input = array();
        $input['title'] = $request->title;
        $input['content'] = $request->contents;
        $input['division'] = $request->division;
        $input['visibility'] = $request->visibility??1;
        $input['country'] = $request->country??1;
        $input['city'] = $request->city??1;

//        dd($input);

        try {

            DB::transaction(function() use ($input, $request){

                $img_path = "";

                if (!empty($request->careerImage)) {
                    $career_image = Formatter::generateFiledCode('CAREER') . '.' . $request->careerImage->getClientOriginalExtension();
                    $path = $request->file('careerImage')->storeAs(
                        'public/career', $career_image
                    );

                    $img_path = 'career/' . $career_image;
                }

                $input['banner'] = $img_path;
                $career = Career::create($input);


            }, 2);


        } catch (\Exception $ex) {
            Log::channel('daily')->debug('createEvent -> ' . $ex->getMessage());
            return redirect()
                ->back()->withInput()->with('failed', 'Failed Create Carrer');
        }

        return redirect()
            ->route('career.list')->with('success', 'Succesfuly Create Career');

    }

    public function showEditForm(Career $career)
    {
        $data['detail'] = $career;
//        $data['division'] = Division::all();

        return response()
            ->view('admin.careers.edit', $data);
    }

    public function update(Request $request)
    {
        $input = array();
        $input['title'] = $request->title;
        $input['content'] = $request->contents;
        $input['division'] = $request->division;
        $input['visibility'] = $request->visibility??1;
        $input['country'] = $request->country??1;
        $input['city'] = $request->city??1;
//dd($input);
        try {

            DB::transaction(function() use ($input, $request){

                $career = Career::findOrFail($request->careerId);

                if (!empty($request->careerImage)) {
                    $career_image = Formatter::generateFiledCode('CAREER') . '.' . $request->careerImage->getClientOriginalExtension();
                    $path = $request->file('careerImage')->storeAs(
                        'public/career', $career_image
                    );

                    $input['banner'] = 'career/' . $career_image;;
                }


                // Update Career
                $career->update($input);


            }, 2);


        } catch (\Exception $ex) {
            Log::channel('daily')->debug('editCareer -> ' . $ex->getMessage());
            return redirect()
                ->back()->withInput()->with('failed', 'Failed Update Career');
        }

        return redirect()
            ->route('career.list')->with('success', 'Successfully Update Career');
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->career_id)) {
                $career = Career::find($request->career_id);

                if(empty($career))
                    return response()->json([
                        'status' => 'failed',
                        'msg' => 'Career not Found...'
                    ]);

                $career->delete();
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Success delete'
                ]);
            }

            return response()->json([
                'status' => 'failed',
                'msg' => 'Career-id not set properly...'
            ]);

        }

        return response()->json([
            'msg' => 'Request Not Allowed'
        ]);

    }

    public function publish(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->news_id) OR !empty($request->status)) {
                $news = News::find($request->news_id);

                if(empty($news))
                    return response()->json([
                        'status' => 'failed',
                        'msg' => 'News not Found...'
                    ]);

                $update = [
                    'status' => $request->status
                ];
                $news->update($update);
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Success update status News'
                ]);
            }

            return response()->json([
                'status' => 'failed',
                'msg' => 'News-id or Status not set properly...'
            ]);

        }

        return response()->json([
            'msg' => 'Request Not Allowed'
        ]);

    }

}
