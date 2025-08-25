<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["customers"] = Customer::whereStatus(1)->get();
        return view("admin.customers.customers", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isUpdate = $request->filled("id");

        $rules = [
            "name" => "required|string",
            "cnic" => $isUpdate
                ? "required|min:13|max:13|unique:customers,cnic," . $request->input('id')
                : "required|min:13|max:13|unique:customers,cnic",
            "guarantor_cnic" => "nullable|min:13|max:13"
        ];

        $validateData = $request->validate($rules);

        $data = $request->except("id");

        $customer = Customer::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        if ($customer) {
            return response()->json([
                "success" => true,
                "message" => "Customer created successfully.",
            ], 201);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Customer created failed.",
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::whereId($id)->whereStatus(1)->first();
        if ($customer) {
            return response()->json([
                "success" => true,
                "message" => "Customer Found.",
                "data" => $customer
            ], 201);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Customer not found.",
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer) {
            $customer->status = 0;
            $customer->save();
            return response()->json([
                "success" => true,
                "message" => "Customer Deleted.",
            ], 200);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Customer deletion failed.",
            ], 500);
        }
    }
}
