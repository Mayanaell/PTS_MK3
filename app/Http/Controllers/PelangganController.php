<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();

        return response()->json([
            'status' => 200,
            'message' => 'Pelanggan retrieved successfully.',
            'data' => $pelanggans
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fullname' => 'required|string',
            'email' => 'required|string',
            'nomor_telepon' => 'required|string'
        ]);

        $pelanggan = Pelanggan::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Pelanggan created successfully.',
            'data' => $pelanggan
        ], 201);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'status' => 404,
                'message' => 'Pelanggan not found.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Pelanggan retrieved successfully.',
            'data' => $pelanggan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
            ], 404);
        }

        $request->validate([
            'Fullname' => 'required|string',
            'email' => 'required|string',
            'nomor_telepon' => 'required|string'
        ]);

        $pelanggan->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Pelanggan updated successfully.',
            'data' => $pelanggan
        ], 200);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'status' => 404,
                'message' => 'Pelanggan not found.',
            ], 404);
        }

        $pelanggan->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Pelanggan deleted successfully.',
        ], 200);
    }
}
