<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services
 */
class UserService {

    /**
     * @param $request
     * @return mixed
     */
    public function create($request){

        $request['password'] = Hash::make($request->password);

        $user = User::create($request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]));

        return $user;
    }

    /**
     * @return mixed
     */
    public function getAll() {
        return User::orderBy('id', 'desc')->get();
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function findByEmail(string $email) {
        return User::where('email', $email)->first();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById(int $id) {
        return User::find($id);
    }

    /**
     * @param string $plainPassword
     * @param string $encryptedPassword
     * @return bool
     */
    public function verifyPassword(string $plainPassword, string $encryptedPassword) {
        return Hash::check($plainPassword, $encryptedPassword);
    }

}
