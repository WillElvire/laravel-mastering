<?php
namespace App\Actions\User;
use App\Models\User;
use DB;

class CreateUserAction {

  public function __construct() {}

  /*
    * @param array $data
    * @return void
    */
  public function execute(array $data) : User {

    DB::beginTransaction();
    $user = User::create([
      'firstname' => $data['firstname'],
      'lastname' => $data['lastname'],
      'email' => $data['email'],
      'password' => \Hash::make($data['password'])
    ]);

    DB::commit();
    return $user;
  }

}
