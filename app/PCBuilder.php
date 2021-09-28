<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCBuilder extends Model
{
    protected $table = "pcbuilder";
    protected $primaryKey = 'id';
    protected $fillable = ['cpu_id','cooler_id','motherboard_id','memory_id','hdd_id','ssd_id','graphics_id','casing_id','power_supply_id','monitor_id','keyboard_id','mouse_id'];
    protected $casts = [
        
        'cpu_id' => 'json',
        'cooler_id' => 'json',
        'motherboard_id' => 'json',
        'memory_id' => 'json',
        'hdd_id' => 'json',
        'ssd_id' => 'json',
        'graphics_id' => 'json',
        'casing_id' => 'json',
        'power_supply_id' => 'json',
        'monitor_id' => 'json',
        'keyboard_id' => 'json',
        'mouse_id' => 'json',
    ];
}
