<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\GeneralSettings;
use App\Models\Sites;

class ApiSitesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sites = Sites::all();
        // $general = GeneralSettings::first();
        // return view('sites.index')
        //     ->with('sites', $sites)
        //     ->with('general', $general);

        return Sites::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $general = GeneralSettings::first();
        // return view('sites.create')->with('general', $general);
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

        // Functionality for updating through api.

        // $request->validate([
        //     'site_name' => 'nullable',
        //     'site_url' => 'nullable',
        //     'site_bio' => 'nullable',
        //     'site_logo' => 'nullable'
        // ]);

        // Sites::create($request->all());
        // return 'Site Added!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Sites::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        abort(404);

        // Functionality for updating through api.

        // $site = Sites::find($id);
        // $request->validate([
        //     'site_name' => 'nullable',
        //     'site_url' => 'nullable',
        //     'site_bio' => 'nullable',
        //     'site_logo' => 'nullable|max:1999'
        // ]);
        // $site->update($request->all());
        // return $site;
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

        // Functionality for updating through api.

        // $site = Sites::find($id);

        // if ($site->site_logo != 'noimage.jpg') {
        //     Storage::delete('public/site_images/' . $site->site_logo);
        // }

        // $site->delete();
        // return 'SITE DELETED!';
    }
}
