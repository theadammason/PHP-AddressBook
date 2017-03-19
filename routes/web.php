<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Display contact list
Route::get('/', function () {

    return view('contacts', [
      'contacts' => Contact::orderBy('name', 'asc')->get()
    ]);
});


// Add a contact
Route::post('/contact', function (Request $request) {
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
      return redirect('/contacts')
        ->withInput()
        ->withErrors($validator);
    }

    $contact = new Contact;
    $contact->name = $request->name;
    $contact->save();

    return redirect('/');

});


// Remove a contact
Route::delete('/contact/{id}', function ($id) {
    Contact::findOrFail($id)->delete();

    return redirect('/');
});
