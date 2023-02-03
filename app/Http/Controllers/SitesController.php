<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\GeneralSettings;
use App\Models\Sites;

class SitesController extends Controller
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
        $sites = Sites::all();
        $general = GeneralSettings::first();
        return view('sites.index')
            ->with('sites', $sites)
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
        return view('sites.create')->with('general', $general);
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
            'site' => 'required',
            'url' => 'required',
            'bio' => 'required',
            'tag' => 'required',
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

        $site = new Sites;
        $site->site_name = $request->input('site');
        $site->site_url = $request->input('url');
        $site->site_bio = $request->input('bio');

        $array = $request->input('tag');
        $array = implode(',', $array);
        $site->tag = $array;

        $site->site_logo = $fileNameToStore;
        $site->save();

        return redirect('/sites')->with('success', 'Post Created');
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
        $general = GeneralSettings::first();
        $sites = Sites::find($id);
        return view('sites.edit')
            ->with('sites', $sites)
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
            'site' => 'required',
            'url' => 'required',
            'bio' => 'required',
            'tag' => 'required',
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

        $site = Sites::find($id);
        $site->site_name = $request->input('site');
        $site->site_url = $request->input('url');
        $site->site_bio = $request->input('bio');

        $array = $request->input('tag');
        $array = implode(',', $array);
        $site->tag = $array;

        if ($request->hasFile('image')) {
            $site->site_logo = $fileNameToStore;
        }
        $site->save();

        return redirect('/sites')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = Sites::find($id);

        if ($site->site_logo != 'noimage.jpg') {
            Storage::delete('public/site_images/' . $site->site_logo);
        }

        $site->delete();
        return redirect('/sites')->with('success', 'Post Deleted');
    }
}
