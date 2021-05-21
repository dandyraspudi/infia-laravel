<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\UserCollection;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lists(Request $request)
    {
        return view('admin.user.list');
    }

    public function dataTable()
    {
        $user = User::all();
//         dd($user);
        $datatables = datatables()->of(UserCollection::collection($user))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '
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
        return response()
            ->view('admin.user.create');
    }

    public function create(UserCreateRequest $request)
    {
        $request->validated();

        $pass = Str::random();

        $input = array();
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = Hash::make($pass);

        logger()->info("pass for " . $input['name'] . " --> " . $pass);

//        dd($input);

        try {

            DB::transaction(function() use ($input, $request){

                $path = public_path("storage/avatar/");
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $avatar_filename = Formatter::generateFiledCode('AVATAR') . '.png';
                $img_path = public_path("storage/avatar/" . $avatar_filename);
                $create_avatar = (new Avatar)->create($input['name'])->save($img_path);

                $input['avatar'] = "avatar/" . $avatar_filename;

                $admin = User::create($input);


            }, 2);


        } catch (\Exception $ex) {
            Log::channel('daily')->debug('createAdmin -> ' . $ex->getMessage());
            return redirect()
                ->back()->withInput()->with('failed', 'Failed Create Admin');
        }

        return redirect()
            ->route('user.list')->with('success', 'Successfully Create Admin');

    }
}
