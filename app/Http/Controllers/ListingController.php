<?php

namespace App\Http\Controllers;
use  App\Models\Listing;
use  App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // this is the index method for the listing all listings
    public function index(){
        return view('listings.index',[
            'listings' => Listing:: latest()->filter(request(['tag','search']))->paginate(5)
        ]);
    }

    // this is the show method for the single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // this is the show method for the create single listing
    public function create(){
        return view('listings.create');
    }

    // this is the store method for the create single listing
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => ['required','url'],
            'email' => ['required','email'],
            'tags' => 'required',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // this is the user id of the authenticated user
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message','Listing Created !');
    }

    // this is the show edit form for the single listing
    public function edit(Listing $listing){
        return view('listings.edit',[
            'listing' => $listing
        ]);
    }

    // this is the update method for the single listing
    public function update(Request $request, Listing $listing){
        //makes sure that logged in user is the owner of the listing
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => ['required','url'],
            'email' => ['required','email'],
            'tags' => 'required',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message','Listing Updated !');
    }

    // this is the delete method for the single listing
    public function destroy(Listing $listing){
         //makes sure that logged in user is the owner of the listing
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted !');
    }

    // // this is the show method for the Managing users listings
    // public function manage(User $user){
    //     return view('listings.manage',[
    //         'listings' => auth()->user()->listings->get()
    //     ]);

    // }
}
