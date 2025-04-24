<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyNote;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class DailyNoteController extends Controller
{
    public function index()
    {
        $notes = DailyNote::where('user_id', auth()->id())
                        ->orderBy('date', 'desc')
                        ->get();

        return view('user.daily-notes.index', compact('notes'));
    }

    public function create()
    {
        return view('user.daily-notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|string',
            'date' => 'required|date',
            'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048', // max 2MB
        ]);
    
        $photoPath = null;
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('daily_photos', 'public');
        }
    
        DailyNote::create([
            'user_id' => auth()->id(),
            'note' => $request->note,
            'date' => $request->date,
            'photo' => $photoPath,
            'status' => 'pending',
        ]);
    
        return redirect()->route('user.daily-note.create')->with('success', 'Catatan harian berhasil diunggah!');
    }
    public function edit($id)
    {
        $note = DailyNote::where('user_id', auth()->id())->findOrFail($id);
        return view('user.daily-notes.update', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|string',
            'date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $note = DailyNote::where('user_id', auth()->id())->findOrFail($id);

        if ($request->hasFile('photo')) {
            if ($note->photo && Storage::exists('public/' . $note->photo)) {
                Storage::delete('public/' . $note->photo);
            }
            $note->photo = $request->file('photo')->store('daily_photos', 'public');
        }

        $note->update([
            'note' => $request->note,
            'date' => $request->date,
            'status' => 'pending',
        ]);

        return redirect()->route('user.daily-note.index')->with('success', 'Catatan berhasil diperbarui!');
    }


    public function indexReviewer()
    {
        $user = auth()->user();
    
        if ($user->hasRole('manager')) {
            // Ambil catatan dari staff bawahan
            $staffIds = $user->staffs->pluck('id');
            $notes = DailyNote::whereIn('user_id', $staffIds)->latest()->get();
        } elseif ($user->hasRole('director')) {
            // Ambil catatan dari manager
            $managerIds = User::role('manager')->pluck('id');
            $notes = DailyNote::whereIn('user_id', $managerIds)->latest()->get();
        } else {
            abort(403, 'Tidak memiliki akses.');
        }
    
        return view('user.daily-notes.review', compact('notes'));
    }
    

    public function updateStatus(Request $request, DailyNote $note)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);
    
        $note->update(['status' => $request->status]);
    
        return back()->with('success', 'Status catatan diperbarui.');
    }

    public function destroy($id)
    {
        $note = DailyNote::where('user_id', auth()->id())->findOrFail($id);

        // Hapus foto jika ada
        if ($note->photo && Storage::exists('public/' . $note->photo)) {
            Storage::delete('public/' . $note->photo);
        }

        $note->delete();

        return redirect()->route('user.daily-note.index')->with('success', 'Catatan berhasil dihapus.');
    }

}
