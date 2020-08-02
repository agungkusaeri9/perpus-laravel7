<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowHistory extends Model
{
    protected $table = 'borrow_history';
    protected $fillable = ['user_id','book_id','status','received_by','returned_at'];

    protected $dates = ['returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
