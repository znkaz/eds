<?php

namespace ZnKaz\Eds\Domain\Repositories\Eloquent;

use ZnLib\Db\Base\BaseEloquentCrudRepository;
use ZnKaz\Eds\Domain\Entities\HostEntity;
use ZnKaz\Eds\Domain\Interfaces\Repositories\HostRepositoryInterface;

class HostRepository extends BaseEloquentCrudRepository implements HostRepositoryInterface
{

    public function tableName() : string
    {
        return 'eds_crl_host';
    }

    public function getEntityClass() : string
    {
        return HostEntity::class;
    }


}

