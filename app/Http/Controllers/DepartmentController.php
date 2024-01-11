<?php

namespace App\Http\Controllers;

use App\Models\CompanyDepartment;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function departmentDelete($id){
        $departmentDelete = CompanyDepartment::find($id)->delete();
        if($departmentDelete){
            return response()->json(['status' => true, 'massage' => 'Data deleted successfull.']);
        }else{
            return response()->json(['status' => false, 'massage' => 'Somthing went wrong.']);
        }
    }
}
