<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background: #f0f2f5; }
        .article-container { max-width: 800px; margin: auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 3px solid #3498db; padding-bottom: 15px; }
        .content { line-height: 1.8; color: #34495e; font-size: 18px; margin-top: 30px; }
        .meta { background: #ecf0f1; padding: 15px; border-radius: 5px; margin: 20px 0; color: #7f8c8d; }
        .btn { display: inline-block; padding: 10px 25px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px; }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="article-container">
        <h1>{{ $article['title'] }}</h1>

        <div class="meta">
            <strong>رقم المقال:</strong> {{ $article['id'] }} |
            <strong>تاريخ النشر:</strong> {{ date('Y-m-d') }}
        </div>

        <div class="content">
            {{ $article['content'] }}
        </div>

        <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee;">
            <a href="{{ route('articles.index') }}" class="btn">← العودة للقائمة</a>
            <a href="{{ route('articles.edit', $article['id']) }}" class="btn" style="background: #f39c12;">✏️ تعديل</a>
        </div>
    </div>
</body>
</html>
