<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
      عرض قائمة المستخدمين
     */
    public function index()
    {
        return "قائمة المستخدمين";
    }

    /*
     * عرض نموذج إنشاء مستخدم جديد
     */
    public function create()
    {
        return "نموذج إنشاء مستخدم";
    }

    /*
     * حفظ مستخدم جديد
     */
    public function store(Request $request)
    {
        // معالجة البيانات
        return "تم حفظ المستخدم";
    }

    /*
     * عرض مستخدم محدد
     */
    public function show($id)
    {
        return "عرض المستخدم رقم: " . $id;
    }

    /*
     * عرض نموذج تعديل مستخدم
     */
    public function edit($id)
    {
        return "تعديل المستخدم رقم: " . $id;
    }

    /*
     * تحديث المستخدم في قاعدة البيانات
     */
    public function update(Request $request, $id)
    {
        return "تحديث المستخدم رقم: " . $id;
    }

    /*
     * حذف مستخدم
     */
    public function destroy($id)
    {
        return "حذف المستخدم رقم: " . $id;
    }
}

