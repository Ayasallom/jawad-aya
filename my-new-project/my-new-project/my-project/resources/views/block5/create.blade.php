<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إدخال منتج</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body dir="rtl">

<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            إدخال منتج جديد
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- اسم المنتج -->
                <div class="mb-3">
                    <label class="form-label">اسم المنتج</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- وصف المنتج -->
                <div class="mb-3">
                    <label class="form-label">وصف المنتج</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <!-- السعر -->
                <div class="mb-3">
                    <label class="form-label">السعر</label>
                    <input type="number" name="price" class="form-control" min="0" step="0.01" required>
                </div>

                <!-- الكمية -->
                <div class="mb-3">
                    <label class="form-label">الكمية</label>
                    <input type="number" name="quantity" class="form-control" min="0" required>
                </div>

                <!-- اختيار المستودع -->
                <div class="mb-3">
                    <label class="form-label">المستودع</label>
                    <select name="warehouse" class="form-select">
                        <option>مستودع دمشق</option>
                        <option>مستودع حمص</option>
                        <option>مستودع حلب</option>
                    </select>
                </div>

                <!-- اختيار المتجر -->
                <div class="mb-3">
                    <label class="form-label">المتجر</label>
                    <select name="store" class="form-select">
                        <option>متجر دمشق</option>
                        <option>متجر حلب</option>
                        <option>متجر اللاذقية</option>
                    </select>
                </div>

                <!-- صورة المنتج -->
                <div class="mb-3">
                    <label class="form-label">صورة المنتج</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-5">حفظ المنتج</button>
                    <a href="{{ route('block5.dashboard') }}" class="btn btn-secondary px-5">عودة</a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>