<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email',
            'country' => 'nullable|string|max:100',
            'subject' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        // Automatically set created_by if user is logged in
        $validated['created_by'] = auth()->id() ?? 1; // Default to 1 if not logged in
    
        Contact::create($validated);
    
        return redirect()->back()->with('success', 'Thanks for contact with us.');
    }
    

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'vendor_id' => 'nullable|integer',
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'country' => 'nullable|string|max:100',
            'subject' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'last_updated_by' => 'nullable|integer',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
   

