<?php


namespace App\Repository;


use App\Interfaces\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{

    /**
     * @var Model
     */
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll(array $columns = ['*'],array $order = [],array $relations = [])
    {
        $query = $this->model::query();
        if ($order)
        {
            foreach ($order as $key => $value):
                $query->orderBy($key,$value);
            endforeach;
        }
        return $query->with($relations)->get($columns);
    }

    public function getWhere(array $columns = ['*'],array $wheres = [],$limit = null,array $order = [] ,array $relations = [])
    {
        $query = $this->model::query();
        if ($wheres)
        {
            foreach ($wheres as $key => $value):
                $query->where($key,$value);
            endforeach;
        }
        if ($order)
        {
            foreach ($order as $key => $value):
                $query->orderBy($key,$value);
            endforeach;
        }
        if ($limit)
        {
            $query->limit($limit);
        }

        return $query->with($relations)->get($columns);


    }
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model::find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createInfo(array $data)
    {
        return $this->model::create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateById($id,array $data)
    {
        return $this->model::where('id',$id)->update($data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteById(int $id) :bool
    {
        return $this->model::where('id',$id)->delete();
    }

    /**
     * @param array $data
     */
    public function deleteByColumn(array $data)
    {
        return $this->model::where($data[0],$data[1])->delete();
    }

    /**
     * @return Collection|null
     */
    public function allTrashed() : ? Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    /**
     * @param int $modelId
     * @return Model|null
     */
    public function findTrashedById(int $modelId) : ?Model
    {
        return $this->model->withTrashed()->findOrFail($modelId);
    }

    /**
     * @param int $modelId
     * @return mixed
     */
    public function findOnlyTrashedById(int $modelId) : ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($modelId);
    }

    /**
     * @param int $modelId
     * @return bool
     */
    public function restoreById(int $modelId) :bool
    {
        return $this->findOnlyTrashedById($modelId)->restor();
    }

    /**
     * @param int $modelId
     * @return bool
     */
    public function permanentlyDeleteById(int $modelId) :bool
    {
        return $this->findOnlyTrashedById($modelId)->forceDelete();
    }


    /**
     * @param array $wheres
     * @param array $relations
     * @param array $order
     * @param string $limit
     * @return \Illuminate\Database\Eloquent\Builder|mixed
     */
    public function findWhere(array $wheres = [],array $relations = [],array $order = [],string $limit = '')
    {
        $query = $this->model::query();
        if ($wheres)
        {
            foreach ($wheres as $key => $value):
                $query->where($key,$value);
            endforeach;
        }
        if ($order)
        {
            foreach ($order as $key => $value):
                $query->orderBy($key,$value);
            endforeach;
        }
        if ($limit)
        {
            $query->limit($limit);
        }
        return $query->with($relations);

    }


    /**
     * @param string $column
     * @param array $values
     * @param array $order
     * @param array $relations
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Builder|mixed
     *
     */
    public function findWhereIn(string $column = '',array $values = [],array $order = [],array $relations = [],array $columns = ['*'])
    {
        $query = $this->model::query();
        if ($order)
        {
            foreach ($order as $key => $value):
                $query->orderBy($key,$value);
            endforeach;
        }
        return $query->with($relations)->whereIn($column,$values);

    }

}
