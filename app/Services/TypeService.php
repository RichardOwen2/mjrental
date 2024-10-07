<?php

namespace App\Services;

use App\Models\Type;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class TypeService.
 */
class TypeService
{
    public static function getAllTypes()
    {
        return Type::all();
    }

    public static function getTypeById($id)
    {
        return Type::findOrFail($id);
    }

    public static function getTypeByName($name)
    {
        return Type::where('name', $name)->first();
    }

    public static function store($name)
    {
        return Type::create([
            'name' => $name,
        ]);
    }

    public static function update($id, $name)
    {
        $type = Type::findOrFail($id);

        $type->update([
            'name' => $name,
        ]);

        return $type;
    }

    public static function delete($id)
    {
        $type = Type::findOrFail($id);

        if ($type->products()->exists()) {
            throw new HttpException(400, 'Tidak bisa menghapus tipe yang memiliki produk');
        }

        $type->delete();
    }

    public static function getDataTable()
    {
        $query = Type::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('product_count', function ($query) {
                return $query->products()->count() . " Produk";
            })
            ->addColumn('action', function ($query) {
                return view('pages.admin.type.menu', compact('query'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
