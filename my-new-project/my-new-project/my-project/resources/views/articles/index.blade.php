<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        * { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background: #f5f5f5; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 10px; }
        h1 { color: #2c3e50; border-bottom: 3px solid #3498db; padding-bottom: 10px; }
        .article { background: #ecf0f1; padding: 15px; margin: 15px 0; border-radius: 5px; }
        .article h3 { color: #2980b9; margin-top: 0; }
        .btn { background: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 {{ $title }}</h1>

        <a href="{{ route('articles.create') }}" class="btn">➕ مقال جديد</a>

        @if(count($articles) > 0)
            @foreach($articles as $article)
                <div class="article">
                    <h3>{{ $article['title'] }}</h3>
                    <p>{{ Str::limit($article['content'], 100) }}</p>
                    <a href="{{ route('articles.show', $article['id']) }}">قراءة المزيد →</a>
                </div>
            @endforeach
        @else
            <p style="text-align: center; color: #7f8c8d;">لا توجد مقالات بعد</p>
        @endif
    </div>
</body>
</html>
