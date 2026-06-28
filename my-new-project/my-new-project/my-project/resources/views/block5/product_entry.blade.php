<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>إضافة منتج جديد</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">نموذج إدخال منتج</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">اسم المنتج</label>
                            <input type="text" name="product_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">السعر</label>
                            <input type="number" name="price" class="form-control" min="0" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">الكمية المتوفرة</label>
                            <input type="number" name="quantity" class="form-control" min="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">صورة المنتج</label>
                            <input type="file" name="product_image" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">وصف المنتج</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success px-5">حفظ المنتج</button>
                        <a href="{{ route('block5.dashboard') }}" class="btn btn-secondary">عودة للرئيسية</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
