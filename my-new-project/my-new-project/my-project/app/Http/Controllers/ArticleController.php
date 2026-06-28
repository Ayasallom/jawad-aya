<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // البيانات المؤقتة (سنتعلم قواعد البيانات لاحقاً)
    private $articles = [
        ['id' => 1, 'title' => 'أول مقال', 'content' => 'محتوى المقال الأول'],
        ['id' => 2, 'title' => 'مقال ثاني', 'content' => 'محتوى المقال الثاني'],
        ['id' => 3, 'title' => 'مقال ثالث', 'content' => 'محتوى المقال الثالث'],
    ];

    public function index()
    {
        return view('articles.index', [
            'articles' => $this->articles,
            'title' => 'جميع المقالات'
        ]);
    }

    public function show($id)
    {
        // البحث عن المقال بالـ ID
        $article = collect($this->articles)->firstWhere('id', $id);

        if (!$article) {
            abort(404); // خطأ 404 إذا لم يوجد
        }

        return view('articles.show', [
            'article' => $article,
            'title' => $article['title']
        ]);
    }

    public function create()
    {
        return view('articles.create', [
            'title' => 'مقال جديد'
        ]);
    }

    public function store(Request $request)
{
    // التحقق من البيانات
    $validated = $request->validate([
        'title' => 'required|min:3|max:255',
        'content' => 'required|min:10',
        'category' => 'nullable|string|max:100',
        'tags' => 'nullable|string|max:255'
    ]);

    // مؤقتاً: عرض البيانات المستلمة
    return response()->json([
        'message' => 'تم استلام البيانات بنجاح',
        'data' => $validated
    ]);

    // لاحقاً بعد تعلم قواعد البيانات، سنستخدم:
    // Article::create($validated);
    // return redirect()->route('articles.index')->with('success', 'تم إنشاء المقال بنجاح');
}


}
