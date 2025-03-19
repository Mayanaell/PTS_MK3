<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;

class pembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = pembayaran::all();

        return response()->json([
            'status' => 200,
            'message' => 'pembayaran retrieved successfully.',
            'data' => $pembayarans
        ], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'tipe_pembayaran' => 'required|string',
            'payment_date' => 'required|string',
            'total' => 'required|string'
        ]);

        $pembayaran = pembayaran::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'pembayaran created successfully.',
            'data' => $pembayaran
        ], 201);
    }

    public function show($id)
    {
        $pembayaran = pembayaran::find($id);

        if (!$pembayaran) {
            return response()->json([
                'status' => 404,
                'message' => 'pembayaran not found.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'pembayaran retrieved successfully.',
            'data' => $pembayaran
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pembayaran = pembayaran::find($id);

        if (!$pembayaran) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
            ], 404);
        }

        $request->validate([
            'tipe_pembayaran' => 'required|string',
            'payment_date' => 'required|string',
            'total' => 'required|string'
        ]);

        $pembayaran->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'pembayaran updated successfully.',
            'data' => $pembayaran
        ], 200);
    }

    public function destroy($id)
    {
        $pembayaran = pembayaran::find($id);

        if (!$pembayaran) {
            return response()->json([
                'status' => 404,
                'message' => 'pembayaran not found.',
            ], 404);
        }

        $pembayaran->delete();

        return response()->json([
            'status' => 200,
            'message' => 'pembayaran deleted successfully.',
        ], 200);
    }
}
