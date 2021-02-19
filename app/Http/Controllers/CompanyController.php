<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.companylist', [
            'companies' => Company::paginate(10),
            'user' => Auth::user()
        ]);
    }

    public function create(Company $company)
    {
        return view('company.update', [
            'company' => $company,
        ]);
    }

    public function update(CompanyRequest $request,Company $company)
    {
        /*
            Methods can use for request 
            //guessExtension()
            //getMimeType()
            //store()
            //asStore()
            //storePublicly
            //move()
            //getClientOriginalName()
            //guessClientExtension()
            //getSize()
            //isValid

                $test = $request->file('imageUrl')->getMimeType();

        */
        $newImageName = time() . '-' . $request->logo->getClientOriginalName();
        // dd($newImageName);
        $request->logo->move(public_path('images'), $newImageName);

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $newImageName
            
            ]
        );
        return redirect('/company');
    }

    public function show()
    {
        return view('company.create');
    }


    public function store(CompanyRequest $request)
    {
        $newImageName = time() . '-' . $request->logo->getClientOriginalName();
        // dd($newImageName);
        $request->logo->move(public_path('images'), $newImageName);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $newImageName
        ]);

        return redirect('/company');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/company');
    }

}
