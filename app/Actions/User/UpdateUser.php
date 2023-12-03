<?php
use App\Models\User;

class UpdateUserAction {

  public function __construct() {}

  /*
    * @param array $data
    * @return void
    */
  public function execute(array $data) : User {
    DB::beginTransaction();
    $user = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password'])
    ]);

    DB::commit();
    return $user;
  }

}
