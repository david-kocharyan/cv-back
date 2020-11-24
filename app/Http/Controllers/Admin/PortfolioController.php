<?php

namespace App\Http\Controllers\Admin;

use App\helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Model\Portfolio;
use App\Model\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{

    //Path To the View Folder
    const FOLDER = "admin.portfolio";
    //Resource Title
    const TITLE = "Portfolio";
    //Resource Route
    const ROUTE = "/portfolio";

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Portfolio::all();
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
        $title = self::TITLE;
        $action = 'Create';
        $route = self::ROUTE;
        return view(self::FOLDER . ".create", compact('title', 'route', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'date' => 'required',
            'url' => 'required',
            'description' => 'required',
            'logo' => 'required',
        ]);


        $portfolio = new Portfolio;
        if ($request->logo) {
            $img_name = Storage::disk('public')->put('portfolio/', $request->logo);
            $portfolio->logo = basename($img_name);
        }

        $portfolio->name = $request->name;
        $portfolio->type = $request->type;
        $portfolio->date = $request->date;
        $portfolio->url = $request->url;
        $portfolio->description = $request->description;
        $portfolio->save();

        return redirect(self::ROUTE);
    }

    /**
     * Display the specified resource.
     * @param \App\Model\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Model\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $data = $portfolio;
        $title = self::TITLE;
        $action = 'Edit';
        $route = self::ROUTE;
        return view(self::FOLDER . ".edit", compact('title', 'route', 'action', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Portfolio     $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'date' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);


        if ($request->logo) {
            Storage::disk('public')->delete("portfolio/$portfolio->logo");
            $img_name = Storage::disk('public')->put('portfolio/', $request->logo);
            $portfolio->logo = basename($img_name);
        }

        $portfolio->name = $request->name;
        $portfolio->type = $request->type;
        $portfolio->date = $request->date;
        $portfolio->url = $request->url;
        $portfolio->description = $request->description;
        $portfolio->save();

        return redirect(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Model\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio = Portfolio::with('images')->where('id', $portfolio->id)->first();
        if (!empty($portfolio->images)) {
            foreach ($portfolio->images as $key) {
                Storage::disk('public')->delete("$key->image");
            }
        }

        Storage::disk('public')->delete("portfolio/$portfolio->logo");
        Portfolio::destroy($portfolio->id);

        return redirect(self::ROUTE);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getImages($id)
    {
        $data = PortfolioImage::where('project_id', $id)->get();
        $title = 'Project Images';
        $route = self::ROUTE . "/images/" . $id;
        return view(self::FOLDER . ".images", compact('title', 'route', 'data'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createImages(Request $request, $id)
    {
        $project = Portfolio::find($id);

        if ($request->images) {
            $image = FileUploadHelper::upload($request->images, ['*'], "/portfolio");
            $project->images()->createMany($image);
        }

        return redirect(self::ROUTE . "/images/" . $id);
    }

    /**
     * @param $id
     * @param $image_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteImage($id, $image_id)
    {
        $project_image = PortfolioImage::find($image_id);
        Storage::disk('public')->delete("$project_image->image");
        PortfolioImage::destroy($project_image->id);

        return redirect(self::ROUTE . "/images/" . $id);
    }
}
