<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use App\Models\Patient;
use Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient_data =   DB::select(DB::raw("SELECT p.*,TIMESTAMPDIFF(YEAR, p.patient_dob, CURDATE()) AS p_age FROM `patient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1"));
        $data['patientdata']  = $patient_data;
        $activedata = Patient::where('is_active','1')->get();
        $inactivedata = Patient::where('is_active','0')->get();
        $active_data   = $activedata->toArray();
        $inactive_data = $inactivedata->toArray();
        $data['total_patient'] = count($active_data)+count($inactive_data);
        $data['active_data']=count($active_data);
        $data['inactive_data']=count($inactive_data);
        return view('dashboard',compact("data"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_data =   DB::select(DB::raw("SELECT * FROM `categories` where is_active=1"));
        $categories  = $categories_data;
        return view('patient.add-patient',compact("categories"));
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
        $validated = $request->validate([
                                            'patient_fname' => 'required|max:25',
                                            'patient_lname' => 'required|max:25',
                                            'patient_dob' => 'required|date_format:d-m-Y|before:today',
                                            'patient_gender'=>'required',
                                            'category_id'=>'required',
                                            'patient_number'=>'required|unique:patient|numeric|digits_between:9,11',
                                        ],
                                        [
                                            'patient_fname.required' => 'The patient fname field is required.',
                                            'patient_lname.required' => 'The patient lname field is required.',
                                            'patient_dob.required' => 'The patient dob field is required.',
                                            'patient_gender.required' => 'The patient gender field is required.',
                                            'category_id.required' => 'The patient category Id field is required.',
                                            'patient_number.required' => 'The patient number field is required.',
                                        ]);

        $patient_fname = $request->patient_fname;
        $patient_lname = $request->patient_lname;
        $patient_dob = $request->patient_dob;
        $dob = date('Y-m-d H:i:s', strtotime($patient_dob));
        $patient_gender = $request->patient_gender;
        $category_id = $request->category_id;
        $patient_number = $request->patient_number;
        $created_at = date('Y-m-d H:i:s');
      //  $updated_at=NULL;
        $visited_date= date('Y-m-d H:i:s');
        $is_active=1;

        $data=array('patient_fname'=>$patient_fname,"patient_lname"=>$patient_lname,"patient_dob"=>$dob,"patient_gender"=>$patient_gender,"category_id"=>$category_id,"patient_number"=>$patient_number,"is_active"=>$is_active,"created_at"=>$created_at,"visited_date"=>$visited_date);
        $get = DB::table('patient')->insert($data);

        if($get){
            return array('status'=>'success','msg'=>'insert success','code'=>200,'redirect'=>true);
        }else{
            return response()->json(['errors'=> array('msg'=>'Failed to insert')], 422);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $where = array('patient_id' => $id);
        $user  = Patient::where($where)->first();
        return Response::json($user);
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


    public function update(Request $request, $id)
    {
        $v_date = $request->visited_date;
        $n_visit_date = $request->next_visit_date;
        $is_active =  $request->is_active;

        $validator = Validator::make($request->all(),[
                                                        'visited_date' => 'required',
                                                        'next_visit_date' => 'required',
                                                        'is_active' => 'required'
                                                    ]);


        if($validator->fails())
        {
           return response()->json(['errors'=>$validator->errors()], 422);
        }else
        {

            $visited_date =date('Y-m-d H:i:s', strtotime($v_date));
            $next_visit_date =date('Y-m-d H:i:s', strtotime($n_visit_date));

            $update_array = [
                                'visited_date' => $visited_date,
                                'next_visit_date' => $next_visit_date,
                                'is_active' => $is_active
                            ];
             $get =  Patient::where('patient_id', $id)
                            ->update($update_array);

            if($get==1)
            {
                return array('status'=>'success','msg'=>'updated successully','code'=>200,'redirect'=>true);
            }else{
               return response()->json(['errors'=> array('msg'=>'Failed to update')], 422);
            }
        }
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
}
