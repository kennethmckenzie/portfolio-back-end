<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Skills;
use App\Models\GeneralSettings;


class ApiSkillsController extends Controller
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
        return Skills::all();
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

        // Functionality for updating through api.

        // $request->validate([
        //     'skill_name' => 'nullable',
        //     'skill_image' => 'nullable'
        // ]);

        // Skills::create($request->all());
        // return 'Skill Added!';
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

        // $skill = Skills::find($id);
        // $request->validate([
        //     'skill_name' => 'nullable',
        //     'skill_image' => 'nullable'
        // ]);
        // $skill->update($request->all());
        // return $skill;
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

        // $skill = Skills::find($id);

        // if ($skill->skill_image != 'noimage.jpg') {
        //     Storage::delete('public/site_images/' . $skill->skill_image);
        // }

        // $skill->delete();
        // return 'SKILL DELETED!';
    }
}
