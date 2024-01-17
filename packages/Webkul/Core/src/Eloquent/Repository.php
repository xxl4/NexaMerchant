<?php

namespace Webkul\Core\Eloquent;

<<<<<<< HEAD
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

abstract class Repository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;

    /**
<<<<<<< HEAD
     * @var boolean
=======
     * @var bool
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected $cacheEnabled = false;

    /**
     * @param $method
<<<<<<< HEAD
     *
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return bool
     */
    public function allowedClean()
    {
        if (! isset($this->cleanEnabled)) {
<<<<<<< HEAD
            return config("repository.cache.clean.enabled", true);
=======
            return config('repository.cache.clean.enabled', true);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        }

        return $this->cleanEnabled;
    }

    /**
<<<<<<< HEAD
     * @param $method
     *
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return bool
     */
    protected function allowedCache($method)
    {
        $className = get_class($this);

        $cacheEnabled = config("repository.cache.repositories.{$className}.enabled", config('repository.cache.enabled', true));

        if (! $cacheEnabled) {
            return false;
        }

<<<<<<< HEAD
        $cacheOnly = isset($this->cacheOnly) ? $this->cacheOnly : config("repository.cache.repositories.{$className}.allowed.only", config("repository.cache.allowed.only", null));
        $cacheExcept = isset($this->cacheExcept) ? $this->cacheExcept : config("repository.cache.repositories.{$className}.allowed.except", config("repository.cache.allowed.only", null));
=======
        $cacheOnly = isset($this->cacheOnly) ? $this->cacheOnly : config("repository.cache.repositories.{$className}.allowed.only", config('repository.cache.allowed.only', null));
        $cacheExcept = isset($this->cacheExcept) ? $this->cacheExcept : config("repository.cache.repositories.{$className}.allowed.except", config('repository.cache.allowed.only', null));
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        if (is_array($cacheOnly)) {
            return in_array($method, $cacheOnly);
        }

        if (is_array($cacheExcept)) {
<<<<<<< HEAD
            return !in_array($method, $cacheExcept);
=======
            return ! in_array($method, $cacheExcept);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        }

        if (is_null($cacheOnly) && is_null($cacheExcept)) {
            return true;
        }

        return false;
    }

    /**
<<<<<<< HEAD
=======
     * @throws RepositoryException
     */
    public function resetModel()
    {
        $this->makeModel();

        return $this;
    }

    /**
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Find data by field and value
     *
     * @param  string  $field
     * @param  string  $value
     * @param  array  $columns
     * @return mixed
     */
    public function findOneByField($field, $value = null, $columns = ['*'])
    {
        $model = $this->findByField($field, $value, $columns = ['*']);

        return $model->first();
    }

    /**
     * Find data by field and value
     *
     * @param  string  $field
     * @param  string  $value
     * @param  array  $columns
     * @return mixed
     */
    public function findOneWhere(array $where, $columns = ['*'])
    {
        $model = $this->findWhere($where, $columns);

        return $model->first();
    }

    /**
     * Find data by id
     *
     * @param  int  $id
     * @param  array  $columns
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->find($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Find data by id
     *
     * @param  int  $id
     * @param  array  $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

<<<<<<< HEAD
     /**
     * Count results of repository
     *
     * @param  array  $where
=======
    /**
     * Count results of repository
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @param  string  $columns
     * @return int
     */
    public function count(array $where = [], $columns = '*')
    {
        $this->applyCriteria();
        $this->applyScope();

        if ($where) {
            $this->applyConditions($where);
        }

        $result = $this->model->count($columns);
        $this->resetModel();
        $this->resetScope();

        return $result;
    }

    /**
     * @param  string  $columns
     * @return mixed
     */
    public function sum($columns)
    {
        $this->applyCriteria();
        $this->applyScope();

        $sum = $this->model->sum($columns);
        $this->resetModel();

        return $sum;
    }

    /**
     * @param  string  $columns
     * @return mixed
     */
    public function avg($columns)
    {
        $this->applyCriteria();
        $this->applyScope();

        $avg = $this->model->avg($columns);
        $this->resetModel();

        return $avg;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
}
