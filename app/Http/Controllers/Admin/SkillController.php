<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{

    //Path To the View Folder
    const FOLDER = "admin.skills";
    //Resource Title
    const TITLE = "Skills";
    //Resource Route
    const ROUTE = "/skills";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Skill::all();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . ".index", compact('title', 'route', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = self::TITLE;
        $route = self::ROUTE;
        $action = "Create";
        return view(self::FOLDER . ".create", compact('title', 'route', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "logo" => "required"
        ]);

        $skill = new Skill;

        if ($request->logo) {
            $img_name = Storage::disk('public')->put('skills/', $request->logo);
            $skill->logo = basename($img_name);
        }

        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $title = self::TITLE;
        $route = self::ROUTE;
        $action = "Edit";
        return view(self::FOLDER . ".edit", compact('title', 'route', 'action', "skill"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        if ($request->logo) {
            $img_name = Storage::disk('public')->put('skills/', $request->logo);
            $skill->logo = basename($img_name);
        }

        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        Storage::disk('public')->delete("skills/$skill->logo");
        Skill::destroy($skill->id);
        return redirect(self::ROUTE);
    }
}
