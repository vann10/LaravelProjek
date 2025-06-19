@if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
        <p class="font-bold">Terjadi Kesalahan</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
    <input type="text" name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('description', $transaction->description ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah (Rp)</label>
    <input type="number" name="amount" id="amount" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('amount', $transaction->amount ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="type" class="block text-sm font-medium text-gray-700">Tipe</label>
    <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        <option value="pemasukan" {{ old('type', $transaction->type ?? '') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
        <option value="pengeluaran" {{ old('type', $transaction->type ?? '') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
    </select>
</div>

<div class="mb-4">
    <label for="transaction_date" class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
    <input type="date" name="transaction_date" id="transaction_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('transaction_date', isset($transaction) ? \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d') : date('Y-m-d')) }}" required>
</div>

<div class="flex items-center justify-end mt-4">
    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
        Simpan
    </button>
</div>