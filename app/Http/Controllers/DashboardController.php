<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung semua user kecuali role 'admin'
        $totalUsers = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->count();

        // 2. Hitung jumlah user dengan role 'manager'
        $totalManagers = User::role('manager')->count();
        $totalStaff = User::role('staff')->count();

        // 3. Hitung jumlah role yang ada (misal: admin, manager, staff, director, dll)

        return view('dashboard', compact('totalUsers', 'totalManagers', 'totalStaff'));
    }
}
