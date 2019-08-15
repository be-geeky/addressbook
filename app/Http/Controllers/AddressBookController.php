<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::latest()->paginate(5);
        return view('address.index',compact('addresses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = config('address.types');
        $countries = DB::table("countries")->pluck("name","id");
        return view('address.create',compact('address','types','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->add($request);
        return redirect('/addresses')->with('success', 'Address is successfully saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $types = config('address.types');
        $countries = DB::table("countries")->pluck("name","id");
        return view('address.edit',compact('address','types','countries'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Address $address
     */
    public function update(Request $request, Address $address)
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
        return back()->with('success','Address updated successfully');;
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
        return response()->json(null, 204);
    }
}
