<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {

        $countries = Country::with(['attractions', 'risks', 'tourismPlaces'])->get();
        return view('admin.countries.index', compact('countries'));
    }

    // Show the form for creating a new country
    public function create()
    {
        return view('admin.countries.create');
    }

    // Store a newly created country in storage

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'capital' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'population' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'overview' => 'nullable|string',
            'attractions.*.name' => 'nullable|string|max:255',
            'attractions.*.description' => 'nullable|string',
            'tourism_places.*.name' => 'nullable|string|max:255',
            'tourism_places.*.description' => 'nullable|string',
            'tourism_places.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'risks.*.type' => 'nullable|string|max:255',
            'risks.*.description' => 'nullable|string',
        ]);

        // Handle the image upload for the country
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images/countries', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create the country with validated data
        $country = Country::create($validatedData);

        // Handle attractions
        if (isset($validatedData['attractions'])) {
            foreach ($validatedData['attractions'] as $attraction) {
                $country->attractions()->create($attraction);
            }
        }

        // Handle tourism places
        if (isset($validatedData['tourism_places'])) {
            foreach ($validatedData['tourism_places'] as $index => $tourismPlace) {
                if ($request->hasFile("tourism_places.$index.image")) {
                    $placeImage = $request->file("tourism_places.$index.image");
                    $placeImagePath = $placeImage->store('images/tourism_places', 'public');
                    $tourismPlace['image'] = $placeImagePath;
                }
                $country->tourismPlaces()->create($tourismPlace);
            }
        }

        // Handle risks
        if (isset($validatedData['risks'])) {
            foreach ($validatedData['risks'] as $risk) {
                $country->risks()->create($risk);
            }
        }
        return redirect()->route('countries.index')->with('success', 'تم إنشاء  الدولة والبيانات المتعلقة بها بنجاح!');
    }


    // Display the specified country
    public function show(Country $country)
    {
        return view('admin.countries.show', compact('country'));
    }

    // Show the form for editing the specified country
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    // Update the specified country in storage
    public function update(Request $request, Country $country)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'capital' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'population' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Updated validation for image
            'overview' => 'nullable|string',
            'attractions.*.id' => 'nullable|integer|exists:attractions,id',
            'attractions.*.name' => 'nullable|string|max:255',
            'attractions.*.description' => 'nullable|string',
            'tourism_places.*.id' => 'nullable|integer|exists:tourism_places,id',
            'tourism_places.*.name' => 'nullable|string|max:255',
            'tourism_places.*.description' => 'nullable|string',
            'tourism_places.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'risks.*.id' => 'nullable|integer|exists:risks,id',
            'risks.*.type' => 'nullable|string|max:255',
            'risks.*.description' => 'nullable|string',
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imagePath = $image->store('images/countries', 'public');
            $validatedData['image'] = str_replace('public/', 'storage/', $imagePath);
        }

        // Update the country model with validated data
        $country->update($validatedData);

        // Update related data
        if (isset($validatedData['attractions'])) {
            foreach ($validatedData['attractions'] as $attraction) {
                if (isset($attraction['id'])) {
                    // Update existing attraction
                    $country->attractions()->where('id', $attraction['id'])->update($attraction);
                } else {
                    // Create new attraction
                    $country->attractions()->create($attraction);
                }
            }
        }

        if (isset($validatedData['tourism_places'])) {
            foreach ($validatedData['tourism_places'] as $index => $place) {
                if (isset($place['id'])) {
                    // Handle image upload for existing tourism places
                    if ($request->hasFile('tourism_places.' . $index . '.image')) {
                        $image = $request->file('tourism_places.' . $index . '.image');
                        $imagePath = $image->store('images/tourism_places', 'public');
                        $place['image'] = str_replace('public/', 'storage/', $imagePath);
                    }

                    // Update existing tourism place
                    $country->tourismPlaces()->where('id', $place['id'])->update($place);
                } else {
                    // Handle image upload for new tourism places
                    if ($request->hasFile('tourism_places.' . $index . '.image')) {
                        $image = $request->file('tourism_places.' . $index . '.image');
                        $imagePath = $image->store('images/tourism_places', 'public');
                        $place['image'] = str_replace('public/', 'storage/', $imagePath);
                    }

                    // Create new tourism place
                    $country->tourismPlaces()->create($place);
                }
            }
        }

        if (isset($validatedData['risks'])) {
            foreach ($validatedData['risks'] as $risk) {
                if (isset($risk['id'])) {
                    // Update existing risk
                    $country->risks()->where('id', $risk['id'])->update($risk);
                } else {
                    // Create new risk
                    $country->risks()->create($risk);
                }
            }
        }

        return redirect()->route('countries.index')->with('success', "تم تحديث بيانات الدولة والبيانات المتعلقة بها بنجاح!");
    }



    // Remove the specified country from storage
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('success', 'تم حذف الدولة بنجاح!');
    }
}
