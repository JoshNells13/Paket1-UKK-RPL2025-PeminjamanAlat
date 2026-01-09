<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\ReturnTool;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{

    public function index()
    {

        // Admin (1) or Petugas (2)
        return view('Admin.ReturnTool.index', [
            'returns' => ReturnTool::with('borrowing.tool', 'borrowing.user')->get()
        ]);
    }

    public function create(Request $request)
    {
        $borrowing_id = $request->query('borrowing_id');
        $borrowing = Borrowing::findOrFail($borrowing_id);

        return view('Petugas.ReturnTool.create', [
            'borrowing' => $borrowing
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
            'returned_at'  => 'required|date',
            'condition'    => 'required|in:bagus,rusak'
        ]);

        $borrowing = Borrowing::findOrFail($request->borrowing_id);


        $lateDays = \Carbon\Carbon::parse($request->returned_at)->diffInDays($borrowing->return_date, false);
        // If late (lateDays < 0), calculate fine. 5000 per day.
        $fine = $lateDays < 0 ? abs($lateDays) * 5000 : 0;

        ReturnTool::create([
            'borrowing_id' => $borrowing->id,
            'returned_at'  => $request->returned_at,
            'fine'         => $request->fine ?? $fine,
            'note'         => $request->note
        ]);

        $borrowing->update(['status' => 'dikembalikan']);

        $borrowing->tool->update(['condition' => $request->condition]);

        $borrowing->tool->increment('stock');

        return redirect()->route('petugas.borrowings.index')->with('success', 'Pengembalian berhasil diproses');
    }


    public function edit(ReturnTool $returnTool) // Route param is return_tool
    {
        return view('Admin.ReturnTool.edit', [
            'return' => $returnTool
        ]);
    }

    public function update(Request $request, ReturnTool $returnTool)
    {


        $request->validate([
            'returned_at' => 'required|date',
            'fine'        => 'required|integer',
            'note'        => 'nullable|string'
        ]);

        $returnTool->update([
            'returned_at' => $request->returned_at,
            'fine'        => $request->fine,
            'note'        => $request->note
        ]);

        return redirect()->route('return-tools.index');
    }

    public function destroy(ReturnTool $returnTool)
    {
        if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2) {
             abort(403, 'Unauthorized action.');
        }
        // Maybe revert stock if deleted? Optional. For now just delete record.
        $returnTool->delete();
        return back();
    }
}
