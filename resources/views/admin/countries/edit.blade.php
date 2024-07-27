{{--
@extends('admin.layouts.app')

@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addAttractionButton = document.getElementById('add-attraction');
        const attractionsWrapper = document.getElementById('attractions-wrapper');

        addAttractionButton.addEventListener('click', function() {
            const index = attractionsWrapper.children.length;
            const newAttractionHTML = `
                <div class="p-4 mb-4 border rounded-lg attraction-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">اسم المعلم</label>
                        <input type="text" name="attractions[${index}][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="attractions[${index}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
            `;
            attractionsWrapper.insertAdjacentHTML('beforeend', newAttractionHTML);
        });

        const addTourismPlaceButton = document.getElementById('add-tourism-place');
        const tourismPlacesWrapper = document.getElementById('tourism-places-wrapper');

        addTourismPlaceButton.addEventListener('click', function() {
            const index = tourismPlacesWrapper.children.length;
            const newTourismPlaceHTML = `
                <div class="p-4 mb-4 border rounded-lg tourism-place-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">اسم المكان</label>
                        <input type="text" name="tourism_places[${index}][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="tourism_places[${index}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">رابط الصورة</label>
                        <input type="text" name="tourism_places[${index}][image]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                </div>
            `;
            tourismPlacesWrapper.insertAdjacentHTML('beforeend', newTourismPlaceHTML);
        });

        const addRiskButton = document.getElementById('add-risk');
        const risksWrapper = document.getElementById('risks-wrapper');

        addRiskButton.addEventListener('click', function() {
            const index = risksWrapper.children.length;
            const newRiskHTML = `
                <div class="p-4 mb-4 border rounded-lg risk-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">نوع المخاطر</label>
                        <input type="text" name="risks[${index}][type]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="risks[${index}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                </div>
            `;
            risksWrapper.insertAdjacentHTML('beforeend', newRiskHTML);
        });
    });
</script>

<div class="container px-4 py-12 mx-auto">
    <h1 class="mb-8 text-3xl font-bold">تعديل تفاصيل {{ $country->name }}</h1>

    <form action="{{ route('countries.update', $country->id) }}" method="POST" class="p-8 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block mb-2 font-semibold text-gray-700">اسم الدولة</label>
            <input type="text" name="name" id="name" value="{{ $country->name }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="capital" class="block mb-2 font-semibold text-gray-700">العاصمة</label>
            <input type="text" name="capital" id="capital" value="{{ $country->capital }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="language" class="block mb-2 font-semibold text-gray-700">اللغة</label>
            <input type="text" name="language" id="language" value="{{ $country->language }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="population" class="block mb-2 font-semibold text-gray-700">عدد السكان</label>
            <input type="text" name="population" id="population" value="{{ $country->population }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="image" class="block mb-2 font-semibold text-gray-700">رابط الصورة</label>
            <input type="text" name="image" id="image" value="{{ $country->image }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="overview" class="block mb-2 font-semibold text-gray-700">نظرة عامة</label>
            <textarea name="overview" id="overview" class="w-full px-4 py-2 border border-gray-300 rounded-md">{{ $country->overview }}</textarea>
        </div>

        <h2 class="mb-4 text-2xl font-bold">المعالم السياحية</h2>
        <div id="attractions-wrapper">
            @foreach ($country->attractions as $index => $attraction)
                <div class="p-4 mb-4 border rounded-lg attraction-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">اسم المعلم</label>
                        <input type="text" name="attractions[{{ $index }}][name]"
                            value="{{ $attraction->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="attractions[{{ $index }}][description]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md">{{ $attraction->description }}</textarea>
                    </div>
                    <input type="hidden" name="attractions[{{ $index }}][id]" value="{{ $attraction->id }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add-attraction" class="px-4 py-2 text-white bg-blue-500 rounded-md">إضافة
            معلم</button>

        <h2 class="mt-8 mb-4 text-2xl font-bold">الأماكن السياحية</h2>
        <div id="tourism-places-wrapper">
            @foreach ($country->tourismPlaces as $index => $place)
                <div class="p-4 mb-4 border rounded-lg tourism-place-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">اسم المكان</label>
                        <input type="text" name="tourism_places[{{ $index }}][name]"
                            value="{{ $place->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="tourism_places[{{ $index }}][description]"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md">{{ $place->description }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">رابط الصورة</label>
                        <input type="text" name="tourism_places[{{ $index }}][image]"
                            value="{{ $place->image }}" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <input type="hidden" name="tourism_places[{{ $index }}][id]" value="{{ $place->id }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add-tourism-place" class="px-4 py-2 text-white bg-blue-500 rounded-md">إضافة مكان
            سياحي</button>

        <h2 class="mt-8 mb-4 text-2xl font-bold">المخاطر</h2>
        <div id="risks-wrapper">
            @foreach ($country->risks as $index => $risk)
                <div class="p-4 mb-4 border rounded-lg risk-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">نوع المخاطر</label>
                        <input type="text" name="risks[{{ $index }}][type]" value="{{ $risk->type }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="risks[{{ $index }}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md">{{ $risk->description }}</textarea>
                    </div>
                    <input type="hidden" name="risks[{{ $index }}][id]" value="{{ $risk->id }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add-risk" class="px-4 py-2 text-white bg-blue-500 rounded-md">إضافة خطر</button>

        <div class="mt-8">
            <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-md">تحديث</button>
        </div>
    </form>
</div>
@endsection
 --}}


 @extends('admin.layouts.app')

@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addAttractionButton = document.getElementById('add-attraction');
        const attractionsWrapper = document.getElementById('attractions-wrapper');

        addAttractionButton.addEventListener('click', function() {
            const index = attractionsWrapper.children.length;
            const newAttractionHTML = `
                <div class="p-4 mb-4 border border-teal-300 rounded-lg attraction-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">اسم المعلم</label>
                        <input type="text" name="attractions[${index}][name]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                        <textarea name="attractions[${index}][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                    </div>
                </div>
            `;
            attractionsWrapper.insertAdjacentHTML('beforeend', newAttractionHTML);
        });

        const addTourismPlaceButton = document.getElementById('add-tourism-place');
        const tourismPlacesWrapper = document.getElementById('tourism-places-wrapper');

        addTourismPlaceButton.addEventListener('click', function() {
            const index = tourismPlacesWrapper.children.length;
            const newTourismPlaceHTML = `
                <div class="p-4 mb-4 border border-teal-300 rounded-lg tourism-place-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">اسم المكان</label>
                        <input type="text" name="tourism_places[${index}][name]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                        <textarea name="tourism_places[${index}][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">اختيار الصورة</label>
                        <input type="file" name="tourism_places[${index}][image]" accept="image/*" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                </div>
            `;
            tourismPlacesWrapper.insertAdjacentHTML('beforeend', newTourismPlaceHTML);
        });

        const addRiskButton = document.getElementById('add-risk');
        const risksWrapper = document.getElementById('risks-wrapper');

        addRiskButton.addEventListener('click', function() {
            const index = risksWrapper.children.length;
            const newRiskHTML = `
                <div class="p-4 mb-4 border border-teal-300 rounded-lg risk-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">نوع المخاطر</label>
                        <input type="text" name="risks[${index}][type]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                        <textarea name="risks[${index}][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                    </div>
                </div>
            `;
            risksWrapper.insertAdjacentHTML('beforeend', newRiskHTML);
        });
    });
</script>

<div class="container px-4 py-12 mx-auto">
    <h1 class="mb-8 text-3xl font-bold text-teal-700">تعديل تفاصيل {{ $country->name }}</h1>

    <form action="{{ route('countries.update', $country->id) }}" method="POST" enctype="multipart/form-data" class="p-8 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block mb-2 font-semibold text-teal-700">اسم الدولة</label>
            <input type="text" name="name" id="name" value="{{ $country->name }}"
                class="w-full px-4 py-2 border border-teal-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="capital" class="block mb-2 font-semibold text-teal-700">العاصمة</label>
            <input type="text" name="capital" id="capital" value="{{ $country->capital }}"
                class="w-full px-4 py-2 border border-teal-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="language" class="block mb-2 font-semibold text-teal-700">اللغة</label>
            <input type="text" name="language" id="language" value="{{ $country->language }}"
                class="w-full px-4 py-2 border border-teal-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="population" class="block mb-2 font-semibold text-teal-700">عدد السكان</label>
            <input type="text" name="population" id="population" value="{{ $country->population }}"
                class="w-full px-4 py-2 border border-teal-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="image" class="block mb-2 font-semibold text-teal-700">اختيار الصورة</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-teal-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="overview" class="block mb-2 font-semibold text-teal-700">نظرة عامة</label>
            <textarea name="overview" id="overview" class="w-full px-4 py-2 border border-teal-300 rounded-md">{{ $country->overview }}</textarea>
        </div>

        <h2 class="mb-4 text-2xl font-bold text-teal-700">المعالم السياحية</h2>
        <div id="attractions-wrapper">
            @foreach ($country->attractions as $index => $attraction)
                <div class="p-4 mb-4 border border-teal-300 rounded-lg attraction-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">اسم المعلم</label>
                        <input type="text" name="attractions[{{ $index }}][name]"
                            value="{{ $attraction->name }}" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                        <textarea name="attractions[{{ $index }}][description]"
                            class="w-full px-4 py-2 border border-teal-300 rounded-md">{{ $attraction->description }}</textarea>
                    </div>
                    <input type="hidden" name="attractions[{{ $index }}][id]" value="{{ $attraction->id }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add-attraction" class="px-4 py-2 text-white bg-teal-500 rounded-md">إضافة معلم</button>

        <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-700">الأماكن السياحية</h2>
        <div id="tourism-places-wrapper">
            @foreach ($country->tourismPlaces as $index => $place)
                <div class="p-4 mb-4 border border-teal-300 rounded-lg tourism-place-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">اسم المكان</label>
                        <input type="text" name="tourism_places[{{ $index }}][name]"
                            value="{{ $place->name }}" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                        <textarea name="tourism_places[{{ $index }}][description]"
                            class="w-full px-4 py-2 border border-teal-300 rounded-md">{{ $place->description }}</textarea>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">اختيار الصورة</label>
                        <input type="file" name="tourism_places[{{ $index }}][image]" accept="image/*"
                            class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                    <input type="hidden" name="tourism_places[{{ $index }}][id]" value="{{ $place->id }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add-tourism-place" class="px-4 py-2 text-white bg-teal-500 rounded-md">إضافة مكان سياحي</button>

        <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-700">المخاطر</h2>
        <div id="risks-wrapper">
            @foreach ($country->risks as $index => $risk)
                <div class="p-4 mb-4 border border-teal-300 rounded-lg risk-item">
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">نوع المخاطر</label>
                        <input type="text" name="risks[{{ $index }}][type]" value="{{ $risk->type }}"
                            class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                        <textarea name="risks[{{ $index }}][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md">{{ $risk->description }}</textarea>
                    </div>
                    <input type="hidden" name="risks[{{ $index }}][id]" value="{{ $risk->id }}">
                </div>
            @endforeach
        </div>
        <button type="button" id="add-risk" class="px-4 py-2 text-white bg-teal-500 rounded-md">إضافة خطر</button>

        <div class="mt-8">
            <button type="submit" class="px-4 py-2 text-white bg-teal-600 rounded-md">تحديث</button>
        </div>
    </form>
</div>
@endsection
