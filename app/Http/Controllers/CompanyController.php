<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{

    public function index()
    {
       $asset = DB::table('company_assets as ca')
           ->join('employees as e', 'ca.employees_id', '=', 'e.id')
           ->where('ca.status',1)
           ->select('ca.*','e.name')
           ->get();
        $asset = $asset->unique('serial_code');
        $employees =  DB::table('employees')->get();    
      return view('company.index',compact('asset','employees'));
    }
    

    public function save(Request $request)
    {
    
        foreach ($request->employees as $key => $value) {
            $company_assets=DB::table('company_assets')
            ->insertGetId([
                'serial_code' => $request->serial_code,
                'trademark' => $request->trademark,
                'refernece'=>$request->refernece,
                'description'=>$request->description,
                'employees_id'=>$value,
                'status'=>1
            ]);
            DB::table('logs')->insert([
                'employees_id' => $value,
                'company_assets_id' => $company_assets,
                'payload'=>json_encode($request->employees),
                'assigner'=>'Carlos Vergara'
            ]);

        }
    }

    public function edit(Request $request)
    {
        $company_assets= DB::table('company_assets')
        ->where('serial_code','like', $request->serial_code)
        ->where('status',1)    
        ->first(); 


        $employees = DB::table('company_assets')
        ->where('serial_code','like', $request->serial_code)  
        ->where('status',1) 
        ->select('employees_id')
        ->get();

        return response()->json([
            'data' => $company_assets,
            'employees'=>$employees,
            'status' => 200
        ]);
    }

    public function update(Request $request)
    {
        $company_assets= DB::table('company_assets')
        ->where('serial_code','like', $request->serial_code)
        ->update(['status'=> 0]); 

        foreach ($request->employees as $key => $value) {
            $data= DB::table('company_assets')
            ->where('serial_code','like', $request->serial_code)
            ->where('employees_id',$value )
            ->exists();

            if($data){
                $data= DB::table('company_assets')
                ->where('serial_code','like', $request->serial_code)
                ->where('employees_id',$value )
                ->update([
                    'trademark' => $request->trademark,
                    'refernece'=>$request->refernece,
                    'description'=>$request->description,
                    'status'=>1
                ]); 
            }else{
                $company_assets=DB::table('company_assets')
                ->insertGetId([
                    'serial_code' => $request->serial_code,
                    'trademark' => $request->trademark,
                    'refernece'=>$request->refernece,
                    'description'=>$request->description,
                    'employees_id'=>$value,
                    'status'=>1
                ]);
                DB::table('logs')->insert([
                    'employees_id' => $value,
                    'company_assets_id' => $company_assets,
                    'payload'=>json_encode($request->employees),
                    'assigner'=>'Carlos Vergara'
                ]);
            }

          
        }
    }
}
