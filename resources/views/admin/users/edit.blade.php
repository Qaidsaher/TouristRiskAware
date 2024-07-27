{{--

 @extends('admin.layouts.app')

@section('content')
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-6 text-2xl font-bold">تعديل المستخدم: {{ $user->name }}</h1>

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">الاسم</label>
                            <input type="text" name="name" id="name" class="block w-full mt-1 form-input" value="{{ old('name', $user->name ?? '') }}" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                            <input type="email" name="email" id="email" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" value="{{ old('email', $user->email ?? '') }}" required>
                        </div>

                        @if (!isset($user))
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
                                <input type="password" name="password" id="password" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                            </div>
                        @endif

                        <div class="flex items-center">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">{{ isset($user) ? 'تحديث المستخدم' : 'إنشاء مستخدم' }}</button>
                            <a href="{{ route('users.index') }}" class="ml-4 text-gray-500 hover:text-gray-700">إلغاء</a>
                        </div>

                    </form>
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
                <h1 class="mb-6 text-2xl font-bold text-teal-700">تعديل المستخدم: {{ $user->name }}</h1>

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">الاسم</label>
                        <input type="text" name="name" id="name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm" value="{{ old('name', $user->name ?? '') }}" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                        <input type="email" name="email" id="email" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm" value="{{ old('email', $user->email ?? '') }}" required>
                    </div>

                    @if (!isset($user))
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm" required>
                        </div>
                    @endif

                    <div class="flex items-center space-x-4">
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-teal-500 rounded hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">{{ isset($user) ? 'تحديث المستخدم' : 'إنشاء مستخدم' }}</button>
                        <a href="{{ route('users.index') }}" class="text-gray-500 hover:text-gray-700">إلغاء</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
