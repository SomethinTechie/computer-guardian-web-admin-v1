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
use Illuminate\Support\Facades\Auth;
use App\Models\Repair;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->get('user_id');

        $quotes = QuoteRequest::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->with('service')
            ->get();

        if ($quotes->isEmpty()) {
            return response()->json(['message' => 'No quotes found for this user.'], 404);
        }

        // $total = Quote::count();

        return response()->json([
            'quotes' => $quotes,
        ], 200);
    }

    public function adminIndex()
    {

        $quotes = QuoteRequest::orderBy('created_at', 'desc')
            ->with('user', 'service')
            ->get();

        $total = QuoteRequest::count();

        return response()->view('quotations.index', compact('quotes', 'total'));
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
        $is_dropoff = $request->isRequestingCollection === 'Yes' ? 'no' : 'yes';

        $service = Service::where('name', $request->serviceCategory)->first();

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $quote = new QuoteRequest();
        $quote->service_id = $service->id;
        $quote->is_dropoff = $is_dropoff;

        $quote->fill($request->validated());

        $quote->save();

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
        $quote->load('service');

        return response()->json([
            'quote' => $quote,
        ], 200);
    }

    public function adminShow(Request $request)
    {
        $quote = QuoteRequest::find($request->route('quote'));
        return response()->view('quotations.show', compact('quote'));
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
        $user_id = $request->get('user_id');

        $services = Service::all();
        $branches = Branch::all();
        $tickets = Support::where('id', $user_id)->first();

        return response()->json([
            'services' => $services,
            'branches' => $branches,
            'tickets' => $titckets,
        ]);

        return response()->json([
            'categories' => Category::all(),
        ], 200);
    }

    public function approveModal(Request $request)
    {
        $quote = QuoteRequest::find($request->route('quote'));
        return response()->view('quotations.modals.approve', compact('quote'));
    }

    public function approve(Request $request)
    {
        $quote = QuoteRequest::find($request->route('quote'));
        $quote->status = 'Booked';
        $quote->save();

        //create new repair
        $repair = Repair::create([
            'user_id' => $quote->user_id,
            'quote_request_id' => $quote->id,
            'status' => 'Booked',
            'description' => $quote->description,
        ]);

        $quote = QuoteRequest::find($request->route('quote'));
        return response()->view('quotations.show', compact('quote'));

    }
}
