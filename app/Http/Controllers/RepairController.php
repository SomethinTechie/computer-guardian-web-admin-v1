<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepairRequest;
use App\Http\Requests\UpdateRepairRequest;
use App\Models\Repair;
use Illuminate\Http\Request;


class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return response()->json($request->get('status'));
        $status = $request->get('status');
        $repairs = Repair::with('quoteRequest','user')
        ->where('status', $status)
        ->get();

        $total = Repair::where('status', $status)->count();

        return response()->view('repairs.index', compact('repairs', 'total','status'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_index($user_id)
    {
        $repairs = Repair::where('user_id', $user_id)->get();

        return response()->json(['repairs' => $repairs], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepairRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepairRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepairRequest  $request
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        //
    }

    public function statuses(Repair $repair)
    {
        return response()->view('repairs.modals.statuses', compact('repair'));
    }

    public function updateStatus(Repair $repair,Request $request)
    {
        $status = $request->get('status');

        $repair->status = $status;

        $repair->save();

        return response()->view('repairs.modals.statuses', compact('repair'));
    }
}
