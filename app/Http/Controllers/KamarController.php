<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = kamar::all();

        return response()->json([
            'status' => 200,
            'message' => 'Kamar retrieved successfully.',
            'data' => $kamar
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_nomor' => 'required|string',
            'tipe_kamar' => 'required|string',
            'status' => 'required',
        ]);

        $kamar = kamar::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Kamar created successfully.',
            'data' => $kamar
        ], 201);
    }

    public function show($id)
    {
        $kamar = kamar::find($id);

        if (!$kamar) {
            return response()->json([
                'status' => 404,
                'message' => 'Kamar not found.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Kamar retrieved successfully.',
            'data' => $kamar
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $kamar = kamar::find($id);

        if (!$kamar) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
            ], 404);
        }

        $request->validate([
            'room_nomor' => 'required|string',
            'tipe_kamar' => 'required|string',
            'status' => 'required|boolean'
        ]);

        $kamar->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Kamar updated successfully.',
            'data' => $kamar
        ], 200);
    }

    public function destroy($id)
    {
        $kamar = kamar::find($id);

        if (!$kamar) {
            return response()->json([
                'status' => 404,
                'message' => 'Kamar not found.',
            ], 404);
        }

        $kamar->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Kamar deleted successfully.',
        ], 200);
    }
}
