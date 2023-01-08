<?php

declare(strict_types=1);

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements IBaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Table
     */
    protected $table;

    /**
     * RepositoryAbstract constructor.
     */
    public function __construct()
    {
        $this->setModel();
        $this->table = $this->model->getTable();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all
     */
    public function all()
    {
        return $this->model::all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $attributes = null)
    {
        if ($attributes) {
            $result = $this->model::select($attributes)->findOrFail($id);
        } else {
            $result = $this->model->findOrFail($id);
        }

        return $result;
    }

    /**
     * Delete
     *
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * create
     * @param array
     */
    public function create($attributes = [])
    {
        return $this->model::create($attributes);
    }

    /**
     * insert
     * @param array
     */
    public function insert($array = [])
    {
        return $this->model::insert($array);
    }

    /**
     * update
     * @param  $id , array
     * @return  bool
     */
    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * select
     * @param  $array
     * @return  mixed
     */
    public function select($array)
    {
        return $this->model::select($array);
    }

    /**
     * where
     * @param  $id , array
     * @return  mixed
     */
    public function where($conditions)
    {
        return $this->model::where($conditions);
    }

        /**
     * Mass Upsert
     *
     * Check item id value to decide item is create or update
     *
     * @param array
     *
     * @return void
     */
    public function massUpsert(array $data): void
    {
        $data = collect($data)->reduce(function ($carry, $item) {
            if (!isset($item['id']) || empty($item['id'])) {
                $item['updated_at'] = now();
                $item['created_at'] = now();
                $carry['insert'][] = $item;
            } else {
                $item['updated_at'] = now();
                $carry['update'][] = $item;
            }
            return $carry;
        });

        if (isset($data['insert']) && !empty($data['insert'])) {
            $this->insert($data['insert']);
        }

        if (isset($data['update']) && !empty($data['update'])) {
            $this->massUpdate($data['update']);
        }

        return;
    }

    /**
     * Mass Update
     *
     * @param array
     *
     */
    public function massUpdate(array $data)
    {
        $data = collect($data);
        $firstItem = collect($data->first());
        $fieldsInsert = $firstItem
            ->keys()
            ->implode(',');

        $fieldsUpdate = $firstItem
            ->keys()
            ->map(function($item) {
                $item = "{$item} = VALUES({$item})";
                return $item;
            })
            ->implode(',');

        $valuesInsert = $data
            ->map(function($item) {
                $items = collect($item)
                    ->map(function($item) {
                        return !is_null($item) ? "'" . $item . "'" : "null";
                    });

                $items = $items->implode(',');

                $item = "(" . $items . ")";
                return $item;
            })
            ->implode(',');

        $query = "INSERT INTO {$this->table} ({$fieldsInsert}) VALUES {$valuesInsert} ON DUPLICATE KEY UPDATE $fieldsUpdate";

        DB::insert($query);
    }
}
