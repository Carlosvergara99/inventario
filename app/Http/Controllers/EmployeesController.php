<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeesController extends Controller
{
  public function index()
  {
    $employess = DB::table('employees')->get();
    return view('employess.index',compact('employess'));

  }

  public function save(Request $request)
  {
    $employess = DB::table('employees')
                ->insert($request->except(['token']));

    return response()->json([
                    'data'=>'Registro Creado',
                    'status' => 200
                ]);

  }

  public function edit(Request $request)
  {
    $employess= DB::table('employees')
         ->where('id', $request->id)   
         ->first();

    return response()->json([
            'data' => $employess,
            'status' => 200
        ]);
  }

  public function update(Request $request)
  {
    $employess= DB::table('employees')
        ->where('id', $request->id)
        ->update($request->except(['token','id']));

    return response()->json([
            'data' => 'update employess',
            'status' => 200
        ]);
  }

}
