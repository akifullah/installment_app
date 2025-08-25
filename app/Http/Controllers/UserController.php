<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["users"] = User::whereStatus(1)->get();
        return view("admin.users.users", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.users.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Determine if this is an update or create
        $isUpdate = $request->filled('id');

        // Validation rules
        $rules = [
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => [
                'required',
                'string',
                'max:255',
                $isUpdate
                    ? 'unique:users,phone,' . $request->input('id')
                    : 'unique:users,phone'
            ],
            'email'    => ['nullable', 'email', 'max:255'],
            'role'     => ['required', 'in:admin,salesman,accountant'],
        ];

        // Password is required for create, optional for update
        if ($isUpdate) {
            $rules['password'] = ['nullable', 'string', 'min:6'];
        } else {
            $rules['password'] = ['required', 'string', 'min:6'];
        }

        $data = $request->validate($rules);

        // Hash the password if it's present and not empty
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // If password is not being updated, remove it from $data so it doesn't overwrite with null
            unset($data['password']);
        }

        $user = User::updateOrCreate(
            ['id' => $request->input('id')], // if 'id' is present, update; else create
            $data
        );

        return response()->json([
            'message' => 'User created successfully.',
            'user'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'phone'  => $user->phone,
                'email' => $user->email,
                'role'  => $user->role,
            ],
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->where('status', 1)->first();

        if (!$user) {
            return response()->json([
                "success" => false,
                'message' => 'User not found or inactive.'
            ], 404);
        }

        return response()->json([
            "success" => true,
            "data" => [
                'id'    => $user->id,
                'name'  => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
                'role'  => $user->role,
                'status' => $user->status,
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        return response()->json([
            "success" => true
        ], 200);
    }
}
