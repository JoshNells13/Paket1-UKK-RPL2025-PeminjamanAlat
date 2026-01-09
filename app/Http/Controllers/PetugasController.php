<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
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



}
