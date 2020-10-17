<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value'
    ];

    /**
     * @param $key
     * @return |null
     */
    public static function getValue($key){
        $value = self::where('key',$key)->select('value')->first();
        return $value ? $value->value : null;
    }
}
