<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElektronikModel;
use App\Models\StatusModel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ElektronikExport;

class ElektronikController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    } */
    
    public function index()
    {
        $data['page'] = 'Elektronik';
        $data['elektronik'] = ElektronikModel::paginate(10);
        return view('elektronik.index')->with($data);
    }

    public function create()
    {
        $data['page'] = 'Elektronik';
        $data['elektronik'] = ElektronikModel::get();
        $data['status'] = StatusModel::get();
        return view('elektronik.create')->with($data);
    }

    public function store(Request $request)
    {
        $elektronik = new ElektronikModel();
        $elektronik->name = $request->name;
        $elektronik->model = $request->model;
        $elektronik->processor = $request->processor;
        $elektronik->vga = $request->vga;
        $elektronik->ram = $request->ram;
        $elektronik->rom = $request->rom;
        $elektronik->status_id = $request->status_id;
        $elektronik->price = $request->price;
        $elektronik->date = $request->date;
        $elektronik->description = $request->description;

            $image = $request->file('image');

            $imagename = date('Y-m-d')."_".$image->getClientOriginalName();
            $path = "files/elektronik/images";
            $image->move($path, $imagename);

            $elektronik->image = $imagename;
            $elektronik->save();

        try {
            $elektronik->save();
            if ($elektronik->save()) {
                return redirect('elektronik');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function edit($id)
    {
        $data['page'] = 'Elektronik';
        $data['elektronik'] = ElektronikModel::where('id', $id)->first();
        $data['status'] = StatusModel::get();
        return view('elektronik.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $elektronik = ElektronikModel::where('id', $id)->first();
        $elektronik->name = $request->name;
        $elektronik->model = $request->model;
        $elektronik->processor = $request->processor;
        $elektronik->vga = $request->vga;
        $elektronik->ram = $request->ram;
        $elektronik->rom = $request->rom;
        $elektronik->status_id = $request->status_id;
        $elektronik->price = $request->price;
        $elektronik->date = $request->date;
        $elektronik->description = $request->description;

        if ($request->hasFile('image')){

            $image = $request->file('image');
    
            $imagename = date('Y-m-d ')."_".$image->getClientOriginalName();
            $path = "files/elektronik/images";
            $image->move($path, $imagename);
            $elektronik->image = $request = $imagename;
            $elektronik->update();
    
            }

        try {
            $elektronik->save();
            if ($elektronik->save()) {
                return redirect('elektronik');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function destroy($id)
    {
        $elektronik = ElektronikModel::where('id', $id);
        try {
            $elektronik->delete();
            return redirect('elektronik');
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function admin()
    {
        $data['page'] = 'Elektronik';
        $data['app'] = 'Admin';
        $data['elektronik'] = ElektronikModel::paginate(10);
        return view('admin.elektronik.index')->with($data);
    }

    public function export_excel()
	{
		return Excel::download(new ElektronikExport, 'elektronik.xlsx');
	}
}
