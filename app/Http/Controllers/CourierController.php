<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class CourierController extends Controller
{
    public function index()
    {
        //get api call
        $response = Http::withHeaders([
            'Authorization' => 'Bearer 195d2241d62c4298acde720341b6632f',
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
        // $collection_address = ["ShippingAddress" => "Mall of africa"];
        // $delivery_address = ["ShippingAddress" => "boulders shopping center"];

        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer 195d2241d62c4298acde720341b6632f',
        // ])->post('https://api.shiplogic.com/v2/rates', [
        //     'collection_address' => $collection_address,
        //     'delivery_address' => $delivery_address,
        //     'parcels' => [
        //         [
        //             "type" => "laptop",
        //             "submitted_length_cm" => 20,
        //             "submitted_width_cm" => 30,
        //             "submitted_height_cm" => 10,
        //             "submitted_weight_kg" => 2,
        //         ],
        //     ],
        // ]);

        // $response = $response->json();

        // return response()->json($response);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer 195d2241d62c4298acde720341b6632f',
        ])->post('https://api.shiplogic.com/v2/shipments', [
            "collection_address" => [
                "type" => "business",
                "company" => "uAfrica.com",
                "street_address" => "116 Lois Avenue",
                "local_area" => "Menlyn",
                "city" => "Pretoria",
                "code" => "0181",
                "zone" => "Gauteng",
                "country" => "ZA",
                "lat" => -25.7863272,
                "lng" => 28.277583,
            ],
            "collection_contact" => [
                "name" => "Cornel Rautenbach",
                "mobile_number" => "",
                "email" => "cornel+sandy@uafrica.com",
            ],
            "delivery_address" => [
                "type" => "residential",
                "company" => "",
                "street_address" => "10 Midas Ave",
                "local_area" => "Olympus AH",
                "city" => "Pretoria",
                "code" => "0081",
                "zone" => "Gauteng",
                "country" => "ZA",
                "lat" => -25.80665579999999,
                "lng" => 28.334732,
            ],

            "delivery_contact" => [
                "name" => "",
                "mobile_number" => "",
                "email" => "cornel+sandyreceiver@uafrica.com",
            ],

            "parcels" => [
                [
                    "parcel_description" => "Standard flyer",
                    "submitted_length_cm" => 20,
                    "submitted_width_cm" => 20,
                    "submitted_height_cm" => 10,
                    "submitted_weight_kg" => 2,
                ],
            ],
            "opt_in_rates" => [],
            "opt_in_time_based_rates" => [
                76,
            ],
            "special_instructions_collection" => "This is a test shipment - DO NOT COLLECT",
            "special_instructions_delivery" => "This is a test shipment - DO NOT DELIVER",
            "declared_value" => 1100,
            "collection_min_date" => "2021-05-21T00:00:00.000Z",
            "collection_after" => "08:00",
            "collection_before" => "16:00",
            "delivery_min_date" => "2021-05-21T00:00:00.000Z",
            "delivery_after" => "10:00",
            "delivery_before" => "17:00",
            "custom_tracking_reference" => "",
            "customer_reference" => "ORDERNO123",
            "service_level_code" => "ECO",
            "mute_notifications" => false,
        ]);

        $response = $response->json();

        return response()->json($response);

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

    public function qrCode(Repair $repair)
    {
        $qrCode = QrCode::create('https://app.computerguardian.co.za/qr-code/' . $repair->id . '/repair')
            ->setSize(300)
            ->setMargin(10)
            ->setEncoding(new Encoding('UTF-8'));

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $dataUri = $result->getDataUri();

        return response()->view('qr-code', compact('dataUri'));
    }

    public function qrCodeRepair(Repair $repair)
    {
        $repair->load('user','quoteRequest');
        return response()->view('repairs.qr-code-repair', compact('repair'));
    }
}
