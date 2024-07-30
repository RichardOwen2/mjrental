<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('pages.admin.type.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        TypeService::store($request->name);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipe berhasil ditambahkan',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
        ]);

        TypeService::update($request->id, $request->name);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipe berhasil diubah',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        TypeService::delete($request->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipe berhasil dihapus',
        ]);
    }

    public function table()
    {
        return TypeService::getDataTable();
    }
}
