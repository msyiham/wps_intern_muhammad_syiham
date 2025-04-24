<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffManager extends Model
{
    protected $table = 'staff_manager';

    protected $fillable = ['manager_id', 'staff_id'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
