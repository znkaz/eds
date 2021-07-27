<?php

namespace ZnKaz\Eds\Domain\Services;

use phpseclib\File\X509;
use ZnCore\Domain\Base\BaseCrudService;
use ZnCore\Domain\Interfaces\Libs\EntityManagerInterface;
use ZnCrypt\Base\Domain\Exceptions\CertificateExpiredException;
use ZnCrypt\Base\Domain\Exceptions\FailCertificateSignatureException;
use ZnKaz\Eds\Domain\Entities\CertificateEntity;
use ZnKaz\Eds\Domain\Interfaces\Repositories\CertificateRepositoryInterface;
use ZnKaz\Eds\Domain\Interfaces\Services\CertificateServiceInterface;

/**
 * @method CertificateRepositoryInterface getRepository()
 */
class CertificateService extends BaseCrudService implements CertificateServiceInterface
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->setEntityManager($em);
    }

    public function getEntityClass(): string
    {
        return CertificateEntity::class;
    }

    public function verifyByCa(string $certificate, string $ca): void
    {
        $x509 = new X509();
        $x509->loadCA($ca);
        $certArray = $x509->loadX509($certificate);
        if (!$x509->validateSignature()) {
            throw new FailCertificateSignatureException();
        }
        if (!$x509->validateDate()) {
            throw new CertificateExpiredException();
        }
    }
}
