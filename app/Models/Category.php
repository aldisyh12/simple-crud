<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasOne
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
