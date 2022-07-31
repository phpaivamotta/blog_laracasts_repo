<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Conner\Likeable\Likeable;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $guarded =[];

    protected $with =['author'];

    public function scopeFilter($query, array $filters)
    {
        // This is the old and easy way
        // check to see if there have been any searches in search bar
        // if there were any, then get only the ones with the searched word in the title or body
        // if($filters['search'] ?? false){
        //     $query->where('title', 'like', '%' . request('search') . '%')->
        //     orWhere('body', 'like', '%' . request('search') . '%');
        // }

        // check to see if there have been any searches in search bar
        // if there were any, then get only the ones with the searched word in the title or body
        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query->where(fn($query)=>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                )
            );

        // filter the author 
        $query->when($filters['author'] ?? false, fn($query, $author) => 
            $query->whereHas('author', fn($query) => 
                $query->where('username', $author)
            )
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function visitor()
    {
        return $this->hasMany(Visitor::class);
    }

}
