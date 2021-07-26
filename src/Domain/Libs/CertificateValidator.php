<?php

namespace ZnKaz\Eds\Domain\Libs;

use phpseclib\File\X509;
use ZnCrypt\Base\Domain\Exceptions\CertificateExpiredException;
use ZnCrypt\Base\Domain\Exceptions\FailCertificateSignatureException;
use ZnCrypt\Pki\XmlDSig\Domain\Entities\HashEntity;

class CertificateValidator
{

    private $x509;
    private $ca;

    public function __construct()
    {
        $this->x509 = new X509();
    }

    public function setCa(string $ca)
    {
        $this->ca = $ca;
    }

    public function validate(string $certificate)
    {
        $x509 = new X509();
        $x509->loadCA($this->ca);
        $certArray = $x509->loadX509($certificate);
        if (!$x509->validateSignature()) {
            throw new FailCertificateSignatureException();
        }
        if (!$x509->validateDate()) {
            throw new CertificateExpiredException();
        }
    }
}
