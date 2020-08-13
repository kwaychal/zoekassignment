<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::select('id','name','email','logo','website','created_at')
                                ->orderBy('created_at','desc')
                                ->paginate(10);
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->all();
        if(isset($data['logo'])){
            $request->file('logo')->store('public');
            $data['logo'] = $request->logo->hashName();
        }
        $company = Company::create($data);

        $signal = $company ? "success" : "error";
        $message = $company ? "Company added successfully." : "Fail to add company.";
        $request->session()->flash('notify', ["signal" => $signal, "message" => $message]);

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.index',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->all();
        if(isset($data['logo'])){
            $path = $request->file('logo')->store('public');
            if($path){
                Storage::delete("public/".$company->logo);
                $data['logo'] = $request->logo->hashName();
            }
        }

        $company = $company->update($data);

        $signal = $company ? "success" : "error";
        $message = $company ? "Company updated successfully." : "Fail to update company.";
        $request->session()->flash('notify', ["signal" => $signal, "message" => $message]);

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
