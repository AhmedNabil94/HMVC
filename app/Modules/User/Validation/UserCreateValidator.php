<?php namespace app\Modules\User\Validation;
use App\Abstracts\EntityValidator;
use App\Interfaces\ValidationInterface;

class UserCreateValidator extends EntityValidator implements ValidationInterface
{
    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = [
        "name" => "required|min:2",
        "email" => "required|email",
        "password" => "required",
    ];

    /**
     * Messages for creating a new User
     *
     * @var array
     */
    protected $messages = [
        'email.required' => 'Email is required!',
        'name.required' => 'Name is required!',
        'password.required' => 'Password is required!'
    ];
}
