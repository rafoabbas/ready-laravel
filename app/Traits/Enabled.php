<?php


namespace App\Traits;


trait Enabled
{
    public function scopeEnabled($query){
        return $query->where('enabled', 1);
    }
}
