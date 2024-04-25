<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BarangModel extends Model
{
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';

    protected $fillable = ['kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual'];

    public function kategori(): BelongsTo{
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

    public function stok(): HasOne{
        return $this->hasOne(StokModel::class, 'barang_id');
    }

    public function penjualanDetail(): HasMany{
        return $this->hasMany(PenjualanDetailModel::class, 'barang_id');
    }
}
