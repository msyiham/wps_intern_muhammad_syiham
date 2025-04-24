<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyNote extends Model
{
    protected $fillable = [
        'user_id',
        'note',
        'date',
        'photo',
        'status',
        'approved_by',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
