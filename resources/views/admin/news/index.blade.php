{{--
@extends('admin.layouts.app')
@section('content')
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-4xl font-bold text-red-600">جميع الأخبار</h1>
        <div class="my-3">
            <a href="{{ route('news.create') }}" class="p-2 mb-4 text-white bg-blue-600 rounded-sm btn">إنشاء خبر</a>
        </div>

        @if (session('success'))
            <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($news as $article)
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <img src="/storage/images/{{ $article->image }}" alt="{{ $article->title }}"
                        class="w-full mb-4 rounded-lg max-h-44">
                    <h3 class="mb-2 text-2xl font-bold">{{ $article->title }}</h3>
                    <p class="mb-4 text-gray-700">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('news.show', $article->id) }}" class="text-blue-600 hover:underline">اقرأ المزيد</a>
                    <div class="mt-4">
                        <a href="{{ route('news.edit', $article->id) }}" class="text-yellow-600 hover:underline">تعديل</a>
                        <form action="{{ route('news.destroy', $article->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-red-600 hover:underline">حذف</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}

@extends('admin.layouts.app')
@section('content')
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-4xl font-bold text-teal-700">جميع الأخبار</h1>
        <div class="my-3">
            <a href="{{ route('news.create') }}" class="p-2 mb-4 text-white bg-teal-600 rounded hover:bg-teal-700">إنشاء خبر</a>
        </div>

        @if (session('success'))
            <div class="relative px-4 py-3 mb-4 text-teal-700 bg-teal-100 border border-teal-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($news as $article)
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <img src="/storage/images/{{ $article->image }}" alt="{{ $article->title }}"
                        class="object-cover w-full mb-4 rounded-lg max-h-44">
                    <h3 class="mb-2 text-2xl font-bold text-teal-700">{{ $article->title }}</h3>
                    <p class="mb-4 text-gray-700">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('news.show', $article->id) }}" class="text-teal-600 hover:underline">اقرأ المزيد</a>
                    <div class="mt-4">
                        <a href="{{ route('news.edit', $article->id) }}" class="text-teal-600 hover:underline">تعديل</a>
                        <form action="{{ route('news.destroy', $article->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-red-600 hover:underline">حذف</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
