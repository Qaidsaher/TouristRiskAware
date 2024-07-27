@extends('admin.layouts.app')

@section('content')
    <div class="px-3 py-10 bg-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 md:px-3">
            <h1 class="mb-8 text-3xl font-bold text-teal-700">قائمة الدول</h1>
            <a href="{{ route('countries.create') }}"
                class="inline-block px-4 py-2 mb-4 text-white bg-teal-500 rounded-lg">إضافة دولة جديدة</a>
            @if (session('success'))
                <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="w-6 h-6 text-green-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>إغلاق</title>
                            <path
                                d="M14.348 5.652a.5.5 0 1 1 .707.707l-3.646 3.647 3.646 3.647a.5.5 0 0 1-.707.707l-3.647-3.646-3.646 3.646a.5.5 0 1 1-.707-.707l3.646-3.647-3.646-3.647a.5.5 0 1 1 .707-.707l3.647 3.646 3.647-3.646z" />
                        </svg>
                    </span>
                </div>
            @endif
            <ul class="grid items-start grid-cols-1 px-1 xl:grid-cols-3 gap-y-10 gap-x-6">

                @foreach ($countries as $country)
                    <li class="relative flex flex-col items-start sm:flex-row xl:flex-col">
                        <div class="order-1 px-1 sm:mr-6 xl:ml-0">
                            <h3 class="mb-1 font-semibold text-slate-900">
                                <span class="block mb-1 text-sm leading-6 text-cyan-500">{{ $country->name }}</span>
                                <p class="text-sm text-gray-700">
                                    <span class="flex flex-wrap space-x-2">
                                        <span class="font-bold">عدد المخاطر:</span>
                                        <span class="text-teal-500">{{ $country->risks()->count() }}</span>
                                        <span class="font-bold">عدد المعالم السياحية:</span>
                                        <span class="text-teal-500">{{ $country->attractions()->count() }}</span>
                                    </span>
                                    <span class="flex flex-wrap mt-2 space-x-2">
                                        <span class="font-bold">عدد الأماكن السياحية:</span>
                                        <span class="text-teal-500">{{ $country->tourismPlaces()->count() }}</span>
                                        <span class="font-bold">العاصمة:</span>
                                        <span class="text-teal-500">{{ $country->capital }}</span>
                                    </span>
                                </p>
                            </h3>
                            <div class="prose-sm prose prose-slate text-slate-600 line-clamp-2">
                                <p>{{ $country->overview }}</p>
                            </div>

                            <div class="flex justify-between mt-6">
                                <!-- Show Button -->
                                <a class="inline-flex items-center px-8 py-2 text-sm font-semibold text-white bg-teal-500 rounded-full group hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    href="{{ route('countries.show', $country) }}">
                                    عرض
                                </a>

                                <!-- Edit Button -->
                                <a class="inline-flex items-center px-8 py-2 text-sm font-semibold text-white bg-blue-500 rounded-full group hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    href="{{ route('countries.edit', $country) }}">
                                    تعديل

                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('countries.destroy', $country) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-8 py-2 text-sm font-semibold text-white bg-red-500 rounded-full group hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                        حذف

                                    </button>
                                </form>
                            </div>


                        </div>
                        @if (filter_var($country->image, FILTER_VALIDATE_URL))
                            <img src="{{ $country->image }}" alt="{{ $country->name }}"
                                class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full h-[220px] flex justify-center items-center"
                                width="1216" height="500">
                        @else
                            <img src="{{ Storage::url($country->image) }}" alt="{{ $country->name }}"
                                class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full h-[220px] flex justify-center items-center text-teal-300"
                                width="1216" height="500">
                        @endif

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
