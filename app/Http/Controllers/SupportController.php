<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;
use App\Models\Support;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Support::orderBy('created_at', 'desc')->paginate(10);

        $total = Support::all()->count();

        return response()->view('support.index', compact('tickets', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('support.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupportRequest $request)
    {
        $support = new Support();
        $support->subject = $request->subject;
        $support->message = $request->message;
        $support->status = 'open';
        $support->save();

        return response()->json([
            'support' => $support,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        return response()->view('support.show', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        $support->status = 'read';
        $support->save();

        return response()->view('support.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupportRequest  $request
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupportRequest $request, Support $support)
    {
        $support->status = $request->status;
        $support->priority = $request->priority;
        $support->assigned_to = $request->assigned_to;
        $support->closed_by = $request->closed_by;
        $support->closed_at = $request->closed_at;
        $support->reopened_by = $request->reopened_by;
        $support->reopened_at = $request->reopened_at;
        $support->reopened_reason = $request->reopened_reason;
        $support->reopened_message = $request->reopened_message;
        $support->save();

        return response()->json([
            'support' => $support,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        $support->delete();

        return response()->json([
            'support' => $support,
        ], 200);
    }
}
