<?php
namespace App\Actions\Book;
use App\Models\Book;
use DB;
use Illuminate\Http\Request;
class UpdateBookAction
{
    public function __construct()
    {

    }
    public function execute(Request $request) :bool{
      //start transaction
      DB::beginTransaction();
      // get book by id
      $book =  Book::getBookById($request->id);
      // if book is null return false
      if($book === null) return false;
      // update book
      Book::updateBook($request->all());
      // commit transaction
      DB::commit();
      return true;
    }
}
