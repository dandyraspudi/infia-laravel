<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Sharer;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function list(Request $request)
    {
        $article = Article::with('author')->where('visibility', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(6)->appends(request()->query());

        $article = $article->toArray();

//         dd($article);
        return response()
            ->view('site.article.index', $article, 200);
    }

    public function show(Article $article)
    {
        $dateS = Carbon::now()->startOfMonth()->subMonths(3);
        $dateE = Carbon::now()->startOfMonth();

        $detail['data'] = $article;
        $detail['author'] = $article->author()->first();
        $detail['recent'] = Article::with('author')->where('visibility', 1)->latest()->limit(3)->get();
        $detail['popular'] = Article::select('title', 'slug', 'created_at', 'cover')->where('visibility', 1)->whereBetween('created_at',[$dateS,$dateE])->orderBy('visit', 'desc')->limit(3)->get();
        $detail['share'] = Sharer::generateShareLink(route('site.article.detail', $article->slug), env('TWITTER_SHARE_TEXT', 'Saya Melihat Berita '));

        $updateVisit = Article::find($article->id)->increment('visit');

        return response()
            ->view('site.article.detail', $detail, 200);
    }
}
