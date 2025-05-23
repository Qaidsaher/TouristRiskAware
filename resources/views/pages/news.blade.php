<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <main class="container p-6 mx-auto">
                <section>
                    <h2 class="mb-6 text-4xl font-bold text-teal-600">أحدث الأخبار</h2>
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($news as $article)
                            <!-- News Article -->
                            <article class="p-6 bg-white rounded-lg shadow-lg">
                                <img src="/storage/images/{{ $article->image }}" alt="صورة الخبر"
                                    class="flex items-center justify-center w-full mb-4 rounded-lg max-h-44">
                                <h3 class="mb-2 text-2xl font-bold text-teal-600">{{ $article->title }}</h3>
                                <p class="mb-4 text-gray-700">
                                    {{ $article->content }}
                                </p>
                                <a href="{{ route('pages.newshow', $article->id) }}"
                                    class="text-teal-600 hover:underline">اقرأ المزيد</a>
                            </article>
                        @endforeach
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-app-layout>
