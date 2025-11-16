<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipCategory extends Model
{
    //

    public function tips()
    {
        return $this->hasMany(SecurityTip::class);
    }
}
