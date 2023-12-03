<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [] ;


    public static function getBooks(){
        return self::all();
    }

    public static function getBookById($id){
        return self::find($id);
    }

    public static function updateBook($data){
        //dd($data);
        return self::where('id', $data["id"])->update($data);
    }

}
