<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\QuoteRequest;

class CourierController extends Controller
{
    public function index()
    {
        //get api call
        $response = Http::withHeaders([
            'Authorization' => 'Bearer a601d99c75fc4c64b5a64288f97d52b4',
        ])->get('https://api.shiplogic.com/v2/shipments');

        $response = $response->json();

        $shipments = $response['shipments'];

        // return response()->json($shipments[0]);

        $total = count($shipments);

        return response()->view('courier.index', compact('shipments', 'total'));
    }

    public function create()
    {
        return view('courier.create');
    }

    public function store(Request $request)
    {

        $collection_address = ["ShippingAddress" => "Mall of africa"];
        $delivery_address = ["ShippingAddress" => "boulders shopping center"];

        //write api call to https: //api.shiplogic.com/v2/rates
        $response = Http::withHeaders([
            'Authorization' => 'Bearer' . 'a601d99c75fc4c64b5a64288f97d52b4',
        ])->post('https://api.shiplogic.com/v2/rates', [
            'Authorization' => 'Bearer ' . 'a601d99c75fc4c64b5a64288f97d52b4',
            'collection_address' => $collection_address,
            'delivery_address' => $delivery_address,
            'parcels' => [
                [
                    "type" => "laptop",
                    "submitted_length_cm" => 20,
                    "submitted_width_cm" => 30,
                    "submitted_height_cm" => 10,
                    "submitted_weight_kg" => 2,
                ],
            ],
        ]);

        $response = $response->json();

        return response()->json($response);

        // Courier::create($request->all());

        // return redirect()->route('courier.index')
        //     ->with('success', 'Courier created successfully.');
    }

    public function show(Courier $courier)
    {
        return view('courier.show', compact('courier'));
    }

    public function edit(Courier $courier)
    {
        return view('courier.edit', compact('courier'));
    }

    public function update(Request $request, Courier $courier)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'status' => 'required',
        ]);

        $courier->update($request->all());

        return redirect()->route('courier.index')
            ->with('success', 'Courier updated successfully');
    }

    public function destroy(Courier $courier)
    {
        $courier->delete();

        return redirect()->route('courier.index')
            ->with('success', 'Courier deleted successfully');
    }

    public function createCollection()
    {
        $quotes = QuoteRequest::all();

        return response()->view('courier.collection', compact('quotes'));
    }

    public function createDelivery()
    {
        $quotes = QuoteRequest::all();

        return response()->view('courier.delivery', compact('quotes'));
    }

    public function courierCollectionStore()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer a601d99c75fc4c64b5a64288f97d52b4',
        ])->get('https://api.shiplogic.com/v2/collections');

        $response = $response->json();

        $collections = $response['collections'];

        $total = count($collections);

        return response()->view('courier.collection', compact('collections', 'total'));
    }

    public function courierDeliveryStore()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer a601d99c75fc4c64b5a64288f97d52b4',
        ])->get('https://api.shiplogic.com/v2/deliveries');

        $response = $response->json();

        $deliveries = $response['deliveries'];

        $total = count($deliveries);

        return response()->view('courier.delivery', compact('deliveries', 'total'));
    }
}
