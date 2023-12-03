<?php
namespace App\Actions\Book;
use App\Models\Book;
use Illuminate\Http\Request;
class DeleteBookAction {
    /**
     * @param Request $request
     */
    public function execute( string $id) : bool {
        $book = Book::find($id);
        if($book === null) return false;
        $book->delete();
        return true;
    }
}
