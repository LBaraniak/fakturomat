<div>
    <form>
        {{ csrf_field() }}
        <div class="form-floating mb-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Klient</label>
                <select wire:model.live="customerId" class="form-select" id="inputGroupSelect01">
                    <option selected>wybierz...</option>

                    @foreach($customers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-floating mb-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Faktura</label>
                <select wire:model.live="invoiceId" class="form-select" id="inputGroupSelect01">
                    @if(count($invoices) > 0)
                        @foreach($invoices as $item)
                            <option value="{{ $item->id }}">{{ $item->number }}</option>
                        @endforeach
                    @else
                        <option selected>wybierz klienta z fakturami...</option>
                    @endif
                </select>
            </div>
        </div>

        @if($selectedInvoice != null)
            <p>Wartość faktury: {{ $selectedInvoice->total }} PLN</p>
        @endif
    </form>
</div>
