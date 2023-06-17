<?php


namespace App\Interfaces\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{



    public function getAll(array $columns = ['*'],array $order = [],array $relations = []);

    public function getWhere(array $columns,array $wheres,int $limit,array $order,array $relations);
    /**
     * @param $id
     * @return mixed
     */
    public function findById(int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function createInfo(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateById(int $id,array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id) :bool;

    /**
     * @param array $data
     * @return mixed
     */
    public function deleteByColumn(array $data);

    /**
     * @return Collection|null
     */
    public function allTrashed() : ? Collection;

    /**
     * @param int $modelId
     * @return Model|null
     */
    public function findTrashedById(int $modelId) : ?Model;

    /**
     * @param int $modelId
     * @return mixed
     */
    public function findOnlyTrashedById(int $modelId) : ?Model;

    /**
     * @param int $modelId
     * @return bool
     */
    public function restoreById(int $modelId) :bool;

    /**
     * @param int $modelId
     * @return bool
     */
    public function permanentlyDeleteById(int $modelId) :bool;

    /**
     * @param array $wheres
     * @param array $relations
     * @param array $order
     * @param string $limit
     * @return mixed
     */
    public function findWhere(array $wheres = [],array $relations = [],array $order = [],string $limit = '') ;


    /**
     * @param string $column
     * @param array $values
     * @param array $order
     * @param array $relations
     * @param array $columns
     * @return mixed
     */
    public function findWhereIn(string $column = '',array $values = [],array $order = [],array $relations = [],array $columns = ['*']) ;

}
