<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function scopeStaticPages($query)
    {
        return $query->where('page_type', 'static_page');
    }

    public function scopeHeaderPages($query)
    {
        return $query->where([
            'page_type'           => 'static_page',
            'show_in_header_menu' => 1,
        ]);
    }

    public function scopeFooterPages($query)
    {
        return $query->where([
            'page_type'           => 'static_page',
            'show_in_footer_menu' => 1
        ]);
    }
}
