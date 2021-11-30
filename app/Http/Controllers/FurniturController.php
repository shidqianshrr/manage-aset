<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FurniturModel;
use App\Models\StatusModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FurniturExport;

class FurniturController extends Controller
{
    public function index()
    {
        $data['page'] = 'Furnitur';
        $data['furnitur'] = FurniturModel::paginate(10);
        return view('furnitur.index')->with($data);
    }

    public function create()
    {
        $data['page'] = 'Furnitur';
        $data['furnitur'] = FurniturModel::get();
        $data['status'] = StatusModel::get();
        return view('furnitur.create')->with($data);
    }

    public function store(Request $request)
    {
        $furnitur = new FurniturModel();
        $furnitur->name = $request->name;
        $furnitur->model = $request->model;
        $furnitur->bahan = $request->bahan;
        $furnitur->berat = $request->berat;
        $furnitur->panjang = $request->panjang;
        $furnitur->lebar = $request->lebar;
        $furnitur->tinggi = $request->tinggi;
        $furnitur->harga = $request->harga;
        $furnitur->status_id = $request->status_id;
        $furnitur->description = $request->description;

        $image = $request->file('image');

            $imagename = date('Y-m-d')."_".$image->getClientOriginalName();
            $path = "files/furnitur/images";
            $image->move($path, $imagename);

            $furnitur->image = $imagename;
            $furnitur->save();

            try {
                $furnitur->save();
                if ($furnitur->save()) {
                    return redirect('furnitur');
                }
            } catch (Exception $e) {
                report($e);
                return false;
            }
    }

    public function edit($id)
    {
        $data['page'] = 'Furnitur';
        $data['furnitur'] = FurniturModel::where('id', $id)->first();
        $data['status'] = StatusModel::get();
        return view('furnitur.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $furnitur = FurniturModel::where('id', $id)->first();
        $furnitur->name = $request->name;
        $furnitur->model = $request->model;
        $furnitur->bahan = $request->bahan;
        $furnitur->berat = $request->berat;
        $furnitur->panjang = $request->lebar;
        $furnitur->tinggi = $request->tinggi;
        $furnitur->harga = $request->harga;
        $furnitur->status_id = $request->status_id;
        $furnitur->description = $request->description;

        if ($request->hasFile('image')){

            $image = $request->file('image');
    
            $imagename = date('Y-m-d ')."_".$image->getClientOriginalName();
            $path = "files/furnitur/images";
            $image->move($path, $imagename);
            $furnitur->image = $request = $imagename;
            $furnitur->update();
    
            }

        try {
            $furnitur->save();
            if ($furnitur->save()) {
                return redirect('furnitur');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function destroy($id)
    {
        $furnitur = FurniturModel::where('id', $id);
        try {
            $furnitur->delete();
            return redirect('furnitur');
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function admin()
    {
        $data['page'] = 'Furnitur';
        $data['app'] = 'Admin';
        $data['furnitur'] = FurniturModel::paginate(10);
        return view('admin.furnitur.index')->with($data);
    }

    public function export_excel()
	{
		return Excel::download(new FurniturExport, 'furnitur.xlsx');
	}
}
