<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-text-light leading-tight">
            {{ __('Financial Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-500/10 border border-green-500/30 text-green-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-dark-secondary p-6 rounded-2xl border border-dark-tertiary transform hover:scale-[1.02] transition-transform duration-300 ease-in-out">
                    <h3 class="text-sm font-medium text-text-medium">Total Pemasukan</h3>
                    <p class="text-3xl font-bold text-green-400 mt-2">Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</p>
                </div>
                <div class="bg-dark-secondary p-6 rounded-2xl border border-dark-tertiary transform hover:scale-[1.02] transition-transform duration-300 ease-in-out">
                    <h3 class="text-sm font-medium text-text-medium">Total Pengeluaran</h3>
                    <p class="text-3xl font-bold text-red-400 mt-2">Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</p>
                </div>
                <div class="bg-dark-secondary p-6 rounded-2xl border border-dark-tertiary transform hover:scale-[1.02] transition-transform duration-300 ease-in-out">
                    <h3 class="text-sm font-medium text-text-medium">Saldo Akhir</h3>
                    <p class="text-3xl font-bold text-accent-gold mt-2">Rp {{ number_format($saldo, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="bg-dark-secondary overflow-hidden shadow-xl rounded-2xl border border-dark-tertiary">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-text-light">Riwayat Transaksi</h3>
                        <a href="{{ route('transactions.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-accent-blue border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent-blue-hover focus:outline-none focus:ring-2 focus:ring-accent-blue focus:ring-offset-2 focus:ring-offset-dark-primary transition ease-in-out duration-150">
                            + Tambah Transaksi
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="border-b border-dark-tertiary">
                                <tr>
                                    <th class="py-3 px-4 text-left text-xs font-medium text-text-dark uppercase tracking-wider">Tanggal</th>
                                    <th class="py-3 px-4 text-left text-xs font-medium text-text-dark uppercase tracking-wider">Deskripsi</th>
                                    <th class="py-3 px-4 text-right text-xs font-medium text-text-dark uppercase tracking-wider">Jumlah</th>
                                    <th class="py-3 px-4 text-center text-xs font-medium text-text-dark uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-text-light">
                                @forelse ($transactions as $transaction)
                                    <tr class="border-b border-dark-tertiary/50 hover:bg-white/5 transition-colors duration-200">
                                        <td class="py-4 px-4 whitespace-nowrap text-sm">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</td>
                                        <td class="py-4 px-4 text-sm">{{ $transaction->description }}</td>
                                        <td class="py-4 px-4 text-right whitespace-nowrap text-sm font-medium">
                                            <span class="{{ $transaction->type == 'pemasukan' ? 'text-green-400' : 'text-red-400' }}">
                                                {{ $transaction->type == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 2, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 text-center text-sm font-medium">
                                            <div class="flex items-center justify-center space-x-4">
                                                <a href="{{ route('transactions.edit', $transaction) }}" class="text-accent-blue hover:text-accent-blue-hover transition-colors duration-200">Edit</a>
                                                <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus transaksi ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 transition-colors duration-200">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-10 text-text-dark">Belum ada transaksi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($transactions->hasPages())
                        <div class="mt-6 p-4 bg-dark-primary/50 rounded-lg">
                            {{ $transactions->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>