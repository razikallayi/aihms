<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Validator;

class DepartmentController extends Controller
{
    // index page

	public function index()
	{
		return view('admin.department.add-department');
	}

	// add

	public function add(Request $request)
	{
		$this->validate($request,[
			'name' =>'required',
			]);
		Department::saveDepartment($request);
		return back();
	}

	// manage

	public function manage()
	{
		$result = Department::getDepartment();
		return view('admin.department.manage-department',['departments'=>$result]);
	}

	// edit

	public function edit($id=null)
	{
		$result = Department::getDepartment($id);
		return view('admin.department.edit-department',['department'=>$result]);
	}

	// update

	public function update(Request $request)
	{
		$this->validate($request,[
			'name' =>'required',
			]);
		Department::updateDepartment($request);
		return back();
	}


	// delete 


	public  function delete($id)
	{
		Department::deleteDepartment($id);
		return back();
	}

}
