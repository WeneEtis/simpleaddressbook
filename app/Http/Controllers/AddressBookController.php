<?php

namespace App\Http\Controllers;

use App\AddressBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.addressbook.index')->with('address_books', AddressBook::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addressbook.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required'
        ]);

        $addressbook = new AddressBook;
        $addressbook->name = $request->name;
        $addressbook->address = $request->address;
        $addressbook->save();
        Session::flash('flash_message','Entry Successfully Added');
        return redirect()->back();
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
    public function edit($id)
    {
        //
        $addressbook = AddressBook::find($id);
        return view('admin.addressbook.edit')->with('address_books', $addressbook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $addressbook = AddressBook::find($id);
        //
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required'
        ]);

        $addressbook->name = $request->name;
        $addressbook->address = $request->address;

        $addressbook->save();
        Session::flash('flash_message','Entry Successfully Updated');

        return redirect()->route('addressbook');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $addressbook = AddressBook::where('id', $id)->first();
        $addressbook->forceDelete();
        Session::flash('flash_message','Entry Successfully Deleted');
        return redirect()->back();
    }
}
