@if ($errors->any())
    <div class="bg-red-500/10 border border-red-500/30 text-red-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
        <p class="font-bold">Terjadi Kesalahan</p>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-6">
    <div>
        <label for="description" class="block text-sm font-medium text-text-medium">Deskripsi</label>
        <input type="text" name="description" id="description" class="mt-1 block w-full bg-dark-primary border-dark-tertiary rounded-lg shadow-sm focus:border-accent-blue focus:ring focus:ring-accent-blue focus:ring-opacity-50 text-text-light" value="{{ old('description', $transaction->description ?? '') }}" required>
    </div>

    <div>
        <label for="amount" class="block text-sm font-medium text-text-medium">Jumlah (Rp)</label>
        <input type="number" name="amount" id="amount" step="0.01" class="mt-1 block w-full bg-dark-primary border-dark-tertiary rounded-lg shadow-sm focus:border-accent-blue focus:ring focus:ring-accent-blue focus:ring-opacity-50 text-text-light" value="{{ old('amount', $transaction->amount ?? '') }}" required>
    </div>

    <div>
        <label for="type" class="block text-sm font-medium text-text-medium">Tipe</label>
        <select name="type" id="type" class="mt-1 block w-full bg-dark-primary border-dark-tertiary rounded-lg shadow-sm focus:border-accent-blue focus:ring focus:ring-accent-blue focus:ring-opacity-50 text-text-light" required>
            <option value="pemasukan" {{ old('type', $transaction->type ?? '') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value="pengeluaran" {{ old('type', $transaction->type ?? '') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
        </select>
    </div>

    <div>
        <label for="transaction_date" class="block text-sm font-medium text-text-medium">Tanggal Transaksi</label>
        <input type="date" name="transaction_date" id="transaction_date" class="mt-1 block w-full bg-dark-primary border-dark-tertiary rounded-lg shadow-sm focus:border-accent-blue focus:ring focus:ring-accent-blue focus:ring-opacity-50 text-text-light" value="{{ old('transaction_date', isset($transaction) ? \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d') : date('Y-m-d')) }}" required>
    </div>
</div>

<div class="flex items-center justify-end mt-8 pt-6 border-t border-dark-tertiary">
    <a href="{{ route('dashboard') }}" class="text-sm text-text-medium hover:text-text-light transition-colors duration-200 mr-4">Batal</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-accent-blue border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent-blue-hover focus:outline-none focus:ring-2 focus:ring-accent-blue focus:ring-offset-2 focus:ring-offset-dark-secondary transition ease-in-out duration-150">
        Simpan
    </button>
</div>