<x-app-layout>
        <script src="https://cdn.tailwindcss.com"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dasbor Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-bold">Total Pemasukan</h3>
                    <p class="text-2xl">Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</p>
                </div>
                <div class="bg-red-500 text-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-bold">Total Pengeluaran</h3>
                    <p class="text-2xl">Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</p>
                </div>
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-bold">Saldo Akhir</h3>
                    <p class="text-2xl">Rp {{ number_format($saldo, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Riwayat Transaksi</h3>
                        <a href="{{ route('transactions.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                            + Tambah Transaksi
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm text-left">Tanggal</th>
                                    <th class="w-1/2 py-3 px-4 uppercase font-semibold text-sm text-left">Deskripsi</th>
                                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm text-right">Jumlah</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</td>
                                        <td class="py-3 px-4">{{ $transaction->description }}</td>
                                        <td class="py-3 px-4 text-right">
                                            <span class="{{ $transaction->type == 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $transaction->type == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 2, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <a href="{{ route('transactions.edit', $transaction) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus transaksi ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Belum ada transaksi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>