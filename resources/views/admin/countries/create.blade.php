{{--
@extends('admin.layouts.app')

@section('content')
<div class="container px-4 py-12 mx-auto">
    <h1 class="mb-8 text-3xl font-bold">إضافة دولة جديدة</h1>

    <form action="{{ route('countries.store') }}" method="POST" class="p-8 bg-white rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-2 font-semibold text-gray-700">اسم الدولة</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="capital" class="block mb-2 font-semibold text-gray-700">العاصمة</label>
            <input type="text" name="capital" id="capital" class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="language" class="block mb-2 font-semibold text-gray-700">اللغة</label>
            <input type="text" name="language" id="language" class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="population" class="block mb-2 font-semibold text-gray-700">عدد السكان</label>
            <input type="text" name="population" id="population" class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="image" class="block mb-2 font-semibold text-gray-700">رابط الصورة</label>
            <input type="text" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="overview" class="block mb-2 font-semibold text-gray-700">نظرة عامة</label>
            <textarea name="overview" id="overview" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
        </div>

        <h2 class="mb-4 text-2xl font-bold">المعالم السياحية</h2>
        <div id="attractions-wrapper">
            <div class="p-4 mb-4 border rounded-lg attraction-item">
                <div class="mb-2">
                    <label class="block mb-1 font-semibold text-gray-700">اسم المعلم</label>
                    <input type="text" name="attractions[0][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-2">
                    <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                    <textarea name="attractions[0][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                </div>
            </div>
        </div>
        <button type="button" id="add-attraction" class="px-4 py-2 text-white bg-blue-500 rounded-md">إضافة معلم</button>

        <h2 class="mt-8 mb-4 text-2xl font-bold">الأماكن السياحية</h2>
        <div id="tourism-places-wrapper">
            <div class="p-4 mb-4 border rounded-lg tourism-place-item">
                <div class="mb-2">
                    <label class="block mb-1 font-semibold text-gray-700">اسم المكان</label>
                    <input type="text" name="tourism_places[0][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-2">
                    <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                    <textarea name="tourism_places[0][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                </div>
                <div class="mb-2">
                    <label class="block mb-1 font-semibold text-gray-700">رابط الصورة</label>
                    <input type="text" name="tourism_places[0][image]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
            </div>
        </div>
        <button type="button" id="add-tourism-place" class="px-4 py-2 text-white bg-blue-500 rounded-md">إضافة مكان سياحي</button>

        <h2 class="mt-8 mb-4 text-2xl font-bold">المخاطر</h2>
        <div id="risks-wrapper">
            <div class="p-4 mb-4 border rounded-lg risk-item">
                <div class="mb-2">
                    <label class="block mb-1 font-semibold text-gray-700">نوع الخطر</label>
                    <input type="text" name="risks[0][type]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-2">
                    <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                    <textarea name="risks[0][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                </div>
            </div>
        </div>
        <button type="button" id="add-risk" class="px-4 py-2 text-white bg-blue-500 rounded-md">إضافة خطر</button>

        <div class="mt-6">
            <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-md">حفظ</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let attractionIndex = 1;
            let placeIndex = 1;
            let riskIndex = 1;

            document.getElementById('add-attraction').addEventListener('click', function () {
                const wrapper = document.getElementById('attractions-wrapper');
                const newAttraction = document.createElement('div');
                newAttraction.classList.add('attraction-item', 'mb-4', 'border', 'p-4', 'rounded-lg');
                newAttraction.innerHTML = `
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">اسم المعلم</label>
                        <input type="text" name="attractions[${attractionIndex}][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="attractions[${attractionIndex}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                `;
                wrapper.appendChild(newAttraction);
                attractionIndex++;
            });

            document.getElementById('add-tourism-place').addEventListener('click', function () {
                const wrapper = document.getElementById('tourism-places-wrapper');
                const newPlace = document.createElement('div');
                newPlace.classList.add('tourism-place-item', 'mb-4', 'border', 'p-4', 'rounded-lg');
                newPlace.innerHTML = `
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">اسم المكان</label>
                        <input type="text" name="tourism_places[${placeIndex}][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="tourism_places[${placeIndex}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">رابط الصورة</label>
                        <input type="text" name="tourism_places[${placeIndex}][image]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                `;
                wrapper.appendChild(newPlace);
                placeIndex++;
            });

            document.getElementById('add-risk').addEventListener('click', function () {
                const wrapper = document.getElementById('risks-wrapper');
                const newRisk = document.createElement('div');
                newRisk.classList.add('risk-item', 'mb-4', 'border', 'p-4', 'rounded-lg');
                newRisk.innerHTML = `
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">نوع الخطر</label>
                        <input type="text" name="risks[${riskIndex}][type]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                        <textarea name="risks[${riskIndex}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                `;
                wrapper.appendChild(newRisk);
                riskIndex++;
            });
        });
    </script>
</div>
@endsection --}}


{{-- @extends('admin.layouts.app')

@section('content')
<div class="py-6">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="p-6 border-b border-gray-200 bg-teal-50">
                <h1 class="mb-8 text-3xl font-bold text-teal-700">إضافة دولة جديدة</h1>

                <form action="{{ route('countries.store') }}" method="POST" class="p-8 bg-white rounded-lg shadow-md" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block mb-2 font-semibold text-gray-700">اسم الدولة</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="capital" class="block mb-2 font-semibold text-gray-700">العاصمة</label>
                        <input type="text" name="capital" id="capital" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="language" class="block mb-2 font-semibold text-gray-700">اللغة</label>
                        <input type="text" name="language" id="language" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="population" class="block mb-2 font-semibold text-gray-700">عدد السكان</label>
                        <input type="text" name="population" id="population" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block mb-2 font-semibold text-gray-700">صورة الدولة</label>
                        <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded-md" accept="image/*" onchange="previewImage(event)">
                        <img id="image-preview" src="" alt="Image preview" class="hidden h-auto max-w-full mt-4">
                    </div>

                    <div class="mb-4">
                        <label for="overview" class="block mb-2 font-semibold text-gray-700">نظرة عامة</label>
                        <textarea name="overview" id="overview" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>

                    <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-600">المعالم السياحية</h2>
                    <div id="attractions-wrapper">
                        <div class="p-4 mb-4 border rounded-lg attraction-item">
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-700">اسم المعلم</label>
                                <input type="text" name="attractions[0][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                                <textarea name="attractions[0][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-attraction" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">إضافة معلم</button>

                    <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-600">الأماكن السياحية</h2>
                    <div id="tourism-places-wrapper">
                        <div class="p-4 mb-4 border rounded-lg tourism-place-item">
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-700">اسم المكان</label>
                                <input type="text" name="tourism_places[0][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                                <textarea name="tourism_places[0][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-700">صورة المكان</label>
                                <input type="file" name="tourism_places[0][image]" class="w-full px-4 py-2 border border-gray-300 rounded-md" accept="image/*" onchange="previewTourismPlaceImage(event)">
                                <img id="tourism-place-image-preview" src="" alt="Image preview" class="hidden h-auto max-w-full mt-4">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-tourism-place" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">إضافة مكان سياحي</button>

                    <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-600">المخاطر</h2>
                    <div id="risks-wrapper">
                        <div class="p-4 mb-4 border rounded-lg risk-item">
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-700">نوع الخطر</label>
                                <input type="text" name="risks[0][type]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                                <textarea name="risks[0][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-risk" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">إضافة خطر</button>

                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-700">حفظ</button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        let attractionIndex = 1;
                        let placeIndex = 1;
                        let riskIndex = 1;

                        document.getElementById('add-attraction').addEventListener('click', function () {
                            const wrapper = document.getElementById('attractions-wrapper');
                            const newAttraction = document.createElement('div');
                            newAttraction.classList.add('attraction-item', 'mb-4', 'border', 'p-4', 'rounded-lg');
                            newAttraction.innerHTML = `
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-gray-700">اسم المعلم</label>
                                    <input type="text" name="attractions[${attractionIndex}][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                                    <textarea name="attractions[${attractionIndex}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                                </div>
                            `;
                            wrapper.appendChild(newAttraction);
                            attractionIndex++;
                        });

                        document.getElementById('add-tourism-place').addEventListener('click', function () {
                            const wrapper = document.getElementById('tourism-places-wrapper');
                            const newPlace = document.createElement('div');
                            newPlace.classList.add('tourism-place-item', 'mb-4', 'border', 'p-4', 'rounded-lg');
                            newPlace.innerHTML = `
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-gray-700">اسم المكان</label>
                                    <input type="text" name="tourism_places[${placeIndex}][name]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                                    <textarea name="tourism_places[${placeIndex}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-gray-700">صورة المكان</label>
                                    <input type="file" name="tourism_places[${placeIndex}][image]" class="w-full px-4 py-2 border border-gray-300 rounded-md" accept="image/*" onchange="previewTourismPlaceImage(event)">
                                    <img id="tourism-place-image-preview-${placeIndex}" src="" alt="Image preview" class="hidden h-auto max-w-full mt-4">
                                </div>
                            `;
                            wrapper.appendChild(newPlace);
                            placeIndex++;
                        });

                        document.getElementById('add-risk').addEventListener('click', function () {
                            const wrapper = document.getElementById('risks-wrapper');
                            const newRisk = document.createElement('div');
                            newRisk.classList.add('risk-item', 'mb-4', 'border', 'p-4', 'rounded-lg');
                            newRisk.innerHTML = `
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-gray-700">نوع الخطر</label>
                                    <input type="text" name="risks[${riskIndex}][type]" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-gray-700">الوصف</label>
                                    <textarea name="risks[${riskIndex}][description]" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
                                </div>
                            `;
                            wrapper.appendChild(newRisk);
                            riskIndex++;
                        });
                    });

                    function previewImage(event) {
                        const input = event.target;
                        const file = input.files[0];
                        const preview = document.getElementById('image-preview');
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                            }
                            reader.readAsDataURL(file);
                        } else {
                            preview.classList.add('hidden');
                        }
                    }

                    function previewTourismPlaceImage(event) {
                        const input = event.target;
                        const file = input.files[0];
                        const previewId = input.id.replace('tourism-place-image-', '');
                        const preview = document.getElementById(`tourism-place-image-preview-${previewId}`);
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                            }
                            reader.readAsDataURL(file);
                        } else {
                            preview.classList.add('hidden');
                        }
                    }
                </script>
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
                <h1 class="mb-8 text-3xl font-bold text-teal-700">إضافة دولة جديدة</h1>

                <form action="{{ route('countries.store') }}" method="POST" class="p-8 bg-white rounded-lg shadow-md" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block mb-2 font-semibold text-teal-700">اسم الدولة</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-teal-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="capital" class="block mb-2 font-semibold text-teal-700">العاصمة</label>
                        <input type="text" name="capital" id="capital" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="language" class="block mb-2 font-semibold text-teal-700">اللغة</label>
                        <input type="text" name="language" id="language" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="population" class="block mb-2 font-semibold text-teal-700">عدد السكان</label>
                        <input type="text" name="population" id="population" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block mb-2 font-semibold text-teal-700">صورة الدولة</label>
                        <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-teal-300 rounded-md" accept="image/*" onchange="previewImage(event)">
                        <img id="image-preview" src="" alt="Image preview" class="hidden h-auto max-w-full mt-4">
                    </div>

                    <div class="mb-4">
                        <label for="overview" class="block mb-2 font-semibold text-teal-700">نظرة عامة</label>
                        <textarea name="overview" id="overview" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                    </div>

                    <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-600">المعالم السياحية</h2>
                    <div id="attractions-wrapper">
                        <div class="p-4 mb-4 border border-teal-300 rounded-lg attraction-item">
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-teal-700">اسم المعلم</label>
                                <input type="text" name="attractions[0][name]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                                <textarea name="attractions[0][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-attraction" class="px-4 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600">إضافة معلم</button>

                    <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-600">الأماكن السياحية</h2>
                    <div id="tourism-places-wrapper">
                        <div class="p-4 mb-4 border border-teal-300 rounded-lg tourism-place-item">
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-teal-700">اسم المكان</label>
                                <input type="text" name="tourism_places[0][name]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                                <textarea name="tourism_places[0][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-teal-700">صورة المكان</label>
                                <input type="file" name="tourism_places[0][image]" class="w-full px-4 py-2 border border-teal-300 rounded-md" accept="image/*" onchange="previewTourismPlaceImage(event)">
                                <img id="tourism-place-image-preview" src="" alt="Image preview" class="hidden h-auto max-w-full mt-4">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-tourism-place" class="px-4 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600">إضافة مكان سياحي</button>

                    <h2 class="mt-8 mb-4 text-2xl font-bold text-teal-600">المخاطر</h2>
                    <div id="risks-wrapper">
                        <div class="p-4 mb-4 border border-teal-300 rounded-lg risk-item">
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-teal-700">نوع الخطر</label>
                                <input type="text" name="risks[0][type]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                            </div>
                            <div class="mb-2">
                                <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                                <textarea name="risks[0][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-risk" class="px-4 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600">إضافة خطر</button>

                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 text-white bg-teal-600 rounded-md hover:bg-teal-700">حفظ</button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        let attractionIndex = 1;
                        let placeIndex = 1;
                        let riskIndex = 1;

                        document.getElementById('add-attraction').addEventListener('click', function () {
                            const wrapper = document.getElementById('attractions-wrapper');
                            const newAttraction = document.createElement('div');
                            newAttraction.classList.add('attraction-item', 'mb-4', 'border', 'border-teal-300', 'p-4', 'rounded-lg');
                            newAttraction.innerHTML = `
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-teal-700">اسم المعلم</label>
                                    <input type="text" name="attractions[${attractionIndex}][name]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                                    <textarea name="attractions[${attractionIndex}][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                                </div>
                            `;
                            wrapper.appendChild(newAttraction);
                            attractionIndex++;
                        });

                        document.getElementById('add-tourism-place').addEventListener('click', function () {
                            const wrapper = document.getElementById('tourism-places-wrapper');
                            const newPlace = document.createElement('div');
                            newPlace.classList.add('tourism-place-item', 'mb-4', 'border', 'border-teal-300', 'p-4', 'rounded-lg');
                            newPlace.innerHTML = `
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-teal-700">اسم المكان</label>
                                    <input type="text" name="tourism_places[${placeIndex}][name]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                                    <textarea name="tourism_places[${placeIndex}][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-teal-700">صورة المكان</label>
                                    <input type="file" name="tourism_places[${placeIndex}][image]" class="w-full px-4 py-2 border border-teal-300 rounded-md" accept="image/*" onchange="previewTourismPlaceImage(event)">
                                    <img id="tourism-place-image-preview-${placeIndex}" src="" alt="Image preview" class="hidden h-auto max-w-full mt-4">
                                </div>
                            `;
                            wrapper.appendChild(newPlace);
                            placeIndex++;
                        });

                        document.getElementById('add-risk').addEventListener('click', function () {
                            const wrapper = document.getElementById('risks-wrapper');
                            const newRisk = document.createElement('div');
                            newRisk.classList.add('risk-item', 'mb-4', 'border', 'border-teal-300', 'p-4', 'rounded-lg');
                            newRisk.innerHTML = `
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-teal-700">نوع الخطر</label>
                                    <input type="text" name="risks[${riskIndex}][type]" class="w-full px-4 py-2 border border-teal-300 rounded-md">
                                </div>
                                <div class="mb-2">
                                    <label class="block mb-1 font-semibold text-teal-700">الوصف</label>
                                    <textarea name="risks[${riskIndex}][description]" class="w-full px-4 py-2 border border-teal-300 rounded-md"></textarea>
                                </div>
                            `;
                            wrapper.appendChild(newRisk);
                            riskIndex++;
                        });
                    });

                    function previewImage(event) {
                        const input = event.target;
                        const file = input.files[0];
                        const preview = document.getElementById('image-preview');
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                            }
                            reader.readAsDataURL(file);
                        } else {
                            preview.classList.add('hidden');
                        }
                    }

                    function previewTourismPlaceImage(event) {
                        const input = event.target;
                        const file = input.files[0];
                        const previewId = input.id.replace('tourism-place-image-', '');
                        const preview = document.getElementById(`tourism-place-image-preview-${previewId}`);
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                            }
                            reader.readAsDataURL(file);
                        } else {
                            preview.classList.add('hidden');
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection

