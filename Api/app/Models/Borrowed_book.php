<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowed_book extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['borrower_id', 'book_id'];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrower_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}
