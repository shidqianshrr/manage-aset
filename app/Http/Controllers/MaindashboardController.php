<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesorisModel;
use App\Models\ElektronikModel;
use App\Models\FurniturModel;
use App\Models\LisensiModel;
use PHPUnit\Framework\Constraint\Count;

class MaindashboardController extends Controller
{
    public function index()
    {
        $data['page'] = 'Dashboard';
        $data['app'] = 'Admin';
        $data['elektronik'] = ElektronikModel::count();
        $data['aksesoris'] = AksesorisModel::count();
        $data['furnitur'] = FurniturModel::count();
        $data['lisensi'] = LisensiModel::count();
        return view('admin.dashboard')->with($data);
    }
}
