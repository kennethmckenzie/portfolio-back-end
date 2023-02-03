<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\GeneralSettings;

class GeneralSettingsController extends Controller
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
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $general = GeneralSettings::find($id);
        return view('general.edit')->with('general', $general);
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
            'name' => 'nullable',
            'email_address' => 'nullable',
            'cv' => 'nullable|max:1999',
            'linkedin_url' => 'nullable',
            'primary_color' => 'nullable',
            'secondary_color' => 'nullable',
            'third_color' => 'nullable',
            'main_font' => 'nullable',
            'secondary_font' => 'nullable',
        ]);

        if ($request->hasFile('cv')) {
            $filenameWithExt = $request->file('cv')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cv')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('cv')->storeAs('public/site_images', $fileNameToStore);
        }

        $general = GeneralSettings::find($id);
        $general->name = $request->input('name');
        $general->email_address = $request->input('email_address');
        $general->linkedin_url = $request->input('linkedin_url');
        $general->primary_color = $request->input('primary_color');
        $general->secondary_color = $request->input('secondary_color');
        $general->third_color = $request->input('third_color');
        $general->main_font = $request->input('main_font');
        $general->secondary_font = $request->input('secondary_font');
        if ($request->hasFile('cv')) {
            $general->cv = $fileNameToStore;
        }
        $general->save();

        return redirect('/general-settings/1/edit')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
