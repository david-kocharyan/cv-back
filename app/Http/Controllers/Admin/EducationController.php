<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //Path To the View Folder
    const FOLDER = "admin.educations";
    //Resource Title
    const TITLE = "Educations";
    //Resource Route
    const ROUTE = "/educations";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Education::all();
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
            "profession" => "required",
            "university" => "required",
            "description" => "required",
            "start" => "required",
            "end" => "",
        ]);

        $work = new Education;
        $work->profession = $request->profession;
        $work->university = $request->university;
        $work->description = $request->description;
        $work->start = $request->start;
        $work->end = $request->end;
        $work->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        $title = self::TITLE;
        $route = self::ROUTE;
        $action = "Edit";
        return view(self::FOLDER . ".Edit", compact('title', 'route', 'action', "education"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            "profession" => "required",
            "university" => "required",
            "description" => "required",
            "start" => "required",
            "end" => "",
        ]);

        $education->profession = $request->profession;
        $education->university = $request->university;
        $education->description = $request->description;
        $education->start = $request->start;
        $education->end = $request->end;
        $education->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        Education::destroy($education->id);
        return redirect(self::ROUTE);
    }
}
