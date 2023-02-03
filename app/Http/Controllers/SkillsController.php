<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Skills;
use App\Models\GeneralSettings;


class SkillsController extends Controller
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
        $skills = Skills::all();
        $general = GeneralSettings::first();
        return view('skills.index')
            ->with('skills', $skills)
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
        return view('skills.create')->with('general', $general);
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
            'skill' => 'required',
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

        $skill = new Skills;
        $skill->skill_name = $request->input('skill');
        $skill->skill_image = $fileNameToStore;
        $skill->save();

        return redirect('/skills')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Skills::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skills::find($id);
        $general = GeneralSettings::first();
        return view('skills.edit')
            ->with('skill', $skill)
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
            'skill' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/site_images', $fileNameToStore);
        }

        $skill = Skills::find($id);
        $skill->skill_name = $request->input('skill');
        if ($request->hasFile('image')) {
            $skill->skill_image = $fileNameToStore;
        }
        $skill->save();

        return redirect('/skills')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skills::find($id);

        if ($skill->skill_image != 'noimage.jpg') {
            Storage::delete('public/site_images/' . $skill->skill_image);
        }

        $skill->delete();
        return redirect('/skills')->with('success', 'Post Deleted');
    }
}
