<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Quote;
use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = QuoteRequest::orderBy('created_at', 'desc')->get();

        // $total = Quote::count();

        return response()->json([
            'quotes' => $quotes,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('quotations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuoteRequest $request)
    {
        $is_dropoff = 'yes';
        $service = Service::where('name', $request->serviceCategory)->first();

        if ($request->isRequestingCollection == 'Yes') {
            $is_dropoff = 'no';
            // $request->validate([
            //     'pickup' => 'required',
            //     'pickup_date' => 'required',
            //     'pickup_time' => 'required',
            // ]);
        }

        $quote = QuoteRequest::create([
            'user_id' => $request->user_id,
            'device' => $request->deviceType,
            'service_id' => $service->id,
            'description' => $request->serviceDescription,
            'make' => $request->laptopMake,
            'model' => $request->laptopModel,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'is_collection' => $request->is_collection,
            'is_dropoff' => $is_dropoff,
            'status' => 'pending',
            'pickup' => $request->pickup,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'is_collection' => $request->isRequestingCollection,
        ]);

        return response()->json([
            'quote' => $quote,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $quote = QuoteRequest::find($request->route('quote'));
        return response()->json([
            'quote' => $quote,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuoteRequest  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }

    public function formData()
    {
        $services = Service::all();
        $branches = Branch::all();

        return response()->json([
            'services' => $services,
            'branches' => $branches,
        ]);

        return response()->json([
            'categories' => Category::all(),
        ], 200);
    }
}
