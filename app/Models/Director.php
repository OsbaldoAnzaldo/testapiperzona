<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['number_titles'];

    public function titles()
    {
        return $this->hasMany(Title::class);
    }

    public function getNumberTitlesAttribute(){
        return $this->titles()->count();
    }

}
