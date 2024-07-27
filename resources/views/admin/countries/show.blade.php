{{--
@extends('admin.layouts.app')

@section('content')
<div class="container px-4 py-12 mx-auto">
    <h1 class="mb-8 text-3xl font-bold">{{ $country->name }}</h1>

    <div class="p-8 mb-8 bg-white rounded-lg shadow-md">
        <img src="{{ $country->image }}" alt="{{ $country->name }}" class="object-cover w-full mb-4 rounded-lg h-60">
        <p class="mb-2 text-lg font-semibold">العاصمة: {{ $country->capital }}</p>
        <p class="mb-2 text-lg font-semibold">اللغة: {{ $country->language }}</p>
        <p class="mb-2 text-lg font-semibold">عدد السكان: {{ $country->population }}</p>
        <p class="mb-4 text-lg">{{ $country->overview }}</p>

        <h2 class="mb-4 text-2xl font-bold">المعالم السياحية</h2>
        <ul class="pl-5 list-disc">
            @foreach ($country->attractions as $attraction)
                <li class="mb-2">
                    <strong class="block">{{ $attraction->name }}</strong>
                    <p>{{ $attraction->description }}</p>
                </li>
            @endforeach
        </ul>

        <h2 class="mt-8 mb-4 text-2xl font-bold">الأماكن السياحية</h2>
        <ul class="pl-5 list-disc">
            @foreach ($country->tourismPlaces as $place)
                <li class="mb-2">
                    <strong class="block">{{ $place->name }}</strong>
                    <p>{{ $place->description }}</p>
                    <img src="{{ $place->image }}" alt="{{ $place->name }}" class="object-cover w-32 h-32 mt-2 rounded-lg">
                </li>
            @endforeach
        </ul>

        <h2 class="mt-8 mb-4 text-2xl font-bold">المخاطر</h2>
        <ul class="pl-5 list-disc">
            @foreach ($country->risks as $risk)
                <li class="mb-2">
                    <strong class="block">{{ $risk->type }}</strong>
                    <p>{{ $risk->description }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('countries.edit', $country->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-md">تعديل</a>
    <a href="{{ route('countries.index') }}" class="px-4 py-2 ml-4 text-white bg-gray-500 rounded-md">الرجوع إلى القائمة</a>
</div>
@endsection


 --}}


@extends('admin.layouts.app')

@section('content')
<div class="container px-4 py-12 mx-auto">
    <h1 class="mb-8 text-3xl font-bold text-teal-800">{{ $country->name }}</h1>

    <div class="p-8 mb-8 bg-gray-100 rounded-lg shadow-md">
        @if ($country->image)
            <img src="{{ asset('storage/' . $country->image) }}" alt="{{ $country->image }}" class="object-cover w-full mb-4 rounded-lg h-60">
        @else
            <p class="mb-4 text-gray-500">لا توجد صورة متاحة</p>
        @endif
        <p class="mb-2 text-lg font-semibold text-teal-600">العاصمة: {{ $country->capital }}</p>
        <p class="mb-2 text-lg font-semibold text-teal-600">اللغة: {{ $country->language }}</p>
        <p class="mb-2 text-lg font-semibold text-teal-600">عدد السكان: {{ $country->population }}</p>
        <p class="mb-4 text-lg text-gray-700">{{ $country->overview }}</p>

        <h2 class="mb-4 text-2xl font-bold text-teal-700">المعالم السياحية</h2>
        <ul class="pl-5 list-disc">
            @foreach ($country->attractions as $attraction)
                <li class="mb-2">
                    <strong class="block text-teal-800">{{ $attraction->name }}</strong>
                    <p class="text-gray-600">{{ $attraction->description }}</p>
                </li>
            @endforeach
        </ul>

        <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-700">الأماكن السياحية</h2>
        <ul class="pl-5 list-disc">
            @foreach ($country->tourismPlaces as $place)
                <li class="mb-2">
                    <strong class="block text-teal-800">{{ $place->name }}</strong>
                    <p class="text-gray-600">{{ $place->description }}</p>
                    @if ($place->image)
                        <img src="{{ asset('storage/' . $place->image) }}" alt="{{ $place->name }}" class="object-cover w-32 h-32 mt-2 rounded-lg">
                    @endif
                </li>
            @endforeach
        </ul>

        <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-700">المخاطر</h2>
        <ul class="pl-5 list-disc">
            @foreach ($country->risks as $risk)
                <li class="mb-2">
                    <strong class="block text-teal-800">{{ $risk->type }}</strong>
                    <p class="text-gray-600">{{ $risk->description }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('countries.edit', $country->id) }}" class="px-4 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600">تعديل</a>
    <a href="{{ route('countries.index') }}" class="px-4 py-2 ml-4 text-white bg-gray-600 rounded-md hover:bg-gray-700">الرجوع إلى القائمة</a>
</div>
@endsection
