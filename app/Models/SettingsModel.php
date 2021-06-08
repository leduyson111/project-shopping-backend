<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    use HasFactory;

    protected $table = 'settings_models';
    protected $primaryKey = 'id';

    protected $fillable = [
        'config_key','config_value','type',
    ];

}
