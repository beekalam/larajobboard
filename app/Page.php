<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
    public function scopeStaticPages($query)
    {
        return $query->where('page_type','static_page');
    }
}
