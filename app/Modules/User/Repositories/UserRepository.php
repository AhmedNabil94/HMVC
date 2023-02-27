<?php
namespace app\Modules\User\Repositories;

use App\Interfaces\EntityRepository;
use app\Modules\User\Models\User;

class UserRepository implements EntityRepository
{

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return User::get();
    }

    /**
     * @inheritDoc
     */
    public function getOne($id)
    {
        return User::NotDeleted()->find($id);
    }

    /**
     * @inheritDoc
     */
    public function create($createData)
    {
        return User::create($createData);
    }

    /**
     * @inheritDoc
     */
    public function update($updateData)
    {
        $newData = $updateData;
        unset($newData['obj_id']);
        $obj = User::NotDeleted()->where('id',$updateData['obj_id'])->first();
        if(!$obj){
            return $this->errors = ['invalidObj' => 'User Not exist'];
        }
        return $obj->update($newData);
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $obj = User::NotDeleted()->where('id',$id)->first();
        if(!$obj){
            return $this->errors = ['invalidObj' => 'User Not exist or has been deleted before'];
        }

        return $obj->update([
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => 1,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function unique($searchData)
    {
        return User::where($searchData['key'],$searchData['operand'],$searchData['value'])->first();
    }
}
