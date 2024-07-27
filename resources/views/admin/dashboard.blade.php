@extends('admin.layouts.app')

@section('header')
    <h1>Welcome to Admin Dashboard</h1>
@endsection

@section('content')
<div class="container px-4 py-8 mx-auto">
    <!-- Header Section -->
    <div class="p-6 mb-6 bg-teal-700 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-teal-300">الصفحة الرئيسية للإدارة</h1>
        <p class="mt-2 text-teal-400">مرحبا بك في لوحة الإدارة. يمكنك متابعة كل ما يحدث في النظام من هنا.</p>
    </div>
    <!-- Dashboard Overview Section -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        <!-- Users -->
        <div class="p-6 bg-teal-700 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-teal-300">المستخدمون</h2>
            <p class="mt-2 text-teal-400">عدد المستخدمين المسجلين في النظام.</p>
            <div class="mt-4 text-3xl font-bold text-white">
                {{ \App\Models\User::count() }}
            </div>
        </div>

        <!-- Appointments -->
        <div class="p-6 bg-teal-700 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-teal-300">الدوال</h2>
            <p class="mt-2 text-teal-400">عدد الدوال المجدولة في النظام.</p>
            <div class="mt-4 text-3xl font-bold text-white">
                {{ \App\Models\Country::count() }}
            </div>
        </div>

        <!-- News -->
        <div class="p-6 bg-teal-700 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-teal-300">الأخبار</h2>
            <p class="mt-2 text-teal-400">عدد المقالات الإخبارية المنشورة.</p>
            <div class="mt-4 text-3xl font-bold text-white">
                {{ \App\Models\News::count() }}
            </div>
        </div>

        <!-- Other Stats -->
        <div class="p-6 bg-teal-700 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-teal-300">إحصائيات أخرى</h2>
            <p class="mt-2 text-teal-400">إحصائيات إضافية يمكن عرضها هنا.</p>
            <div class="mt-4 text-3xl font-bold text-white">
                <!-- Example placeholder -->
                123
            </div>
        </div>
    </div>
</div>
@endsection
