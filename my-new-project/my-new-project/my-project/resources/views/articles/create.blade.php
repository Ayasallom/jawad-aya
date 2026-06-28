<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | نظام إدارة المقالات</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box;
        }
        body {
            background: #f0f2f5;
            padding: 30px;
            margin: 0;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 15px;
            margin-top: 0;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: bold;
            font-size: 16px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
            font-family: inherit;
        }
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52,152,219,0.2);
        }
        textarea {
            resize: vertical;
            min-height: 200px;
        }
        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            margin-left: 10px;
        }
        .btn-primary {
            background: #3498db;
            color: white;
        }
        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52,152,219,0.3);
        }
        .btn-secondary {
            background: #95a5a6;
            color: white;
        }
        .btn-secondary:hover {
            background: #7f8c8d;
            transform: translateY(-2px);
        }
        .btn-danger {
            background: #e74c3c;
            color: white;
        }
        .btn-danger:hover {
            background: #c0392b;
        }
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            display: none;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #ecf0f1;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .required::after {
            content: " *";
            color: #e74c3c;
            font-weight: bold;
        }
        .help-text {
            font-size: 13px;
            color: #7f8c8d;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 {{ $title }}</h1>

        {{-- رسالة نجاح مؤقتة (سيتم تفعيلها لاحقاً مع JavaScript) --}}
        <div id="successAlert" class="alert alert-success">
            ✅ تم حفظ المقال بنجاح!
        </div>

        {{-- رسالة خطأ مؤقتة --}}
        <div id="errorAlert" class="alert alert-error">
            ❌ حدث خطأ أثناء حفظ المقال. الرجاء المحاولة مرة أخرى.
        </div>

        {{-- نموذج إنشاء مقال جديد --}}
        <form id="createArticleForm" method="POST" action="{{ route('articles.store') }}">
            @csrf {{-- حماية Laravel من هجمات CSRF --}}

            <div class="form-group">
                <label for="title" class="required">عنوان المقال</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="أدخل عنوان المقال..."
                    value="{{ old('title') }}"
                    required
                >
                <div class="help-text">العنوان يجب أن يكون مميزاً ومعبراً عن المحتوى</div>
            </div>

            <div class="form-group">
                <label for="content" class="required">محتوى المقال</label>
                <textarea
                    id="content"
                    name="content"
                    placeholder="اكتب محتوى المقال هنا..."
                    required>{{ old('content') }}</textarea>
                <div class="help-text">يمكنك كتابة المقال بتنسيق نصي بسيط</div>
            </div>

            <div class="form-group">
                <label for="category">التصنيف (اختياري)</label>
                <input
                    type="text"
                    id="category"
                    name="category"
                    placeholder="مثلاً: تقنية, رياضة, ثقافة..."
                    value="{{ old('category') }}"
                >
                <div class="help-text">اختر تصنيفاً مناسباً لمقالك ليسهل البحث عنه</div>
            </div>

            <div class="form-group">
                <label for="tags">كلمات مفتاحية (اختياري)</label>
                <input
                    type="text"
                    id="tags"
                    name="tags"
                    placeholder="لارافيل, PHP, برمجة..."
                    value="{{ old('tags') }}"
                >
                <div class="help-text">افصل بين الكلمات بفاصلة</div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    💾 نشر المقال
                </button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">
                    🔙 العودة للقائمة
                </a>
                <button type="reset" class="btn btn-danger" id="resetBtn">
                    ↺ إعادة تعيين
                </button>
            </div>
        </form>

        {{-- معاينة سريعة للمقال (اختياري) --}}
        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px; display: none;" id="preview">
            <h3 style="color: #2c3e50; margin-top: 0;">👁️ معاينة سريعة</h3>
            <div id="previewContent"></div>
        </div>
    </div>

    {{-- إضافة JavaScript لتحسين تجربة المستخدم --}}
    <script>
        // معاينة حية أثناء الكتابة (اختياري)
        const titleInput = document.getElementById('title');
        const contentInput = document.getElementById('content');
        const previewDiv = document.getElementById('preview');
        const previewContent = document.getElementById('previewContent');

        function updatePreview() {
            if (titleInput.value || contentInput.value) {
                previewDiv.style.display = 'block';
                previewContent.innerHTML = `
                    <h4 style="color: #3498db; margin: 10px 0;">${titleInput.value || 'العنوان'}</h4>
                    <p style="color: #34495e; line-height: 1.6;">${contentInput.value || 'المحتوى سيظهر هنا...'}</p>
                `;
            } else {
                previewDiv.style.display = 'none';
            }
        }

        titleInput.addEventListener('input', updatePreview);
        contentInput.addEventListener('input', updatePreview);

        // محاكاة إرسال النموذج (حالياً بدون قاعدة بيانات)
        document.getElementById('createArticleForm').addEventListener('submit', function(e) {
            e.preventDefault(); // منع الإرسال الفعلي حالياً

            // التحقق من الحقول المطلوبة
            const title = titleInput.value.trim();
            const content = contentInput.value.trim();

            if (!title || !content) {
                showAlert('errorAlert', '❌ الرجاء ملء جميع الحقول المطلوبة');
                return;
            }

            // محاكاة نجاح الإرسال
            showAlert('successAlert', '✅ تم إنشاء المقال بنجاح! (محاكاة)');

            // تعطيل الزر مؤقتاً لمنع النقر المتكرر
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.5';

            // إعادة التوجيه إلى قائمة المقالات بعد ثانيتين (محاكاة)
            setTimeout(() => {
                window.location.href = '{{ route('articles.index') }}';
            }, 2000);
        });

        // دالة إظهار التنبيهات
        function showAlert(alertId, message) {
            // إخفاء جميع التنبيهات أولاً
            document.querySelectorAll('.alert').forEach(alert => {
                alert.style.display = 'none';
            });

            // إظهار التنبيه المطلوب
            const alert = document.getElementById(alertId);
            alert.style.display = 'block';
            if (message) {
                alert.innerHTML = message;
            }

            // إخفاء التنبيه بعد 3 ثواني
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
        }

        // زر إعادة التعيين
        document.getElementById('resetBtn').addEventListener('click', function() {
            if (confirm('هل أنت متأكد من إعادة تعيين جميع الحقول؟')) {
                document.getElementById('createArticleForm').reset();
                previewDiv.style.display = 'none';
            }
        });

        // تحذير عند محاولة الخروج مع وجود بيانات غير محفوظة
        let formChanged = false;
        document.querySelectorAll('#createArticleForm input, #createArticleForm textarea').forEach(field => {
            field.addEventListener('change', () => formChanged = true);
        });

        window.addEventListener('beforeunload', function(e) {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>
