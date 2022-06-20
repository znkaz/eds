<?php

namespace ZnKaz\Eds\Domain\Services;

use ZnKaz\Eds\Domain\Interfaces\Services\LogServiceInterface;
use ZnCore\Base\Libs\EntityManager\Interfaces\EntityManagerInterface;
use ZnKaz\Eds\Domain\Interfaces\Repositories\LogRepositoryInterface;
use ZnCore\Base\Libs\Service\Base\BaseCrudService;
use ZnKaz\Eds\Domain\Entities\LogEntity;

/**
 * @method LogRepositoryInterface getRepository()
 */
class LogService extends BaseCrudService implements LogServiceInterface
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass() : string
    {
        return LogEntity::class;
    }


}

