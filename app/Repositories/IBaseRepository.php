<?php

declare(strict_types=1);

namespace App\Repositories;

interface IBaseRepository
{
    /**
     * Get all
     * @return mixed
     */
    public function all();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $attributes = null);

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id);

    /**
     * Create
     *
     * @param $id
     * @return bool
     */
    public function create($attribute);

    /**
     * Insert
     *
     * @param $array
     * @return bool
     */
    public function insert($array);

    /**
     * Update
     * @param $id , $attribute
     * @return bool
     */
    public function update($id, $attribute);

    /**
     * select
     * @param  $array
     * @return  mixed
     */
    public function select($array);

    /**
     * where
     * @param  $conditions
     * @return  mixed
     */
    public function where($conditions);

    /**
     * Mass Upsert
     *
     * Check item id value to decide item is create or update
     *
     * @param array
     *
     * @return void
     */
    public function massUpsert(array $data);
}
