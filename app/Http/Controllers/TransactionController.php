<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar transaksi (Dasbor).
     */
    public function index()
    {
        // Ambil transaksi hanya untuk user yang sedang login, urutkan dari yang terbaru
        $transactions = Auth::user()->transactions()->latest()->paginate(10);

        // Kalkulasi ringkasan
        $totalPemasukan = Auth::user()->transactions()->where('type', 'pemasukan')->sum('amount');
        $totalPengeluaran = Auth::user()->transactions()->where('type', 'pengeluaran')->sum('amount');
        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('dashboard', compact('transactions', 'totalPemasukan', 'totalPengeluaran', 'saldo'));
    }

    /**
     * Menampilkan form untuk membuat transaksi baru.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Menyimpan transaksi baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:pemasukan,pengeluaran',
            'transaction_date' => 'required|date',
        ]);

        Auth::user()->transactions()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit transaksi.
     */
    public function edit(Transaction $transaction)
    {
        // Pastikan user hanya bisa mengedit transaksinya sendiri
        if (Auth::id() !== $transaction->user_id) {
            abort(403, 'ANDA TIDAK DIIZINKAN MENGAKSES INI');
        }
        
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Mengupdate transaksi di database.
     */
    public function update(Request $request, Transaction $transaction)
    {
        if (Auth::id() !== $transaction->user_id) {
            abort(403, 'ANDA TIDAK DIIZINKAN MENGAKSES INI');
        }

        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:pemasukan,pengeluaran',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update($validated);

        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Menghapus transaksi.
     */
    public function destroy(Transaction $transaction)
    {
        if (Auth::id() !== $transaction->user_id) {
            abort(403, 'ANDA TIDAK DIIZINKAN MENGAKSES INI');
        }

        $transaction->delete();

        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil dihapus.');
    }
}