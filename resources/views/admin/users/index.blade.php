{{--

@extends('admin.layouts.app')

@section('content')
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-6 text-2xl font-bold text-red-600">إدارة المستخدمين</h1>
                    @if (session('success'))
                    <div id="successMessage" class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        var element = document.getElementById('successMessage');
                        if (element) {
                            element.style.display = 'none';
                        }
                    }, 5000); // يختفي بعد 5 ثوانٍ (5000 مللي ثانية)
                </script>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">الاسم</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">البريد الإلكتروني</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                        <a href="{{ route('users.show', $user->id) }}" class="mr-2 text-indigo-600 hover:text-indigo-900">عرض</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="mr-2 text-blue-600 hover:text-blue-900">تعديل</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    <h1 class="mb-6 text-2xl font-bold text-teal-700">إدارة المستخدمين</h1>

                    @if (session('success'))
                        <div id="successMessage"
                            class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500 rounded" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <script>
                        setTimeout(function() {
                            var element = document.getElementById('successMessage');
                            if (element) {
                                element.style.display = 'none';
                            }
                        }, 5000); // يختفي بعد 5 ثوانٍ (5000 مللي ثانية)
                    </script>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-teal-100">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        الاسم</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        البريد الإلكتروني</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="text-right bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    @if ($user->is_admin == false)
                                        <tr class="w-full">
                                            <td class="px-6 py-4 text-right whitespace-nowrap">{{ $user->id }}</td>
                                            <td class="px-6 py-4 text-right whitespace-nowrap">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="mr-2 text-teal-600 hover:text-teal-900">عرض</a>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="mr-2 text-teal-600 hover:text-teal-900">تعديل</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-900">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
