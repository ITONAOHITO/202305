<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['body','user_id','deleted_at'];

    public static $rules = ['body' => 'required|max:255'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
