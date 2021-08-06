<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = DB::table('companies')->paginate(10);
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'com_name' => 'required|string',
            'com_email' => 'required|email',
            'com_phone' => 'required|numeric',
            'com_logo' => 'required'
        ]);

        // handle image upload
        if ($request->hasFile('com_logo')) {
            // Get filename with extention
            $fileNameWithExtension = $request->file('com_logo')->getClientOriginalName();
            // Get just the file name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // Get just the file extension
            $extension = $request->file('com_logo')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('com_logo')->storeAs('public/Store logos and company profile images', $fileNameToStore);
        } else {
            // defaultImage
            $fileNameToStore = 'noImage.jpg';
        }
        

        // create a new company object
        $company = new Company;

        $company->name = $request->input('com_name');
        $company->email = $request->input('com_email');
        $company->telephone = $request->input('com_phone');
        $company->logo = $fileNameToStore;
        $company->save();

        return redirect('/companies')->with('success', 'Company details added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'edit_com_name' => 'string',
            'edit_com_email' => 'email',
            'edit_com_phone' => 'numeric',
            'edit_com_logo' => ''
        ]);

        $company = Company::find($id);

        // handle image upload
        if ($request->hasFile('edit_com_logo')) {
            // Get filename with extention
            $fileNameWithExtension = $request->file('edit_com_logo')->getClientOriginalName();
            // Get just the file name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // Get just the file extension
            $extension = $request->file('edit_com_logo')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('edit_com_logo')->storeAs('public/Store logos and company profile images', $fileNameToStore);
        }else{
            $fileNameToStore = $company->logo;
        }



        $company->name = $request->input('edit_com_name');
        $company->email = $request->input('edit_com_email');
        $company->telephone = $request->input('edit_com_phone');
        $company->logo = $fileNameToStore;
        $company->save();

        return redirect('/companies')->with('success', 'Company details modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        
        return redirect('/employees')->with('success', 'Employee details deleted successfully.');
    }
}
