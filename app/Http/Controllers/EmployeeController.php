<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        
        return view('home', [
            'employees' => Employee::paginate(10),
            'companies' => Company::limit(5)->get(),
            'user' => Auth::user()
        ]);
    }

    public function create(Employee $employee)
    {
        return view('employee.update',[
            'employee' => $employee->load('company')
        ]);
    }

    public function update(EmployeeRequest $request,Employee $employee)
    {
        
        $employee->update($request->except('_token'));

        return redirect('/home');
    }

    public function show()
    {

        return view('employee.create', [
            'companies' => Company::get()
        ]);
    }

    public function store(EmployeeRequest $request)
    {
        Employee::create($request->except(['_token']));
        return redirect('/home');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/home');
    }
}
