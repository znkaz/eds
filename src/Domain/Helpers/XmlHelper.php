<?php

namespace ZnKaz\Eds\Domain\Helpers;

use phpseclib\File\X509;
use ZnLib\Components\Format\Encoders\XmlEncoder;

use ZnCore\Text\Helpers\TextHelper;
use ZnCrypt\Base\Domain\Exceptions\CertificateExpiredException;
use ZnCrypt\Base\Domain\Exceptions\FailCertificateSignatureException;

class XmlHelper
{

    public static function extractCertificateFromXml(string $xml)
    {
        $xmlEncoder = new XmlEncoder();
        $arr = $xmlEncoder->decode($xml);

//        $certContent = $arr['response']['ds:Signature']['ds:KeyInfo']['ds:X509Data']['ds:X509Certificate'];
        $certContent = $arr['root']['ds:Signature']['ds:KeyInfo']['ds:X509Data']['ds:X509Certificate'];
        return $certContent;
    }
    
    /*private function extractDataXml(string $xml): array
    {
        $xmlEncoder = new XmlEncoder();
        $xmlEncoder->setIsInline(false);
        $data = $xmlEncoder->decode($xml);
        unset($data['root']['ds:Signature']);
        return $data;
    }*/

    public static function isEqualXml(string $orginalXml, string $signedXml): bool
    {
        //dd(self::prepareXml($orginalXml), self::prepareXml(XmlHelper::removeSignature($signedXml)));
        return self::prepareXml($orginalXml) == self::prepareXml(XmlHelper::removeSignature($signedXml));
    }

    public static function prepareXml(string $xml): string {
        $xml = TextHelper::removeDoubleSpace($xml);
        $xml = trim($xml);
        $xml = str_replace("\r\n", "\n", $xml);
        return $xml;
    }

    public static function removeSignature(string $xml): string
    {
        $pattern = '/<ds:(Signature[\s\S]+<\/ds:Signature>)/i';
        $replacement = '';
        $xml = preg_replace($pattern, $replacement, $xml);
        return $xml;
    }
}
