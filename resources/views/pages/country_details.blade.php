<x-app-layout>
    <!-- قسم تفاصيل الدولة -->
    <section class="container px-4 py-12 mx-auto">
        @if (session('success'))
            <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                role="alert">
                <span class="absolute top-0 bottom-0 left-0 px-4 py-3">
                    <svg class="w-6 h-6 text-green-500 cursor-pointer fill-current" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        onclick="this.parentElement.parentElement.remove()">
                        <title>إغلاق</title>
                        <path
                            d="M14.348 5.652a.5.5 0 1 1 .707.707l-3.646 3.647 3.646 3.647a.5.5 0 0 1-.707.707l-3.647-3.646-3.646 3.646a.5.5 0 1 1-.707-.707l3.646-3.647-3.646-3.647a.5.5 0 1 1 .707-.707l3.647 3.646 3.647-3.646z" />
                    </svg>
                </span>
                <span class="ml-10">{{ session('success') }}</span>
            </div>
        @endif

        <!-- صورة الدولة -->
        <div class="relative w-full mb-8 overflow-hidden rounded-lg shadow-md h-[500px]">
            @if (filter_var($country->image, FILTER_VALIDATE_URL))
                <img src="{{ $country->image }}" alt="{{ $country->name }}" class="object-cover w-full h-full">
            @else
                <img src="{{ Storage::url($country->image) }}" alt="{{ $country->name }}"
                    class="object-cover w-full h-full">
            @endif
            {{-- <img src="{{ Storage::url($country->image) }}" class="object-cover w-full h-full"> --}}
        </div>

        <!-- نظرة عامة على الدولة -->
        <div class="p-6 mb-8 bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-2xl font-bold text-teal-600">{{ $country->name }}</h1>
            <h2 class="mb-4 text-2xl font-semibold text-teal-600">نظرة عامة</h2>
            <p class="mb-4 text-gray-700">
                {{ $country->overview }}
            </p>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="p-4 border rounded-md bg-teal-50">
                    <h3 class="text-lg font-medium text-teal-600">العاصمة</h3>
                    <p class="mt-2 text-sm text-gray-600"> {{ $country->capital }}</p>
                </div>
                <div class="p-4 border rounded-md bg-teal-50">
                    <h3 class="text-lg font-medium text-teal-600">اللغة</h3>
                    <p class="mt-2 text-sm text-gray-600"> {{ $country->language }}</p>
                </div>
                <div class="p-4 border rounded-md bg-teal-50">
                    <h3 class="text-lg font-medium text-teal-600">السكان</h3>
                    <p class="mt-2 text-sm text-gray-600"> {{ $country->population }}</p>
                </div>
            </div>
        </div>

        <!-- الأماكن السياحية -->
        <div class="p-6 mb-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-2xl font-semibold text-teal-600">الأماكن السياحية</h2>
            <ul class="px-5 space-y-2 list-disc">
                @foreach ($country->tourismPlaces as $place)
                    <div class="p-3 my-3 ml-3 border rounded-md bg-teal-50">
                        <div class="flex items-center gap-3">
                            @if (filter_var($place->image, FILTER_VALIDATE_URL))
                                <img src="{{ $place->image }}" alt="{{ $place->name }}"
                                class="object-cover w-20 h-20 border-teal-400 rounded-sm border-1 shadow-teal-400">
                            @else
                                <img src="{{ Storage::url($place->image) }}" alt="{{ $place->name }}"
                                class="object-cover w-20 h-20 border-teal-400 rounded-sm border-1 shadow-teal-400">
                            @endif
                            {{-- <img src="{{ Storage::url($place->image) }}"
                                class="object-cover w-20 h-20 border-teal-400 rounded-sm border-1 shadow-teal-400"> --}}
                            <div class="px">
                                <h3 class="font-bold text-teal-500">
                                    {{ $place->name }}
                                </h3>
                                <p class="mt-2 text-gray-600">
                                    {{ $place->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>

        <!-- معلومات عن المخاطر -->
        <div class="p-6 mb-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-2xl font-semibold text-teal-600">معلومات حول الأماكن السياحية</h2>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="p-4 border rounded-md bg-teal-50">
                    <h2 class="mt-2 text-lg font-bold text-teal-800">المعالم السياحية</h2>
                    @foreach ($country->attractions as $attract)
                        <div class="p-2">
                            <h3 class="text-lg font-medium text-teal-500">{{ $attract->name }}</h3>
                            <p class="m-2 text-sm text-gray-600">{{ $attract->description }}</p>
                            <hr class="bg-red-800">
                        </div>
                    @endforeach
                </div>

                <div class="p-4 border rounded-md bg-red-50">
                    <h2 class="mt-2 text-lg font-bold text-red-500">المخاطر</h2>
                    @foreach ($country->risks as $risk)
                        <div class="p-2">
                            <h3 class="text-lg font-medium text-red-600">{{ $risk->type }}</h3>
                            <p class="m-2 text-sm text-gray-600">{{ $risk->description }}</p>
                            <hr class="bg-red-800">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="p-6 mb-8 bg-white rounded-lg shadow-md">

            <!-- Comments Section -->

            <h2 class="mb-4 text-2xl font-bold text-teal-600">التعليقات</h2>

            <!-- Comment Form -->
            <form action="{{ route('country.addComment', $country->id) }}" method="POST" class="mb-6">
                @csrf
                <div class="mb-4">
                    <textarea name="comment_text"
                        class="w-full p-3 border border-gray-300 rounded-md focus:border-teal-500 focus:ring-teal-500" rows="3"
                        placeholder="أضف تعليقك هنا..."></textarea>
                    <input type="hidden" name="comment_user" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="comment_country" value="{{ $country->id }}">
                </div>
                <button type="submit"
                    class="px-4 py-2 text-white transition-colors bg-teal-600 rounded-md hover:bg-teal-700">
                    إرسال تعليق
                </button>
            </form>

            <!-- Comments List -->
            <div id="commentsList" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($country->comments as $comment)
                    <div class="flex flex-col items-start justify-between p-4 bg-teal-100 rounded-lg">
                        @if ($comment->user_id == auth()->user()->id)
                            <div class="flex justify-end w-full">
                                <form action="{{ route('country.deleteComment') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                    <button type="submit" class="text-red-500 transition-colors hover:text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif

                        <div class="w-full">
                            <div class="flex justify-between w-full">
                                <p class="font-semibold text-teal-700 ">{{ $comment->user->name }}</p>
                                <p class="px-2 text-sm text-gray-500">{{ $comment->created_at->format('Y-m-d') }}
                                </p>
                            </div>

                            <p class="mt-2 text-gray-800">{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- Comments Section -->

</x-app-layout>
