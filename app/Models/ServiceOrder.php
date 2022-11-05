<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table = 'orders_services';

    protected $fillable = [
        'user_id',
        'service_id',
        'package_id',
        'revisions',
        'original_delivery_time',
        'payment_intent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(ServicePost::class, 'service_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(ServicePackage::class, 'package_id', 'id');
    }
}