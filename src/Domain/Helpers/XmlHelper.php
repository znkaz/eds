<?php

namespace ZnKaz\Eds\Domain\Helpers;

use phpseclib\File\X509;
use ZnCore\Base\Encoders\XmlEncoder;
use ZnCore\Base\Helpers\StringHelper;
use ZnCrypt\Base\Domain\Exceptions\CertificateExpiredException;
use ZnCrypt\Base\Domain\Exceptions\FailCertificateSignatureException;

class XmlHelper
{

    private function extractDataXml(string $xml): array
    {
        $xmlEncoder = new XmlEncoder();
        $xmlEncoder->setIsInline(false);
        $data = $xmlEncoder->decode($xml);
        unset($data['root']['ds:Signature']);
        return $data;
    }

    public static function isEqualXml(string $orginalXml, string $signedXml): bool
    {
        return StringHelper::removeDoubleSpace($orginalXml) == StringHelper::removeDoubleSpace(XmlHelper::removeSignature($signedXml));
    }
    
    public static function removeSignature(string $xml): string
    {
        $pattern = '/<ds:(Signature[\s\S]+<\/ds:Signature>)/i';
        $replacement = '';
        $xml = preg_replace($pattern, $replacement, $xml);
        return $xml;
    }
}
