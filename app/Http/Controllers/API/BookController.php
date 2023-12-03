<?php

namespace App\Http\Controllers\Api;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\DeleteBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookRequest;
use App\Http\Resources\Api\BookRessource;

use App\Models\User;
use App\Notifications\BookCreationNotification;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //

    /**
     * @param BookRequest $request
     * @param CreateBookAction $createBookAction
     */

    public function store(BookRequest $request, CreateBookAction $createBookAction) {
        $book = $createBookAction->execute($request->validated());
         // notify user
        $user = User::getAuthenticatedUser();
        $user->notify(new BookCreationNotification());
        return response()->json([
          "message"=>"Le livre a été crée",
          "book"=>new BookRessource($book)]);

    }

    /**
     * @param Request $request
     * @param DeleteBookAction $deleteBookAction
     */
    public function delete(Request $request, DeleteBookAction $deleteBookAction) {

        $bookDelete = $deleteBookAction->execute($request->id);

        if(!$bookDelete) return response()->json([
          "message"=>"Le livre n'existe pas"], 404);

        return response()->json([
          "message"=>"Le livre a été supprimé"]);
    }


    /**
     * @param Request $request
     * @param UpdateBookAction $updateBookAction
     */
    public function update(Request $request, UpdateBookAction $updateBookAction) {

        //validate
        $request->validate([
          'id'=>'required',
        ]);

        $bookUpdate = $updateBookAction->execute($request);

        if(!$bookUpdate) return response()->json([
          "message"=>"Le livre n'existe pas"], 404);

        return response()->json([
          "message"=>"Le livre a été modifié"]);
    }
}
