<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    //Path To the View Folder
    const FOLDER = "admin.works";
    //Resource Title
    const TITLE = "Work Experience";
    //Resource Route
    const ROUTE = "/works";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Work::all();
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
            "position" => "required",
            "company" => "required",
            "description" => "required",
            "start" => "required",
            "end" => "",
        ]);

        $work = new Work;
        $work->position = $request->position;
        $work->company = $request->company;
        $work->description = $request->description;
        $work->start = $request->start;
        $work->end = $request->end;
        $work->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $title = self::TITLE;
        $route = self::ROUTE;
        $action = "Edit";
        return view(self::FOLDER . ".Edit", compact('title', 'route', 'action', "work"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $request->validate([
            "position" => "required",
            "company" => "required",
            "description" => "required",
            "start" => "required",
            "end" => "",
        ]);

        $work->position = $request->position;
        $work->company = $request->company;
        $work->description = $request->description;
        $work->start = $request->start;
        $work->end = $request->end;
        $work->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        Work::destroy($work->id);
        return redirect(self::ROUTE);
    }
}
