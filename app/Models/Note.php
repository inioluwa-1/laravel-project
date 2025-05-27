<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Note extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'notes';
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function keepusers() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
