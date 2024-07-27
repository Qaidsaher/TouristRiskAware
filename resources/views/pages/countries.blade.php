<x-app-layout>

    <div class="py-10 bg-white">
        <div class="px-6 mx-auto max-w-7xl lg:px-8 ">
            <div class="text-center ">
                <form method="GET" action="{{ route('pages.countries') }}" class="mb-6">
                    <div class="p-10 mx-auto bg-teal-500 rounded-lg">
                        <h1 class="text-4xl font-bold text-center text-white">البحث عن دولة</h1>
                        <p class="max-w-lg mx-auto my-6 text-sm font-normal text-white">
                            أدخل اسم الدولة المراد البحث عنها واختر اللغة من القائمة المنسدلة للفرز
                        </p>
                        <div class="flex items-center justify-between px-2 py-1 bg-white rounded-lg">
                            <input class="flex-grow px-2 text-base text-gray-400 border-teal-300 rounded-md outline-none" name="name"
                                type="text" placeholder="ابحث عن الدولة" value="{{old('name')}}"/>
                            <div class="flex items-center px-1 mx-auto space-x-4 space-x-reverse rounded-lg">

                                <button type="submit" class="px-4 py-2 text-base font-thin text-white bg-teal-500 rounded-lg">
                                    بحث
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="grid items-start grid-cols-1 p-2 xl:grid-cols-3 gap-y-10 gap-x-6">

                @foreach ($countries as $country)
                    <li
                        class="relative flex flex-col items-center py-4 overflow-hidden bg-white rounded-lg shadow-lg sm:flex-row xl:flex-col">
                        <!-- Text and Description Section -->
                        <div class="flex-1 order-2 px-1 sm:mr-6 xl:ml-0">
                            <h3 class="mb-2 text-xl font-semibold text-slate-900">
                                <span class="block py-2 mb-1 text-lg leading-6 text-cyan-500">{{ $country->name }}</span>
                                <span class="font-bold">العاصمة:</span>
                                <span class="text-teal-500">{{ $country->capital }}</span>
                            </h3>
                            <div class="prose-sm prose prose-slate text-slate-600 line-clamp-2">
                                <p>{{ $country->overview }}</p>
                            </div>
                            <a class="inline-flex items-center px-4 py-2 mt-6 text-sm font-semibold text-teal-500 rounded-full group bg-slate-100 text-slate-700 hover:bg-teal-200 hover:text-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                href="{{route('pages.countries_show',$country->id)}}">
                                عرض المزيد
                                <span class="sr-only">هناك أكثر من {{ $country->tourismPlaces()->count() }} معلم
                                    سياحي</span>
                                <svg class="px-2 -ml-2 overflow-visible text-slate-300 group-hover:text-slate-400"
                                    width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M0 0L3 3L0 6"></path>
                                </svg>
                            </a>
                        </div>
                        <!-- Image Section -->
                        @if (filter_var($country->image, FILTER_VALIDATE_URL))
                            <img src="{{ $country->image }}" alt="{{ $country->name }}"
                                class="mb-6 sm:mb-0 shadow-lg rounded-lg bg-slate-50 w-full sm:w-[17rem] xl:w-full object-cove h-[220px] flex justify-center items-center"
                                width="1216" height="500">
                        @else
                            <img src="{{ Storage::url($country->image) }}" alt="{{ $country->name }}"
                                class="mb-6 sm:mb-0 shadow-lg rounded-lg bg-slate-50 w-full sm:w-[17rem] xl:w-full object-cove h-[220px] flex justify-center items-center text-teal-300"
                                width="1216" height="500">
                        @endif

                    </li>
                @endforeach
            </ul>
        </div>
    </div>


</x-app-layout>
