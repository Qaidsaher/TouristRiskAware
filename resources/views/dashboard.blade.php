<x-app-layout>
    <div class="">
        <section class="relative bg-center bg-no-repeat bg-cover"
            style="background-image: url('{{ asset('image_back/back (5).jpg') }}')">
            <div
                class="absolute inset-0 bg-gray-800/60 sm:bg-transparent sm:from-gray-800/60 sm:to-gray-800/30 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l">
            </div>

            <div class="relative max-w-screen-xl px-4 py-32 mx-auto sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
                <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                    <h1 class="text-4xl font-extrabold text-white sm:text-6xl">
                        دعنا نساعدك في العثور على

                        <strong class="block font-extrabold text-teal-400">أفضل وجهات السفر.</strong>
                    </h1>

                    <p class="max-w-lg mt-4 text-lg text-white sm:text-xl/relaxed">
                        نحن هنا لمساعدتك في اكتشاف أفضل الوجهات السياحية التي تناسب اهتماماتك. سواء كنت تبحث عن مغامرات
                        مثيرة أو أماكن للاسترخاء، لدينا كل ما تحتاجه لجعل رحلتك لا تُنسى.
                    </p>

                    <div class="flex flex-wrap gap-4 mt-8 text-center">
                        <a href="{{route('pages.countries')}}"
                            class="block w-full px-12 py-3 text-sm font-medium text-white bg-teal-500 rounded shadow hover:bg-teal-600 focus:outline-none focus:ring active:bg-teal-400 sm:w-auto">
                            ابدأ الآن
                        </a>

                         <a href="{{route('pages.countries')}}"
                            class="block w-full px-12 py-3 text-sm font-medium text-teal-500 bg-white rounded shadow hover:text-teal-600 focus:outline-none focus:ring active:text-teal-400 sm:w-auto">
                            تعرف أكثر
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="bg-white">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <section class="container p-6 mx-auto">
                    <h2 class="mb-6 text-3xl font-bold text-center text-teal-800">
                        وجهات السفر التي نوصي بها
                    </h2>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @php
                            $countries = \App\Models\Country::take(4)->get();
                        @endphp


                        @foreach ($countries as $country)
                            <a href="{{ route('pages.countries') }}"
                                class="relative block overflow-hidden transition-transform transform rounded-lg shadow-lg group hover:scale-105">
                                {{-- <img alt="Tourist Place" src="{{ asset('image_back/back (11).jpg') }}"
                                    class="object-cover w-full h-56 transition-opacity duration-300 group-hover:opacity-60" /> --}}
                                @if (filter_var($country->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $country->image }}" alt="{{ $country->name }}"
                                        class="object-cover w-full h-56 transition-opacity duration-300 group-hover:opacity-60" />
                                @else
                                    <img src="{{ Storage::url($country->image) }}" alt="{{ $country->name }}"
                                        class="object-cover w-full h-56 transition-opacity duration-300 group-hover:opacity-60" />
                                @endif
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-teal-500 via-transparent to-teal-100 opacity-60">
                                </div>
                                <div class="relative p-6 text-center">
                                    <p class="mb-2 text-sm font-semibold tracking-widest text-teal-800 uppercase">
                                        {{ $country->name }}
                                    </p>
                                    <h3 class="mb-4 text-lg font-bold text-orange-300">
                                        {{ $country->language }}-{{ $country->capital }}</h3>
                                    <p class="text-sm text-teal-700">{{ $country->overview }}</p>
                                </div>
                            </a>
                        @endforeach

                        {{-- <!-- Card 1 -->
                        <a href="#"
                            class="relative block overflow-hidden transition-transform transform rounded-lg shadow-lg group hover:scale-105">
                            <img alt="Tourist Place" src="{{ asset('image_back/back (11).jpg') }}"
                                class="object-cover w-full h-56 transition-opacity duration-300 group-hover:opacity-60" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-teal-500 via-transparent to-teal-100 opacity-60">
                            </div>
                            <div class="relative p-6 text-center">
                                <p class="mb-2 text-sm font-semibold tracking-widest text-teal-400 uppercase">مكان
                                    مغامرة
                                </p>
                                <h3 class="mb-4 text-lg font-bold text-white">غابة استوائية</h3>
                                <p class="text-sm text-gray-200">انطلق في مغامرة عبر الخضرة الكثيفة والحياة البرية
                                    النابضة
                                    في هذه الغابة الاستوائية.</p>
                            </div>
                        </a>
                        <!-- Card 2 -->
                        <a href="#"
                            class="relative block overflow-hidden transition-transform transform rounded-lg shadow-lg group hover:scale-105">
                            <img alt="Tourist Place" src="{{ asset('image_back/back (11).jpg') }}"
                                class="object-cover w-full h-56 transition-opacity duration-300 group-hover:opacity-60" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-teal-500 via-transparent to-teal-100 opacity-60">
                            </div>
                            <div class="relative p-6 text-center">
                                <p class="mb-2 text-sm font-semibold tracking-widest text-teal-400 uppercase">مكان
                                    مغامرة
                                </p>
                                <h3 class="mb-4 text-lg font-bold text-white">غابة استوائية</h3>
                                <p class="text-sm text-gray-200">انطلق في مغامرة عبر الخضرة الكثيفة والحياة البرية
                                    النابضة
                                    في هذه الغابة الاستوائية.</p>
                            </div>
                        </a>
                        <!-- Card 3 -->
                        <a href="#"
                            class="relative block overflow-hidden transition-transform transform rounded-lg shadow-lg group hover:scale-105">
                            <img alt="Tourist Place" src="{{ asset('image_back/back (11).jpg') }}"
                                class="object-cover w-full h-56 transition-opacity duration-300 group-hover:opacity-60" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-teal-500 via-transparent to-teal-100 opacity-60">
                            </div>
                            <div class="relative p-6 text-center">
                                <p class="mb-2 text-sm font-semibold tracking-widest text-teal-400 uppercase">مكان
                                    مغامرة
                                </p>
                                <h3 class="mb-4 text-lg font-bold text-white">غابة استوائية</h3>
                                <p class="text-sm text-gray-200">انطلق في مغامرة عبر الخضرة الكثيفة والحياة البرية
                                    النابضة
                                    في هذه الغابة الاستوائية.</p>
                            </div>
                        </a>
                        <!-- Card 4 -->
                        <a href="#"
                            class="relative block overflow-hidden transition-transform transform rounded-lg shadow-lg group hover:scale-105">
                            <img alt="Tourist Place" src="{{ asset('image_back/back (11).jpg') }}"
                                class="object-cover w-full h-56 transition-opacity duration-300 group-hover:opacity-60" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-teal-500 via-transparent to-teal-100 opacity-60">
                            </div>
                            <div class="relative p-6 text-center">
                                <p class="mb-2 text-sm font-semibold tracking-widest text-teal-400 uppercase">مكان
                                    مغامرة
                                </p>
                                <h3 class="mb-4 text-lg font-bold text-white">غابة استوائية</h3>
                                <p class="text-sm text-gray-200">انطلق في مغامرة عبر الخضرة الكثيفة والحياة البرية
                                    النابضة
                                    في هذه الغابة الاستوائية.</p>
                            </div>
                        </a> --}}
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="bg-orange-50">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-center py-10">
                <h3 class="text-3xl font-bold text-teal-800 lg:text-4xl">دوات أمان السفر</h3>
            </div>
            <div class="max-w-[85rem] px-4  sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <!-- Grid -->
                <div class="grid gap-12 md:grid-cols-2">
                    <div class="lg:w-3/4">
                        <h2 class="text-3xl font-bold text-teal-800 lg:text-4xl dark:text-teal-200">
                            أدوات أمان السفر لتجربة سفر آمنة
                        </h2>
                        <p class="mt-3 text-teal-700 dark:text-teal-300">
                            نحن نقدم لك الأدوات والموارد التي تحتاجها لضمان سلامتك أثناء السفر، من خلال تقديم إرشادات
                            السلامة
                            والأدوات التكنولوجية التي تساعدك في مواجهة أي تحديات.
                        </p>
                        <p class="mt-5">
                            <a class="inline-flex items-center font-medium text-teal-600 gap-x-1 dark:text-teal-400"
                                href="#">
                                اتصل بنا لمعرفة المزيد
                                <svg class="flex-shrink-0 transition ease-in-out size-4 group-hover:translate-x-1"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </a>
                        </p>
                    </div>
                    <!-- End Col -->

                    <div class="space-y-6 lg:space-y-10">
                        <!-- Icon Block -->
                        <div class="flex">
                            <!-- Icon -->
                            <span
                                class="flex-shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-teal-300 bg-teal-100 text-teal-800 shadow-sm mx-auto dark:bg-teal-700 dark:border-teal-600 dark:text-teal-100">
                                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2a5 5 0 0 1 5 5v1a5 5 0 0 1-5 5 5 5 0 0 1-5-5V7a5 5 0 0 1 5-5z" />
                                    <path d="M12 11a4 4 0 0 1 4 4v3H8v-3a4 4 0 0 1 4-4z" />
                                </svg>
                            </span>
                            <div class="ms-5 sm:ms-8">
                                <h3 class="text-base font-semibold text-teal-800 sm:text-lg dark:text-teal-200">
                                    دليل سلامة السفر الشامل
                                </h3>
                                <p class="mt-1 text-teal-700 dark:text-teal-300">
                                    نقدم لك دليلًا شاملًا يتضمن كل ما تحتاجه لضمان سلامتك أثناء السفر، من نصائح أساسية
                                    إلى
                                    استراتيجيات للتعامل مع الطوارئ.
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Block -->

                        <!-- Icon Block -->
                        <div class="flex">
                            <!-- Icon -->
                            <span
                                class="flex-shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-teal-300 bg-teal-100 text-teal-800 shadow-sm mx-auto dark:bg-teal-700 dark:border-teal-600 dark:text-teal-100">
                                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M4 9a2 2 0 0 1 2-2h4V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v3h4a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-4v3a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-3H6a2 2 0 0 1-2-2V9z" />
                                </svg>
                            </span>
                            <div class="ms-5 sm:ms-8">
                                <h3 class="text-base font-semibold text-teal-800 sm:text-lg dark:text-teal-200">
                                    أمان المعلومات الشخصية
                                </h3>
                                <p class="mt-1 text-teal-700 dark:text-teal-300">
                                    تعرف على كيفية حماية معلوماتك الشخصية أثناء السفر من خلال استخدام أدوات الأمان
                                    والتقنيات
                                    المناسبة.
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Block -->

                        <!-- Icon Block -->
                        <div class="flex">
                            <!-- Icon -->
                            <span
                                class="flex-shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-teal-300 bg-teal-100 text-teal-800 shadow-sm mx-auto dark:bg-teal-700 dark:border-teal-600 dark:text-teal-100">
                                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 10h12v10H6z" />
                                    <path d="M6 10V6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v4" />
                                </svg>
                            </span>
                            <div class="ms-5 sm:ms-8">
                                <h3 class="text-base font-semibold text-teal-800 sm:text-lg dark:text-teal-200">
                                    دعم 24/7 للطوارئ
                                </h3>
                                <p class="mt-1 text-teal-700 dark:text-teal-300">
                                    نحن هنا لدعمك على مدار الساعة، مع توفير الموارد والإرشادات اللازمة لمساعدتك في
                                    التعامل
                                    مع أي
                                    طارئ قد تواجهه أثناء السفر.
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Block -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->
            </div>
        </div>
    </div>


    <div class="bg-white">
        <div class="relative pt-16 pb-32 space-y-24 overflow-hidden">
            <div class="flex justify-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-800">
                    إرشادات لاختيار وجهة السفر المثالية
                </h2>
            </div>



            <div class="relative">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
                    <div class="max-w-xl px-6 mx-auto lg:mx-0 lg:max-w-none lg:py-16 lg:px-0">
                        <div>
                            <div>
                                <span class="flex items-center justify-center w-12 h-12 bg-green-500 rounded-xl">
                                    <span class="text-white">1</span>
                                </span>
                            </div>
                            <div class="mt-6">
                                <h2 class="text-3xl font-bold tracking-tight text-green-500">
                                    اختيار أفضل وجهة سفر:
                                </h2>
                                <p class="mt-4 text-lg text-gray-700">
                                    اكتشف كيفية اختيار الوجهة المثالية لرحلتك من خلال مراعاة عوامل مثل الأمان، الطقس،
                                    التكلفة، وتوافر الأنشطة التي تناسب اهتماماتك.
                                </p>
                                <div class="mt-6">
                                    <a class="inline-flex rounded-lg bg-green-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-green-600 hover:bg-green-700 hover:ring-green-700"
                                        href="/best-destination">
                                        اقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 sm:mt-16 lg:mt-0">
                        <div class="pl-6 -mr-48 md:-mr-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                            <img loading="lazy" width="500" height="486"
                                class="w-full shadow-2xl rounded-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                style="color:transparent" src="{{ asset('image_back/back (11).jpg') }}"
                                alt="اختيار أفضل وجهة سفر">
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
                    <div class="max-w-xl px-6 mx-auto lg:mx-0 lg:max-w-none lg:py-16 lg:px-0 lg:col-start-2">
                        <div>
                            <div>
                                <span class="flex items-center justify-center w-12 h-12 bg-yellow-500 rounded-xl">
                                    <span class="text-white">2</span>
                                </span>
                            </div>
                            <div class="px-12 mt-6">
                                <h2 class="text-3xl font-bold tracking-tight text-yellow-500">
                                    تقييم الأمان والراحة:
                                </h2>
                                <p class="mt-4 text-lg text-gray-700">
                                    تعلم كيفية تقييم أمان وراحة الوجهة من خلال مراجعة تقييمات المسافرين الآخرين، البحث
                                    عن
                                    المعلومات المتعلقة بالسلامة، وتقييم مستوى الراحة المتاح.
                                </p>
                                <div class="mt-6">
                                    <a class="inline-flex rounded-lg bg-yellow-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-yellow-600 hover:bg-yellow-700 hover:ring-yellow-700"
                                        href="/safety-comfort">
                                        اقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 sm:mt-16 lg:mt-0">
                        <div class="pl-6 -ml-48 md:-ml-16 lg:relative lg:mr-0 lg:h-full">
                            <img alt="تقييم الأمان والراحة" loading="lazy" width="500" height="486"
                                class="w-full shadow-xl rounded-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-[600px] lg:max-w-none"
                                style="color:transparent" src="{{ asset('image_back/back (12).jpg') }}"
                                alt="تقييم الأمان والراحة">
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
                    <div class="max-w-xl px-6 mx-auto lg:mx-0 lg:max-w-none lg:py-16 lg:px-0">
                        <div>
                            <div>
                                <span class="flex items-center justify-center w-12 h-12 bg-red-500 rounded-xl">
                                    <span class="text-white">3</span>
                                </span>
                            </div>
                            <div class="mt-6">
                                <h2 class="text-3xl font-bold tracking-tight text-red-500">
                                    مقارنة الخيارات المتاحة:
                                </h2>
                                <p class="mt-4 text-lg text-gray-700">
                                    تعرف على كيفية مقارنة الوجهات المختلفة من حيث التكلفة، الأنشطة المتاحة، والبنية
                                    التحتية
                                    لضمان اختيار الأنسب لرحلتك.
                                </p>
                                <div class="mt-6">
                                    <a class="inline-flex rounded-lg bg-red-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-red-600 hover:bg-red-700 hover:ring-red-700"
                                        href="/compare-options">
                                        اقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 sm:mt-16 lg:mt-0">
                        <div class="pl-6 -mr-48 md:-mr-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                            <img loading="lazy" width="646" height="485"
                                class="w-full shadow-2xl rounded-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                style="color:transparent" src="{{ asset('image_back/back (10).jpg') }}"
                                alt="مقارنة الخيارات المتاحة">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <section>
        <div class="max-w-screen-xl px-4 py-10 mx-auto sm:px-6 sm:py-24 lg:px-8">
            <div class="flex justify-center">
                <h2 class="text-3xl font-bold text-teal-400 sm:text-4xl">
                    نحن هنا لمساعدتك في العثور على وجهات سفر آمنة ومناسبة لك
                </h2>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 lg:grid-cols-2 lg:gap-16">
                <div class="relative h-64 overflow-hidden sm:h-80 lg:h-full">
                    <img alt="Travel Risk" src="{{ asset('image_back/back (6).jpg') }}"
                        class="absolute inset-0 object-cover w-full h-full" />
                </div>

                <div class="lg:py-16">
                    <article class="space-y-4 text-gray-600">
                        <h3 class="text-2xl font-semibold sm:text-3xl">
                            ما نقدمه
                        </h3>
                        <p>
                            نقدم لك حلولًا متكاملة لضمان سلامتك أثناء السفر. نحن نساعدك في تقييم المخاطر المرتبطة
                            بالوجهات المختلفة،
                            ونوفر لك المعلومات الضرورية لضمان تجربة سفر آمنة وممتعة.
                        </p>

                        <p>
                            فريقنا المتخصص يعمل على تقديم أحدث البيانات حول المخاطر المحتملة، ويساعدك في اختيار الوجهات
                            المناسبة بناءً على
                            تقييمات المخاطر والأمان. نحن ملتزمون بتوفير أفضل النصائح والإرشادات لتجنب المشاكل وتحقيق
                            أقصى استفادة من
                            رحلاتك.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
