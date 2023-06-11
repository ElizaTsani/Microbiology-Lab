<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reagent extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'reagents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'code',
        'available_stock',
        'minimum_reserve',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function reagentsOrders()
    {
        return $this->belongsToMany(Order::class,'reagent_orders');
    }

    public function reagentsTests()
    {
        return $this->belongsToMany(Test::class,'reagent_usages');
    }
}
