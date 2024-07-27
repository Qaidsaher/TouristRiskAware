<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Country;
use Illuminate\Http\Request;

class UserCountryController extends Controller
{
    public function index(Request $request)
    {

        $name = $request->query('name');

        // Build query
        $query = Country::query();

        // Apply filters based on query parameters
        if ($name) {
            $query->where('name', 'like', "%$name%")->orWhere('capital', 'like', "%$name%")->orWhere('language', 'like', "%$name%");
        }



        // Fetch filtered countries
        $countries = $query->get();

        // Return the view with the filtered countries data
        // $countries = Country::with(['attractions', 'risks', 'tourismPlaces'])->get();
        return view('pages.countries', compact('countries'));
    }
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('pages.country_details', compact('country'));
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'comment_text' => 'required|string|max:255',
        ]);

        $country = Country::findOrFail($request->input('comment_country'));


        $country->comments()->create([
            'user_id' => $request->input('comment_user'), // or any other logic for user name
            'country_id' => $request->input('comment_country'),
            'comment' => $request->input('comment_text'),

        ]);

        return redirect()->back()->with('success', 'تمت إضافة التعليق بنجاح!');

    }

    public function deleteComment(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
        ]);

        $comment = Comment::findOrFail($request->input('comment_id'));
        $comment->delete();
        return redirect()->back()->with('success', 'تمت إزالة التعليق بنجاح!');
    }
}
