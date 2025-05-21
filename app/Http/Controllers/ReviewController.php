<?php

namespace App\Http\Controllers;

use App\Models\RoomReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = RoomReview::all();
        return view('backend.reviews.index', compact('reviews'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
    public function changeStatus(Request $request)
    {
        $request->validate([
            'review_id' => 'required|exists:room_reviews,id',
            'status' => 'required|in:pending,confirmed,rejected',
        ]);
 
        $review = RoomReview::findOrFail($request->review_id);
        $review->status = $request->status;
        $review->save();

        return response()->json(['message' => 'Review status updated successfully.']);
    }
}
   

