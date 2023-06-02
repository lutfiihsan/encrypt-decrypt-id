<?php

namespace App\Models;

use App\Traits\EncryptableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    use EncryptableTrait;

    protected $guarded = [];

    // public function getRouteKey()
    // {
    //     return $this->encryptId($this->getKey());
    // }
}
