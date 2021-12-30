<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Billing') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-theme-blue-100">
                    <tr>
                        <x-table.head>Date</x-table.head>
                        <x-table.head>Total</x-table.head>
                        <x-table.head class="text-center">Action</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($invoices as $invoice)
                    <tr>
                        <x-table.data>
                            {{ $invoice->date()->toFormattedDateString() }}
                        </x-table.data>
                        
                        <x-table.data>
                            {{ $invoice->total() }}
                        </x-table.data>

                        <x-table.data>
                            <a href="{{ route('billing.invoice.download', $invoice->id) }}">Download</a>
                        </x-table.data>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    
</x-app-layout>
