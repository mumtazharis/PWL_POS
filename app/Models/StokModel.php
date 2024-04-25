<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class StokModel extends Model
{
    use HasFactory;
    protected $table = 't_stok';
    protected $primaryKey = 'stok_id';

    protected $fillable = ['user_id', 'barang_id', 'stok_jumlah', 'stok_tanggal'];

    public function barang(): BelongsTo{
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
