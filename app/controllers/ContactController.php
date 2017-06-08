<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
        // Récuperer tout les contacts
        $contacts = Contact::all();

        // Mettre la vue et y mettre les contacts
        return View::make('contacts.index')
            ->with('contacts', $contacts);
    
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Charge la vue pour créer un contact
        return View::make('contacts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contacts/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $contact = new Contact;
            $contact->name       = Input::get('name');
            $contact->email      = Input::get('email');
            $contact->save();

            // redirect
            Session::flash('message', 'Successfully created a contact!');
            return Redirect::to('contacts');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Récuperer un contact
        $contact = Contact::find($id);

        // Montrer la vue et lui passer le contact
        return View::make('contacts.show')
            ->with('contact', $contact);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Récupérer le contact
        $contact = Contact::find($id);

        // show the edit form and pass the nerd
        return View::make('contacts.edit')
            ->with('contact', $contact);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contacts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $contact = Contact::find($id);
            $contact->name       = Input::get('name');
            $contact->email      = Input::get('email');
            $contact->save();

            // redirect
            Session::flash('message', 'Successfully updated a contact');
            return Redirect::to('contacts');
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Supprimer
        $contact = Contact::find($id);
        $contact->delete();

        // redirection
        Session::flash('message', 'Successfully deleted the contact');
        return Redirect::to('contacts');
	}


}
