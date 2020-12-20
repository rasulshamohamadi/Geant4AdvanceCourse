<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ServicesController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GetServiceName(Request $request)
    {

        if ($request->get('query')) {}
            $query = $request->get('query');
            $patient_id = $request->get('patient_id');
            $data = DB::table('services')
            ->where('title', 'LIKE', "%{$query}%")
                ->get(); 
            $output = '';
            foreach ($data as $row) {
                if($row->type=='drug')
                {
                    $output .= '<a class="btn btn-success" id="selectservice" href="'.route('patient.addservice', ['person_id'=>$patient_id,'service_id'=>$row->id     ]  )
                    .'" ><i class="fa fa-fw fa-stethoscope"></i>' . $row->title . '</a> &nbsp;';
                }elseif($row->type=='service'){
                    $output .= '<a class="btn btn-info"  id="selectservice"  href="'.route('patient.addservice', ['person_id'=>$patient_id,'service_id'=>$row->id ]  )
                    .'" ><i class="fa fa-fw fa-user-md"></i>' . $row->title . '</a>  &nbsp;';
                }elseif($row->type=='tool'){
                    $output .= '<a class="btn btn-warning"  id="selectservice"  href="'.route('patient.addservice', ['person_id'=>$patient_id,'service_id'=>$row->id ]  )
                    .'"  ><i class="fa fa-fw fa-wheelchair"></i>' . $row->title . '</a> &nbsp;';
                }
                
                
               
            }
            $output .= '';
            echo $output;
             
        
    }

}