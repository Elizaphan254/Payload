<?php

namespace App\Http\Controllers\Admin;

use App\{Employee,department,bank,pr_incomes_deduction};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DataTables;
use Brkepay;
use DB;
class EmployeeController extends Controller
{
    private $folder = "admin.employee.";
    
    public function index()
    {
        return View($this->folder.'index',[
            'get_data' => route($this->folder.'getData'),
        ]);
    }
    
    public function getData(){
        return View($this->folder.'content',[
            'add_new' => route($this->folder.'create'),
            'getDataTable' => route($this->folder.'getDataTable'),
            'moveToTrashAllLink' => route($this->folder.'massDelete'),
            'employees' => Employee::get(),
        ]);
    }
    
    //not use now : 03-05-2021 @auther : kdvamja
    public function getDataTable(){
        $employees = Employee::get();
        return Datatables::of($employees)
                    ->addIndexColumn()
                    // ->addColumn('avatar', function($data){
                    //     $avatar = "<img src='".$data->mediaUrl['thumb']."' class='table-user-thumb'>";
                    //     return $avatar;
                    // })
                    ->addColumn('staff', function($data){
                            $staff = "<span class='success-dot' title='Active' title='Active Employee'></span>";
                            "<div class=''>
                            <b>staff No :</b> <span>".$data->staffno."</span></br>
                            <b>Name :</b> <span>".$data->staffnames."</span></br>
                            </div>";                            
                            return $staff;
                    })
                    ->addColumn('status', function($data){
                        if($data->status == '1'){
                            $status = "<span class='success-dot' title='Active' title='Active Employee'></span>";
                        }else{
                            $status = "<i class='ik ik-alert-circle text-danger alert-status' title='In-Active Employee'></i>";
                        }
                        return $status;
                    })
                    ->addColumn('details', function($data){
                        $details = "<div class=''>
                        		<b>Gender :</b> <span>".$data->gender."</span></br>
                                <b>Id No.:</b> <span>".$data->idno."</span></br>
                        		<b>Cellphone :</b> <span>".$data->cellphone."</span></br>
                        		<b>Email :</b> <span>".$data->email."</span></br>
                        		</div>";
                        return $details;
                    })
                    ->addColumn('department', function($data){
                        return $data->department;
                    })
                    ->addColumn('action', function($data){
                            $btn = "<div class='table-actions'>
                            <a data-href='".route($this->folder.'show',['id'=>$data->id])."' class='show-employee cursure-pointer'><i class='ik ik-eye text-primary'></i></a>
                            <a href='".route($this->folder."edit",['id'=>$data->id])."'><i class='ik ik-edit-2 text-dark'></i></a>
                            <a data-href='".route($this->folder."destroy",['id'=>$data->id])."' class='delete cursure-pointer'><i class='ik ik-trash-2 text-danger'></i></a>
                            </div>";
                            return $btn;
                    })
                    ->rawColumns(['action','staff','status','department','details'])
                    ->toJson();
    }
    
    public function create()
    {   
        $now=Carbon::today()->toDateString();
        $dobDEFAULT=Carbon::today()->subYear(25)->toDateString();
        $departments=department::all();
        $banks=bank::where('status',1)->cursor();
        $princdeds=pr_incomes_deduction::where('status',1)->cursor();
        return View($this->folder."create",[
            'form_store' => route($this->folder.'store')])->with(['today'=>$now,'dobDEFAULT'=>$dobDEFAULT,'departments'=>$departments,'banks'=>$banks,'princdeds'=>$princdeds]);
    }
    
    public function store(Request $request)
    {
        //DB::beginTransaction();
        // try {
            // $this->validate($request,[
            //     'staffnames' => 'required',
            //     'status' => 'required|min:1',
            //     'idno' => 'required|unique|min:7',
            //     'gender' => 'required|min:1',
            //     'dob' => 'required',
            //     'empdate' => 'required'
            // ]);
            $_staffNo=Brkepay::getNextNumber('STAFF');
            $data = [
                'staffno' => $_staffNo,
                'staffnames' => $request->staffnames,
                'idno' => $request->idno,
                'gender' => $request->gender,
                'status' => $request->status,
                'pinno' => $request->pinno,
                'nhifno' => $request->nhifno,
                'nssfno' => $request->nssfno,
                'payetype' => $request->payetype,
                'no_relief' =>($request->no_relief=='on'? 1: 0),
                'nhif_relief' => ($request->nhif_relief=='on'? 1: 0),
                'department' => $request->department,
                'dob' => $request->dob,
                'emp_date' => $request->empdate,
                'cellphone' => $request->cellphone,
                'email' => $request->email,
                'pobox' => $request->pobox,
                'nationality' => $request->nationality,
                'marital' => $request->marital,
                'paymode' => $request->paymode,
                'bank' => $request->bank,
                'branch' => $request->branch,
                'accountno' => $request->accountno,
                'nok' => $request->nok,
                'nokcellphone' => $request->nokcellphone,
                'nokrelation' => $request->nokrelation,
            ];
            $employee = Employee::create($data);
            $employee->save();
            //DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Staff Created Successfully'
            ], 200);
        // } catch (\Throwable $th) {
        //     // DB::rollBack();
        //     return response()->json([
        //         'status' => false,
        //         'message' => $th->getMessage()
        //     ], 500);
        // }  
    }
    
    public function show(Employee $employee){   
        return View($this->folder.'show',[
            'employee'=>$employee,
        ]);
    }
    
    public function edit(Employee $employee)
    {
        $schedules = Schedule::get();
        $positions = Position::get();
        return View($this->folder.'edit',[
            'employee' => $employee,
            'form_update' => route($this->folder.'update',['employee'=>$employee]),
            'schedules' => $schedules,
            'positions' => $positions,
            'removeAvatar' => route('admin.removeMedia',[
                'model'=>'Employee',
                'model_id'=>$employee->id,
                'collection'=>'avatar']),
        ]);
    }
    
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'schedule_id' => $request->schedule_id,
            'position_id' => $request->position_id,
            'address' => $request->address,
            'remark' => $request->remark,
            'rate_per_hour' => $request->rate_per_hour,
            'salary' => $request->salary,
            'is_active' => $request->is_active,
        ];
        $employee->update($data);
        
        if($request->has('media') && file_exists(storage_path('media/uploads/'.$request->input('media')))){
            $media = $employee->addMedia(storage_path('media/uploads/' . $request->input('media')))->toMediaCollection('avatar');
            $employee->media_id = $media->id;
            $employee->save(); // save media_id here
        }

        return response()->json([
            'status'=>true,
            'message'=>'updated successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    protected function permanentDelete($id){
        $trash = Employee::find($id);
        if (count($trash->getMedia('avatar')) > 0) {
            foreach ($trash->getMedia('avatar') as $media) {
                $media->delete();
            }
        }
        $trash->delete();
        return true;
    }

    protected function massPermanentDelete($ids){
        $employees = Employee::whereIn('id',$ids)
                        ->get();
        foreach ($employees as $employee) {
            $this->permanentDelete($employee->id);
        }
        return true;
    }

    public function destroy(Request $request,$id)
    {   
        $trash = $this->permanentDelete($id);
        if($trash){
            return response()->json([
                'status' => true,
                'message' => "Your Record has been Permanent Delete!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Something went wrong please try later!",
            'getDataUrl' => route($this->folder.'getData'),
        ]);
    }

    public function massDelete(Request $request){
        //this is for permanent delete all record
        $trash = $this->massPermanentDelete($request->ids);

        if($trash){
            return response()->json([
                'status' => true,
                'message' => "Your Record has been Permanent Delete!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Something went wrong please try later!",
            'getDataUrl' => route($this->folder.'getData'),
        ]);
    }
}