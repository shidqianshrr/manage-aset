<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\LisensiModel;
use App\Models\StatusModel;
use App\Exports\LisensiExport;
use Maatwebsite\Excel\Facades\Excel;

class LisensiController extends Controller
{
    public function index()
    {
        $data['page'] = 'Lisensi';
        $data['lisensi'] = LisensiModel::paginate(10);
        return view('lisensi.index')->with($data);
    }

    public function create()
    {
        $data['page'] = 'Lisensi';
        $data['lisensi'] = LisensiModel::get();
        $data['status'] = StatusModel::get();
        return view('lisensi.create')->with($data);
    }

    public function store(Request $request){
        $lisensi = new LisensiModel();
        $lisensi->name = $request->name;
        $lisensi->model = $request->model;
        $lisensi->category = $request->category;
        $lisensi->version = $request->version;
        $lisensi->status_id = $request->status_id;
        $lisensi->description = $request->description;

        $image = $request->file('image');

            $imagename = date('Y-m-d')."_".$image->getClientOriginalName();
            $path = "files/lisensi/images";
            $image->move($path, $imagename);

            $lisensi->image = $imagename;
            $lisensi->save();

            try {
                $lisensi->save();
                if ($lisensi->save()) {
                    return redirect('lisensi');
                }
            } catch (Exception $e) {
                report($e);
                return false;
            }
    }

    public function edit($id)
    {
        $data['page'] = 'Lisensi';
        $data['lisensi'] = LisensiModel::where('id', $id)->first();
        $data['status'] = StatusModel::get();
        return view('lisensi.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $lisensi = LisensiModel::where('id', $id)->first();
        $lisensi->name = $request->name;
        $lisensi->model = $request->model;
        $lisensi->category = $request->category;
        $lisensi->version = $request->version;
        $lisensi->status_id = $request->status_id;
        $lisensi->description = $request->description;

        try {
            $lisensi->save();
            if ($lisensi->save()) {
                return redirect('lisensi');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function destroy($id)
    {
        $lisensi = LisensiModel::where('id', $id);
        try {
            $lisensi->delete();
            return redirect('lisensi');
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function admin()
    {
        $data['page'] = 'Lisensi';
        $data['app'] = 'Admin';
        $data['lisensi'] = LisensiModel::paginate(10);
        return view('admin.lisensi.index')->with($data);
    }

    public function export_excel()
	{
		return Excel::download(new LisensiExport, 'lisensi.xlsx');
	}
}
