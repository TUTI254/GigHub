<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'description', 'company', 'logo','location', 'website', 'email', 'tags'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%') ->orWhere('description', 'like', '%' . request('search') . '%')->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    //relationship between user and listing
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
