<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 
        'product_id', 
        'quantity', 
        'created_at', 
        'status', 
        'comment'
    ];

    protected $attributes = [
        'status' => 'new',
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getStatuses()
    {
        return [
            'new' => 'Новый',
            'completed' => 'Выполнен',
        ];
    }
}