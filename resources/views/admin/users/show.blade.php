{{--

@extends('admin.layouts.app')

@section('content')
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-6 text-2xl font-bold">تفاصيل المستخدم: {{ $user->name }}</h1>

                    <div class="mb-4">
                        <p><span class="font-bold">الـ ID:</span> {{ $user->id }}</p>
                        <p><span class="font-bold">الاسم:</span> {{ $user->name }}</p>
                        <p><span class="font-bold">البريد الإلكتروني:</span> {{ $user->email }}</p>
                        <p><span class="font-bold">تاريخ الإنشاء:</span> {{ $user->created_at }}</p>
                    </div>

                    <div>
                        <a href="{{ route('users.index') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">العودة إلى قائمة المستخدمين</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('admin.layouts.app')

@section('content')
<div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="p-6 border-b border-gray-200 bg-teal-50">
                <h1 class="mb-6 text-2xl font-bold text-teal-700">تفاصيل المستخدم: {{ $user->name }}</h1>

                <div class="mb-4 text-gray-700">
                    <p><span class="font-bold text-teal-600">الـ ID:</span> {{ $user->id }}</p>
                    <p><span class="font-bold text-teal-600">الاسم:</span> {{ $user->name }}</p>
                    <p><span class="font-bold text-teal-600">البريد الإلكتروني:</span> {{ $user->email }}</p>
                    <p><span class="font-bold text-teal-600">تاريخ الإنشاء:</span> {{ $user->created_at }}</p>
                </div>

                <div>
                    <a href="{{ route('users.index') }}" class="px-4 py-2 font-bold text-white bg-teal-500 rounded hover:bg-teal-700">العودة إلى قائمة المستخدمين</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

