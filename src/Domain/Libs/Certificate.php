<?php

namespace ZnKaz\Eds\Domain\Libs;

use phpseclib\File\X509;
use ZnCrypt\Base\Domain\Exceptions\CertificateExpiredException;
use ZnCrypt\Base\Domain\Exceptions\FailCertificateSignatureException;

class Certificate
{

    //private $x509;
    private $ca;

    /*public function __construct()
    {
        $this->x509 = new X509();
    }*/

    public function setCa(string $ca): void
    {
        $this->ca = $ca;
    }

    public function verify(string $certificate): void
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
