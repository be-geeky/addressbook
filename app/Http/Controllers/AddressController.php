<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\AddressStoreRequest;
use App\Http\Resources\AddressResource;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AddressResource::collection(Address::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddressStoreRequest $request
     * @return AddressResource
     */
    public function store(AddressStoreRequest $request)
    {
        $address = new Address();
        $address->add($request);
        return new AddressResource($address->add($request));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AddressStoreRequest $request
     * @param Address $address
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddressStoreRequest $request, Address $address)
    {
        $address->update(
            $request->only(
                [
                    'title',
                    'address_line_1',
                    'address_line_2',
                    'address_line_3',
                    'pincode',
                    'city',
                    'state',
                    'country',
                    'type'
                ]
            )
        );

        return new AddressResource($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json('', 204);
    }
}
