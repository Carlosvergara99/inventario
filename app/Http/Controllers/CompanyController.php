<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
       $asset = DB::table('company_assets as ca')
           ->join('employees as e', 'ca.employees_id', '=', 'e.id')
           ->selct('ca.*','e.name');
      return view('company.index',compact('asset'));
    }
    

    public function save(Request $request)
    {
    
        foreach ($request->employees as $key => $value) {
            $company_assets::table('company_assets')
            ->insertGetId([
                'serial_code' => $request->serial_code,
                'trademark' => $request->trademark,
                'refernece'=>$request->refernece,
                'description'=>$request->description,
                'employees_id'=>$value
            ]);
            DB::table('logs')->insert([
                'employees_id' => $value,
                'company_assets_id' => $company_assets,
                'payload'=>json_decode($employees),
                'assigner'=>'Carlos Vergara'
            ]);

        }
    }

    public function edii(Request $request)
    {
        $company_assets= DB::table('company_assets')
        ->where('id', $request->id)   
        ->join('employees as e', 'ca.employees_id', '=', 'e.id')
        ->selct('ca.*','e.name')
        ->first(); 

        return response()->json([
            'data' => $company_assets,
            'status' => 200
        ]);
    }

    public function update(Request $request)
    {
        $company_assets= DB::table('company_assets')
        ->where('id', $request->id)
        ->delete(); 
        $this->save($request);        
    }
}
