<?php
namespace app\Modules\User\Entities;
use App\Abstracts\AbstractEntity;
use App\Interfaces\EntityInterface;
use app\Modules\User\Repositories\UserRepository;
use app\Modules\User\Validation\UserCreateValidator;
use app\Modules\User\Validation\UserUpdateValidator;

class UserEntity extends AbstractEntity implements EntityInterface
{
    /**
     * @var
     */
    protected $repository;
    /**
     * @var
     */
    protected $errors;
    /**
     * @var
     */
    protected $createValidator;
    /**
     * @var
     */
    protected $updateValidator;

    public function __construct(UserRepository $repository,UserCreateValidator $createValidator, UserUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }
}
