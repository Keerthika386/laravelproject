<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function employee()
    {
        $employee_records = Employee::get();
        return view('employee.index',['employee_details'=>$employee_records]);
    }

    public function addemployee(){
        return view('employee.add');
    }

    public function employeestore(Request $request){

        // echo "<pre>";print_r($request->all());exit;
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:employee',
            'dob'           =>'required',
            'qualification' => 'required',
            'experience'    => 'required|numeric',
            'ctc'           => 'required|numeric',
            'experience_certificate'=> 'required|file|mimes:pdf,doc,docx|max:2048',
            'education_qualification'=> 'required|file|mimes:pdf,doc,docx|max:2048',

        ]);

        if ($request->hasFile('experience_certificate')) {
            $experienceCertificatePath = $request->file('experience_certificate')->store('certificates', 'public');
        }

        if ($request->hasFile('education_qualification')) {
            $educationQualificationPath = $request->file('education_qualification')->store('qualifications', 'public');
        }

        $record                 = new Employee();
        $record->name           = $request->name;
        $record->dob            = $request->dob;
        $record->qualification  = $request->qualification;
        $record->experience     = $request->experience;
        $record->email          = $request->email;
        $record->ctc            = $request->ctc;
        $record->experience_certificate = $experienceCertificatePath ?? null;
        $record->education_qualification =$educationQualificationPath ?? null;
        $record->save();

        return redirect()->back()->with('success', 'Employee created successfully.');
    }

    public function employeeEdit($id){
        
        $id = \Crypt::decrypt($id);

        $records = Employee::where('id',$id)->first();
        return view('employee.edit',['employee_detail'=>$records]);
        
        
    }

    public function employeeupdate(Request $request){

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'dob'           =>'required',
            'qualification' => 'required',
            'experience'    => 'required|numeric',
            'ctc'           => 'required|numeric',

        ]);

        $record = Employee::where('id',$request->id)->first();
        $record->name           = $request->name;
        $record->dob            = $request->dob;
        $record->qualification  = $request->qualification;
        $record->experience     = $request->experience;
        $record->email          = $request->email;
        $record->ctc            = $request->ctc;
        $record->save();

        return redirect()->back()->with('success', 'Employee Updated successfully.');

    }

    public function employeedelete($id){

        $id = \Crypt::decrypt($id);

         $record = Employee::where('id',$id)->first();
         $record->delete();
        return redirect()->back()->with('success', 'Employee Deleted successfully.');

    }
}
