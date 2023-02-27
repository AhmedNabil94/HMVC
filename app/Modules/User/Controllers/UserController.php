<?php namespace App\Http\Controllers;

use app\Modules\User\Entities\UserEntity;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserEntity $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->getAll();
    }

    public function create(Request $request)
    {
        $createData = $request->all();
        $newUser = $this->user->create($createData);
        if(!$newUser){
            dd($this->user->errors());
        }
    }

    public function update(Request $request)
    {
        $createData = $request->all();
        $newUser = $this->user->update($createData);
        if(!$newUser){
            dd($this->user->errors());
        }
    }
}
