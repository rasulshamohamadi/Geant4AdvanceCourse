<?php

namespace App\Http\Controllers;

use App\PersonService;
use Redirect;
use Session;
use Illuminate\Http\Request;

class PersonServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonService  $personService
     * @return \Illuminate\Http\Response
     */
    public function show(PersonService $personService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonService  $personService
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonService $personService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonService  $personService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonService $personService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonService  $personService
     * @return \Illuminate\Http\Response
     */
    public function destroy($personService)
    {
        
        //return $personService ;
        PersonService::where('id', $personService)->delete();         
        Session::flash('message', 'رکورد حذف شد ');
        return Redirect::back();
        /*person_services*/
    }
}
