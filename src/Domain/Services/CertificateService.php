<?php

namespace ZnKaz\Eds\Domain\Services;

use ZnKaz\Eds\Domain\Interfaces\Services\CertificateServiceInterface;
use ZnCore\Domain\Interfaces\Libs\EntityManagerInterface;
use ZnKaz\Eds\Domain\Interfaces\Repositories\CertificateRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;
use ZnKaz\Eds\Domain\Entities\CertificateEntity;

/**
 * @method CertificateRepositoryInterface getRepository()
 */
class CertificateService extends BaseCrudService implements CertificateServiceInterface
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass() : string
    {
        return CertificateEntity::class;
    }


}

