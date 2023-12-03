<?php
namespace App\Actions\Book;
use App\Models\Book;
use DB;
class CreateBookAction
{
    public function __construct()
    {

    }


    /**
     * @param array $data
     */
    public function execute(array $data) : Book {
        DB::beginTransaction();
        $book = Book::create([
           "title"=> $data["title"],
           "author"=> $data["author"],
           "dateOfPublication"=> $data["dateOfPublication"],
        ]);

        DB::commit();
        return $book;
    }
}
