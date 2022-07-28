<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;

    protected $fillable = [
        'exporter_id',
        'receiver_id',
        'total_product',
        'total_price'
    ];

    public function exporter()
    {
        return $this->hasOne(User::class, 'id', 'exporter_id');
    }

    public function receiver()
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'export_products');
    }

    public function export_products()
    {
        return $this->hasMany(ExportProduct::class, 'export_id', 'id');
    }
}
