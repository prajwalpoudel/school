<?php


namespace App\Services;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    /**
     * @var Application
     */
    public $model;

    /**
     * BaseService constructor.
     */
    public function __construct()
    {
        $this->model = app($this->model());
    }

    /**
     * @return mixed
     */
    public function truncate() {
        return $this->model->truncate();
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return $this->model->query();
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->model->all();
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function select($columns = ['*']) {
        return $this->model->select($columns)->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id) {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOrFail(int $id) {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $insertData
     * @return \Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function create($insertData)
    {
        return $this->model->create($insertData);
    }

    /**
     * @param $where array|integer|Model
     * @param $data
     * @return bool|int
     */
    public function update($where, $data)
    {
        if ($where instanceof Model) {
            return $where->update($data);
        }

        if (is_array($where)) {
            return $this->model->where($where)->update($data);
        }

        return $this->model->findOrFail($where)->update($data);

    }

    /**
     * @param array $where
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate(array $where, array $data) {
        return $this->model->updateOrCreate($where, $data);
    }

    /**
     * @return mixed
     */
    public abstract  function model();
}
