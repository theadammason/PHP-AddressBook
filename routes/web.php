<?php

use App\Contact;
use Illuminate\Http\Request;

    Route::get('/', function () {
        return view('addressbook', [
            'addressbook' => Contact::orderBy('name', 'asc')->get()
        ]);
    });

    Route::get('/contact/{id}', function ($id) {
        return view('addressbook', [
            'addressbook' => Contact::where("id='$id'")->get()
        ]);
    });

    Route::post('/contact', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->save();
        return redirect('/');
    });


    Route::delete('/contact/{id}', function ($id) {
        Contact::findOrFail($id)->delete();
        return redirect('/');
    });
