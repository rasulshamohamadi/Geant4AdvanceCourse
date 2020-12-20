<?php

namespace App\Http\Controllers;

use App\Admition;
use App\Person;
use App\PersonService;
use App\ServiceBim;
use App\Service;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class PeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('PatientNew', [
            'patients' => Person::all(),
        ]);
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
        $validator = Validator::make($request->all(), [
            'nationalcode' => 'required|unique:people|min:10',
            'first_name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

            $input = input::all();

        }

        Person::create($request->only(['nationalcode', 'first_name', 'last_name', 'father_name', 'birthplace', 'birthdate']));
        Admition::create($request->except('nationalcode', 'first_name', 'last_name', 'father_name', 'birthplace', 'birthdate', '_token')
             + ['user_id' => '1']
        );
        Session::flash('message', 'Successfully created nerd!');
        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //      return  Person::findOrFail($id)->Admition;

        return view('PatientShow', [
            'patients' => Person::all(),
            'patient' => Person::findOrFail($id),
            'Admition' => Person::find($id)->Admition,
            'PersonService' => Person::find($id)->PersonService,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('PatientNew', [
            'patients' => Person::all(),
            'patient' => Person::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Person::where('id', $id)->update($request->only(['nationalcode', 'first_name', 'last_name', 'father_name', 'birthplace', 'birthdate']));
        Session::flash('message', 'اطلاعات بروزرسانی شد ');
        return Redirect::route('people.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::where('id', $id)->delete();
        Session::flash('message', 'رکورد حذف شد ');
        return Redirect::back();
    }

    public function AddServiceToPerson($person_id, $service_id)
    {
        $Person = Person::findOrFail($person_id);
          
        $Service= Service::findOrFail($service_id);
        $ServiceBim = ServiceBim::where('service_id',$service_id) 
        ->where('insurance_id',$Person->admition[1]->insurance->id)->get();
        //return $ServiceBim;//->toSql() ;

        PersonService::insert(
            ['person_id' => $person_id,
                'user_id' => 1,
                'enterdate' => \Carbon\Carbon::now(),
                'service_id' => $service_id,
                'servicetype_id' => $service_id,
                'number' => 1,
                'price' => 15000,
                'totalprice' => 15000,
                'insuranprice' => 0,
                'cominsuranprice' => 0,
                'patientprice' => 0,
            ]);

        Session::flash('message', ' اضافه شد ');
        return Redirect::back();
    }

}
