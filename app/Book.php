<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','slug','description','qty','author_id','cover'];

    public function getCover()
    {
        if(substr($this->cover,0,4) == "http"){
            return $this->cover;
        }
        if($this->cover){
            return asset('storage/' . $this->cover);
        }
        if($this->cover == NULL){
            return "https://via.placeholder.com/150";
        }
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function borrowed()
    {
        return $this->belongsToMany(User::class, 'borrow_history');
    }
}
