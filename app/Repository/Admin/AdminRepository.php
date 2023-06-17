<?php


namespace App\Repository\Admin;


use App\Models\Admin\Admin;
use App\Models\User\User;
use App\Repository\BaseRepository;


class AdminRepository extends BaseRepository
{

    /**
     * @var
     */
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
