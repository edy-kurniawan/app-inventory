<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;


use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //datatable
        if (request()->ajax()) {

            $data = Barang::orderBy('nama');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('sisa', function ($data) {
                    return $data->pemasukan - $data->pengeluaran;
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '
                    <a href="javascript:void(0)" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top" title="EDIT" onclick="edit(' . $data->id . ')"><i class="fas fa-edit"></i></a>
                    <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS" onclick="delete_data(' . $data->id . ')"><i class="fas fa-trash"></i></a>
                    ';

                    return $actionBtn;
                })
                ->rawColumns(['action', 'sisa'])
                ->make(true);
        }

        return view('barang.index', [
            'title'     => 'Data Barang'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'satuan'        => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        Barang::updateOrCreate(
            ['id' => $request->id],
            [
                'nama'          => $request->nama,
                'satuan'        => $request->satuan,
                'pemasukan'     => $request->pemasukan,
                'pengeluaran'   => $request->pengeluaran,
            ]
        );

        return response()->json(['status' => true]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::find($id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        return response()->json(['status' => true]);
    }
}
