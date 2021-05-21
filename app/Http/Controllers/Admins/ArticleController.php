<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\CareerListsCollection;
use App\Models\Article;
use App\Models\Career;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lists(Request $request)
    {
        return view('admin.article.list');
    }

    public function dataTable()
    {
        $article = Article::all();
//         dd($article);
        $datatables = datatables()->of(ArticleCollection::collection($article))
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
            ->view('admin.article.create');
    }

    public function create(Request $request)
    {

        $input = array();
        $input['title'] = $request->title;
        $input['slug'] = (new Formatter())->getSlug($request->title, new Article());
        $input['content'] = $request->contents;
        $input['summary'] = $request->summary;
        $input['visibility'] = $request->visibility??1;
        $input['created_by'] = Auth::id();

//        dd($input);

        try {

            DB::transaction(function() use ($input, $request){

                $img_path = "";

                if (!empty($request->articleImage)) {
                    $article_image = Formatter::generateFiledCode('ARTICLE') . '.' . $request->articleImage->getClientOriginalExtension();
                    $path = $request->file('articleImage')->storeAs(
                        'public/article', $article_image
                    );

                    $img_path = 'article/' . $article_image;
                }

                $input['cover'] = $img_path;
                $career = Article::create($input);


            }, 2);


        } catch (\Exception $ex) {
            Log::channel('daily')->debug('createArticle -> ' . $ex->getMessage());
            return redirect()
                ->back()->withInput()->with('failed', 'Failed Create Article');
        }

        return redirect()
            ->route('article.list')->with('success', 'Successfully Create Article');

    }
}
