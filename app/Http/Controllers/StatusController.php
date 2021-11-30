<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusModel;

class StatusController extends Controller
{
    public function index()
    {
        $data['page'] = 'Status';
        $data['status'] = StatusModel::paginate(10);
        return view('status.index')->with($data);
    }

    public function create()
    {
        $data['page'] = 'Status';
        return view('status.create')->with($data);
    }

    public function store(Request $request)
    {
        $status = new StatusModel();
        $status->name = $request->name;

        try {
            $status->save();
            if ($status->save()) {
                return redirect('status');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }
    
    public function edit($id)
    {
        $data['page'] = 'Status';
        $data['status'] = StatusModel::where('id', $id)->first();
        return view('status.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $status = StatusModel::where('id', $id)->first();
        $status->name = $request->name;

        try {
            $status->save();
            if ($status->save()) {
                return redirect('status');
            }
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function destroy($id)
    {
        $status = StatusModel::where('id', $id);
        try {
            $status->delete();
            return redirect('status');
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }
}
