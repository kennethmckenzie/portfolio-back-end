<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\GeneralSettings;
use App\Models\Companies;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
        $general = GeneralSettings::first();
        return view('companies.index')
            ->with('companies', $companies)
            ->with('general', $general);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $general = GeneralSettings::first();
        return view('companies.create')->with('general', $general);
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
            'company' => 'required',
            'url' => 'required',
            'bio' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/site_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $company = new Companies;
        $company->company_name = $request->input('company');
        $company->company_url = $request->input('url');
        $company->company_bio = $request->input('bio');

        $company->company_logo = $fileNameToStore;
        $company->save();

        return redirect('/companies')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Companies::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $general = GeneralSettings::first();
        $companies = Companies::find($id);
        return view('companies.edit')
            ->with('companies', $companies)
            ->with('general', $general);
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
            'company' => 'required',
            'url' => 'required',
            'bio' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/site_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $company = Companies::find($id);
        $company->company_name = $request->input('company');
        $company->company_url = $request->input('url');
        $company->company_bio = $request->input('bio');


        if ($request->hasFile('image')) {
            $company->company_logo = $fileNameToStore;
        }
        $company->save();

        return redirect('/companies')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companies::find($id);

        if ($company->company_logo != 'noimage.jpg') {
            Storage::delete('public/site_images/' . $company->company_logo);
        }

        $company->delete();
        return redirect('/companies')->with('success', 'Post Deleted');
    }
}
