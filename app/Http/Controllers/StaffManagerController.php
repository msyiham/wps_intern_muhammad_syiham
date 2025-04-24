<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StaffManager;

class StaffManagerController extends Controller
{
    public function index()
    {
        $managers = User::role('manager')->get();
        $staffs = User::role('staff')->get();
        return view('admin.assign-staff', compact('managers', 'staffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'manager_id' => 'required|exists:users,id',
            'staff_ids' => 'required|array',
            'staff_ids.*' => 'exists:users,id',
        ]);

        foreach ($request->staff_ids as $staffId) {
            StaffManager::updateOrCreate(
                ['manager_id' => $request->manager_id, 'staff_id' => $staffId],
                []
            );
        }

        return redirect()->back()->with('success', 'Staff berhasil ditugaskan ke manager.');
    }

}
