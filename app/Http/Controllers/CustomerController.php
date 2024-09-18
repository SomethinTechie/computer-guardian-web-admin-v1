<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::orderBy('created_at', 'desc')
        ->where('role', 'Normal')
        ->paginate(10);

        $total = $customers->count();
        return response()->view('customers.index', compact('customers', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);


        $user = User::create($data);
        $user->customer_number = 'CG00' . $user->id;
        $user->save();


        return response()->json('user created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $customer = User::with('repairs')->where('id', $user_id)->first();

        return response()->view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        return response()->view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, User $customer)
    {
        $customer->update($request->validated());

        return response()->json('cutomer addited successfully');
    }

    public function deleteModal(User $customer)
    {
        return response()->view('customers.delete-modal', compact('customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        $customer->delete();
        
        $message = 'Customer deleted successfully';

        return response()->view('customers.success',compact('message'));
    }

   public function search(Request $request, $searchTerm)
    {
        // Perform the search query on the 'name' field using the route parameter
        $customers = User::where('name', 'like', '%' . $searchTerm . '%')->get();

        // Get the total count of results
        $total = $customers->count();

        // Return the results to the view
        return response()->view('customers.search-results', compact('customers', 'total'));
    }


}