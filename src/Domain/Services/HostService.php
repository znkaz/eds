<?php

namespace ZnKaz\Eds\Domain\Services;

use ZnKaz\Eds\Domain\Interfaces\Services\HostServiceInterface;
use ZnCore\EntityManager\Interfaces\EntityManagerInterface;
use ZnKaz\Eds\Domain\Interfaces\Repositories\HostRepositoryInterface;
use ZnCore\Domain\Service\Base\BaseCrudService;
use ZnKaz\Eds\Domain\Entities\HostEntity;

/**
 * @method HostRepositoryInterface getRepository()
 */
class HostService extends BaseCrudService implements HostServiceInterface
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass() : string
    {
        return HostEntity::class;
    }


}

