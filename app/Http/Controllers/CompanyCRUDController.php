<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    // Cerate Index
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', $data);
    }

    // Create resource  
    public function create()
    {
        return view('companies.create');
    }
}
