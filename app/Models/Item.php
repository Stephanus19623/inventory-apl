<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * Tools Attribute.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
