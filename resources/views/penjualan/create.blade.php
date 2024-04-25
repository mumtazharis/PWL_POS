@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('penjualan') }}" class="form-horizontal">
            @csrf

            <div id="items-container">
                <div class="form-group row item-row">
                    <label class="col-1 control-label col-form-label">Nama Pembeli</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="pembeli" id="pembeli" required>
                    </div>
                </div>
                <div class="form-group row item-row">
                    <label class="col-1 control-label col-form-label">Kode Penjualan</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="penjualan_kode" id="penjualan_kode" value="{{$kodePenjualan}}" readonly>
                    </div>
                </div>
                <div class="form-group row item-row">
                    <label class="col-1 control-label col-form-label">Barang</label>
                    <div class="col-4">
                        <select class="form-control" name="barang_id[]" id="barang_id[]" required>
                            <option value="">- Pilih Barang -</option>
                            @foreach($barang as $item)
                                <option value="{{ $item->barang_id }}" data-stok="{{ $item->stok->stok_jumlah }}">{{ $item->barang_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-1 control-label col-form-label">Jumlah</label>
                    <div class="col-4">
                        <input type="number" class="form-control" name="jumlah[]" id="jumlah[]" max="" min="1" step="1" required>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-success btn-sm float-right" id="add-item">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('penjualan')}}">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menangani perubahan pilihan barang
        document.querySelectorAll('#items-container').forEach(container => {
            container.addEventListener('change', function(event) {
                if (event.target && event.target.matches('select[name^="barang_id"]')) {
                    const selectedOption = event.target.querySelector('option:checked');
                    const maxStok = selectedOption.dataset.stok || 0;
    
                    const jumlahInput = event.target.closest('.item-row').querySelector('input[name^="jumlah"]');
                    jumlahInput.setAttribute('max', maxStok);

                    // Memeriksa duplikat barang
                    const selectedBarangId = selectedOption.value;

                    const allBarangInputs = document.querySelectorAll('select[name^="barang_id"]');
                    const selectedBarangIds = Array.from(allBarangInputs).map(input => input.value);

                    const isDuplicate = selectedBarangIds.filter(id => id === selectedBarangId).length > 1;

                    if (isDuplicate) {
                        alert('Anda sudah memilih jenis barang ini sebelumnya. Silakan pilih barang lain.');
                        event.target.value = ''; // Mengosongkan pilihan barang yang duplikat
                    }
                }
            });
        });

        // Menambahkan item baru
        const addItemButton = document.getElementById('add-item');
        const itemsContainer = document.getElementById('items-container');

        addItemButton.addEventListener('click', function() {
            const newItemRow = document.createElement('div');
            newItemRow.className = 'form-group row item-row';

            newItemRow.innerHTML = `
                <label class="col-1 control-label col-form-label">Barang</label>
                <div class="col-4">
                    <select class="form-control" name="barang_id[]" required>
                        <option value="">- Pilih Barang -</option>
                        @foreach($barang as $item)
                            <option value="{{ $item->barang_id }}" data-stok="{{ $item->stok->stok_jumlah }}">{{ $item->barang_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="col-1 control-label col-form-label">Jumlah</label>
                <div class="col-4">
                    <input type="number" class="form-control" name="jumlah[]" value="" required>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button>
                </div>
            `;

            itemsContainer.appendChild(newItemRow);
        });

        // Menghapus item
        itemsContainer.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-item')) {
                const itemRow = event.target.closest('.item-row');
                itemRow.remove();
            }
        });
    });
</script>

    
@endpush
