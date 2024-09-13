<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        $total = $banners->count();
        return response()->view('banners.index', compact('banners','total'));
    }


    public function api_index()
    {
        $banners = Banner::all();
        $total = $banners->count();
        return response()->json($banners, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $bannerData = $request->validated();
        
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->storeAs('', $originalName, 'banners_uploads');

            $bannerData['image'] = $originalName;
        }

        $banner = Banner::create($bannerData);

        return response()->json(['message' => 'Banner successfully created', 'banner' => $banner], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return response()->view('banners.show', compact($banner));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $banner = Banner::update($request->validated());
        return response()->view('banners.success');
    }

    public function deleteModal(Banner $banner)
    {
        return response()->view('banners.delete-modal', compact('banner'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        $message = 'Banner successfully deleted';
        return response()->view('banners.success', compact('message'));
    }
}
