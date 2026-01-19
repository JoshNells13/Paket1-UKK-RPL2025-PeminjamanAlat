<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\ReturnTool;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {

        $borrowings = Borrowing::with(['user', 'tool'])->get();

        return view('Petugas.ReturnTool.index', compact('borrowings'));
    }

    public function approve(Borrowing $borrowing)
    {
        $borrowing->update(['status' => 'dipinjam']);
        // Decrease stock
        $borrowing->tool->decrement('stock');

        return back();
    }

    public function returnTool(Borrowing $borrowing)
    {
        $borrowing->load(['user', 'tool']);

        return view('Petugas.ReturnTool.create', compact('borrowing'));
    }

    public function storeReturnTool(Request $request)
    {
        $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
            'returned_at'  => 'required|date',
            'fine'         => 'nullable|numeric',
            'note'         => 'nullable|string',
        ]);

        $borrowing = Borrowing::findOrFail($request->borrowing_id);

        // Update borrowing status
        $borrowing->update(['status' => 'dikembalikan']);

        // Increase stock
        $borrowing->tool->increment('stock');

        // Create return record
        ReturnTool::create([
            'borrowing_id' => $request->borrowing_id,
            'returned_at'  => $request->returned_at,
            'fine'         => $request->fine,
            'note'         => $request->note,
        ]);

        return redirect()->route('petugas.borrowings.index')->with('success', 'Pengembalian alat berhasil diproses!');
    }
}
