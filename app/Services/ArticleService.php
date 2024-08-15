<?php

namespace App\Services;

use App\Models\Article;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ArticleService.
 */
class ArticleService
{
    public static function getAllArticles()
    {
        return Article::all();
    }

    public static function getOrderedArticles()
    {
        return Article::orderBy('position', 'asc')->get();
    }

    public static function getArticleById($id)
    {
        return Article::findOrFail($id);
    }

    public static function store($title, $content, $position, $image)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/article', $filename);

        return Article::create([
            'title' => $title,
            'content' => $content,
            'position' => $position,
            'image' => $filename,
        ]);
    }

    public static function update($id, $title, $content, $position, $image)
    {
        $article = Article::findOrFail($id);

        $filename = $article->image;

        if ($image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/article', $filename);
        }

        $article->update([
            'title' => $title,
            'content' => $content,
            'position' => $position,
            'image' => $filename,
        ]);

        return $article;
    }

    public static function delete($id)
    {
        $article = Article::findOrFail($id);

        $article->delete();
    }

    public static function getDataTable()
    {
        $query = Article::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                return view('pages.admin.article.menu', compact('query'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
