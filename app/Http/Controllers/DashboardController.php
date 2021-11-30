<?php

namespace App\Http\Controllers;

use App\Models\AksesorisModel;
use App\Models\ElektronikModel;
use App\Models\FurniturModel;
use App\Models\LisensiModel;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class DashboardController extends Controller
{
    
    public function index()
    {
        $data['page'] = 'Dashboard';
        $data['app'] = 'User';
        $data['elektronik'] = ElektronikModel::count();
        $data['aksesoris'] = AksesorisModel::count();
        $data['furnitur'] = FurniturModel::count();
        $data['lisensi'] = LisensiModel::count();
        return view('dashboard')->with($data);
    }
}
