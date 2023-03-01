<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'book_order';

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
