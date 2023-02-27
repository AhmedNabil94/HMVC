<?php

namespace App\Abstracts;

abstract class AbstractEntity
{
    /**
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){
        return $this->repository->getAll();
    }

    /**
     * @param $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function getOne($id){
        return $this->repository->getOne($id);
    }

    /**
     * @param $createData
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create($createData){
        if(!$this->createValidator->with($createData)->passes()){
            $this->errors = $this->createValidator->errors()->messages();
            return 0;
        }
        return $this->repository->create($createData);
    }

    /**
     * @param $updateData
     * @return Illuminate\Database\Eloquent\Model
     */
    public function update($updateData){
        if(!$this->updateValidator->with($updateData)->passes()){
            $this->errors = $this->updateValidator->errors()->messages();
            return 0;
        }
        return $this->repository->update($updateData);
    }

    /**
     * @param $id
     * @return boolean
     */
    public function delete($id){
        return $this->repository->delete($id);
    }

    /**
     * @param $searchData
     * @return boolean
     */
    public function unique($searchData){
        return $this->repository->unique($searchData);
    }

    /**
     * @return Illuminate\Support\MessageBag
     */
    public function errors(){
        return $this->errors;
    }
}
