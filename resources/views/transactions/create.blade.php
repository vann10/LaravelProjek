<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-text-light leading-tight">
            {{ __('Tambah Transaksi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-secondary overflow-hidden shadow-xl rounded-2xl border border-dark-tertiary">
                <div class="p-6 md:p-8">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        @include('transactions.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>