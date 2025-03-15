<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    // Cerate Index
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(5);
        return view('companies.index', $data);
    }

    // Create resource  
    public function create()
    {
        return view('companies.create');
    }

    // Store resource
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'company has been created successfully');
        }
}
