<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_name', 'campaign_start', 'campaign_finish'];
    protected $casts = [
        'campaign_start' => 'date:d M Y',
        'campaign_finish' => 'date:d M Y',
    ];
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
