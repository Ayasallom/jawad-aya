<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>تسجيل الدخول - AIU Store</title>
    <style>
        body { background: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .login-card { max-width: 400px; margin: 100px auto; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-aiu { background: #004a99; color: white; }
    </style>
</head>
<body>
    <div class="card login-card p-4 text-center">
        <h3 class="mb-4">متجر AIU</h3>
        <form action="{{ route('block5.dashboard') }}" method="GET">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="اسم المستخدم" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="كلمة المرور" required>
            </div>
            <button type="submit" class="btn btn-aiu w-100">تسجيل الدخول</button>
        </form>
    </div>
</body>
</html>