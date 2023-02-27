<?php

namespace App\Interfaces;

interface EntityInterface
{
    /**
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * @param $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function getOne($id);

    /**
     * @param $createData
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create($createData);

    /**
     * @param $updateData
     * @return Illuminate\Database\Eloquent\Model
     */
    public function update($updateData);

    /**
     * @param $id
     * @return boolean
     */
    public function delete($id);

    /**
     * @param $searchData
     * @return boolean
     */
    public function unique($searchData);

    /**
     * @return Illuminate\Support\MessageBag
     */
    public function errors();

}
