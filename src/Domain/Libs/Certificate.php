<?php

namespace ZnKaz\Eds\Domain\Libs;

use phpseclib\File\X509;
use ZnCrypt\Base\Domain\Exceptions\CertificateExpiredException;
use ZnCrypt\Base\Domain\Exceptions\FailCertificateSignatureException;

class Certificate
{

    private $ca;
    private $verifySignature = true;
    private $verifyDate = true;

    public function setCa(string $ca): void
    {
        $this->ca = $ca;
    }

    public function setVerifySignature(bool $verifySignature): void
    {
        $this->verifySignature = $verifySignature;
    }

    public function setVerifyDate(bool $verifyDate): void
    {
        $this->verifyDate = $verifyDate;
    }

    public function verify(string $certificate): void
    {
        $x509 = new X509();
        $x509->loadCA($this->ca);
        $certArray = $x509->loadX509($certificate);
        if ($this->verifySignature && !$x509->validateSignature()) {
            throw new FailCertificateSignatureException();
        }
        if ($this->verifyDate && !$x509->validateDate()) {
            throw new CertificateExpiredException();
        }
    }
}
