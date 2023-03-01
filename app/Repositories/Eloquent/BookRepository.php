<?php


namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{

    public function getAll()
    {
        return Book::paginate(9);
    }

    public function saveBookData($data)
    {
        $book = new Book;

        $book->name = $data['name'];
        $book->image = $data['image'];
        $book->slug = $data['slug'];
        $book->description = $data['description'];
        $book->code = $data['code'];
        $book->size = $data['size'];
        $book->price = $data['price'];
        $book->number_of_pages = $data['number_of_pages'];
        $book->status = $data['status'];
        $book->category_id = $data['category_id'];

        if(isset($data['thumb_1'])) {
            $book->thumb_1 = $data['thumb_1'];
        }

        if(isset($data['thumb_2'])) {
            $book->thumb_1 = $data['thumb_2'];
        }

        if(isset($data['thumb_3'])) {
            $book->thumb_1 = $data['thumb_3'];
        }

        if(isset($data['thumb_4'])) {
            $book->thumb_1 = $data['thumb_4'];
        }

        $book->save();

        if(isset($data['tag'])) {
            $book->tags()->attach($data['tag']);
        }

        return $book->fresh();
    }

    public function getBooksByCategoryId($id)
    {
        return Book::where('category_id',$id)->paginate(9);
    }

    public function getBooksByTagId($id)
    {
        $books = Book::whereIn('books.id', function($query) use ($id) {
            $query->from('book_tag')
                ->select('book_tag.book_id')
                ->where('book_tag.tag_id', $id);
        })->paginate(9);

        return $books;
    }

    public function getBookList($params)
    {

        if (isset($params['category'])) {
            $books = Book::where('category_id', $params['category'])->paginate(9)->appends(['category' => $params['category']]);
        }else if (isset($params['tag'])){
            $id = $params['tag'];
            $books = Book::whereIn('books.id', function($query) use ($id) {
                $query->from('book_tag')
                    ->select('book_tag.book_id')
                    ->where('book_tag.tag_id', $id);
            })->paginate(9)->appends(['tag' => $params['tag']]);
        }else {
            $books = Book::paginate(9);
        }

        return $books;
    }

    public function getBookFeatured()
    {
        return Book::paginate(8);
    }

    public function getBookById($id)
    {
        return Book::find($id);
    }
}
