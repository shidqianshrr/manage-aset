<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesorisModel;
use App\Models\StatusModel;
use App\Exports\AksesorisExport;
use Maatwebsite\Excel\Facades\Excel;

class AksesorisController extends Controller
{
    public function index()
    {
        $data['page'] = 'Aksesoris';
        $data['aksesoris'] = AksesorisModel::paginate(10);
        return view('aksesoris.index')->with($data);
    }

    public function create()
    {
        $data['page'] = 'Aksesoris';
        $data['detail'] = 'Create';
        $data['aksesoris'] = AksesorisModel::get();
        $data['status'] = StatusModel::get();
        return view('aksesoris.create')->with($data);
    }

    public function store(Request $request)
    {
        $aksesoris = new AksesorisModel();
        $aksesoris->name = $request->name;
        $aksesoris->model = $request->model;
        $aksesoris->panjang = $request->panjang;
        $aksesoris->lebar = $request->lebar;
        $aksesoris->tinggi = $request->tinggi;
        $aksesoris->berat = $request->berat;
        $aksesoris->info = $request->info;
        $aksesoris->harga = $request->harga;
        $aksesoris->status_id = $request->status_id;
        $aksesoris->description = $request->description;

        $image = $request->file('image');

            $imagename = date('Y-m-d')."_".$image->getClientOriginalName();
            $path = "files/aksesoris/images";
            $image->move($path, $imagename);

            $aksesoris->image = $imagename;
            $aksesoris->save();

        try {
            $aksesoris->save();
            if ($aksesoris->save()) {
                return redirect('aksesoris');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function edit($id)
    {
        {
            $data['page'] = 'Aksesoris';
            $data['detail'] = 'Edit';
            $data['aksesoris'] = AksesorisModel::where('id', $id)->first();
            $data['status'] = StatusModel::get();
            return view('aksesoris.edit')->with($data);
        }
    }

    public function update(Request $request, $id)
    {
        $aksesoris = AksesorisModel::where('id', $id)->first();
        $aksesoris->name = $request->name;
        $aksesoris->model = $request->model;
        $aksesoris->panjang = $request->panjang;
        $aksesoris->lebar = $request->lebar;
        $aksesoris->tinggi = $request->tinggi;
        $aksesoris->berat = $request->berat;
        $aksesoris->info = $request->info;
        $aksesoris->harga = $request->harga;
        $aksesoris->status_id = $request->status_id;
        $aksesoris->description = $request->description;

        if ($request->hasFile('image')){

            $image = $request->file('image');
    
            $imagename = date('Y-m-d ')."_".$image->getClientOriginalName();
            $path = "files/aksesoris/images";
            $image->move($path, $imagename);
            $aksesoris->image = $request = $imagename;
            $aksesoris->update();
    
            }

        try {
            $aksesoris->save();
            if ($aksesoris->save()) {
                return redirect('aksesoris');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function destroy($id)
    {
        $aksesoris = AksesorisModel::where('id', $id);
        try {
            $aksesoris->delete();
            return redirect('aksesoris');
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function admin()
    {
        $data['page'] = 'Aksesoris';
        $data['app'] = 'Admin';
        $data['aksesoris'] = AksesorisModel::paginate(10);
        return view('admin.aksesoris.index')->with($data);
    }

    public function export_excel()
	{
		return Excel::download(new AksesorisExport, 'aksesoris.xlsx');
	}
}
