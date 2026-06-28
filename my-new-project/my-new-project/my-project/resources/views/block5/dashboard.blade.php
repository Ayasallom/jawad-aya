<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Dashboard الكتلة الخامسة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl">

<div class="container mt-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">إدارة المنتجات - الكتلة الخامسة</h2>
        <p class="text-muted">لوحة التحكم الخاصة بإدارة المنتجات</p>
    </div>

    <div class="row g-4">

        <!-- زر إدخال منتج -->
        <div class="col-md-4">
            <a href="{{ route('products.create') }}" class="btn btn-success w-100 p-4">
                ➕ إدخال منتج جديد
            </a>
        </div>

        <!-- زر البحث -->
        <div class="col-md-4">
            <a href="#" class="btn btn-info w-100 p-4">
                🔍 بحث عن منتج
            </a>
        </div>

        <!-- زر عرض المنتجات -->
        <div class="col-md-4">
            <a href="#" class="btn btn-warning w-100 p-4">
                📦 عرض جميع المنتجات
            </a>
        </div>

        <!-- زر تخزين في مستودع -->
        <div class="col-md-6">
            <a href="#" class="btn btn-secondary w-100 p-4">
                🏬 تخزين المنتجات في المستودعات
            </a>
        </div>

        <!-- زر عرض المنتجات في المتاجر -->
        <div class="col-md-6">
            <a href="#" class="btn btn-dark w-100 p-4">
                🏪 عرض المنتجات في المتاجر
            </a>
        </div>

    </div>
</div>

</body>
</html>