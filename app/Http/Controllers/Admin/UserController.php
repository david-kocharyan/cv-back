<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //Path To the View Folder
    const FOLDER = "admin.user";
    //Resource Title
    const TITLE = "User";
    //Resource Route
    const ROUTE = "/users";


    public function __construct()
    {
        $this->middleware('hasUser', ['only' => ['create','store']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::first();
        $title = self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . ".index", compact('title', 'route', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create " . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . ".create", compact('title', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "full_name" => "required",
            "dob" => "required",
            "phone_number" => "required",
            "email" => "required",
            "job" => "required",
            "image" => "required|max:5000",
            "cv" => "required",
            "site" => "required",
            "degree" => "required",
            "city" => "required",
            "story" => "required",
        ]);

        $user = new User;
        if ($request->image) {
            $img_name = Storage::disk('public')->put('user/', $request->image);
            $user->image = basename($img_name);
        }
        if ($request->cv) {
            $cv = Storage::disk('public')->put('cv/', $request->cv);
            $user->cv = basename($cv);
        }

        $user->full_name = $request->full_name;
        $user->dob = $request->dob;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->job = $request->job;
        $user->site = $request->site;
        $user->degree = $request->degree;
        $user->city = $request->city;
        $user->story = $request->story;
        $user->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Model\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Model\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = "Edit " . self::TITLE;
        $route = self::ROUTE;
        return view(self::FOLDER . ".edit", compact('title', 'route', "user"));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\User          $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "full_name" => "required",
            "dob" => "required",
            "phone_number" => "required",
            "email" => "required",
            "job" => "required",
            "image" => "max:5000",
            "site" => "required",
            "degree" => "required",
            "city" => "required",
            "story" => "required",
        ]);

        if ($request->image) {
            Storage::disk('public')->delete("user/$user->image");
            $img_name = Storage::disk('public')->put('user/', $request->image);
            $user->image = basename($img_name);
        }
        if ($request->cv) {
            Storage::disk('public')->delete("cv/$user->image");
            $cv = Storage::disk('public')->put('cv/', $request->cv);
            $user->cv = basename($cv);
        }

        $user->full_name = $request->full_name;
        $user->dob = $request->dob;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->job = $request->job;
        $user->site = $request->site;
        $user->degree = $request->degree;
        $user->city = $request->city;
        $user->story = $request->story;
        $user->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Model\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk('public')->delete("user/$user->image");
        Storage::disk('public')->delete("cv/$user->cv");
        User::destroy($user->id);

        return redirect(self::ROUTE);
    }
}
