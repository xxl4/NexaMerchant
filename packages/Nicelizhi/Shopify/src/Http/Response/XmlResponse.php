<?php
namespace Nicelizhi\Shopify\Http\Responses;

use Illuminate\Support\Facades\Response;

class XmlResponse
{
    public static function macro()
    {
        Response::macro('xml', function ($data, $status = 200, array $headers = [], $xmlRoot = 'response') {
            $xml = new \SimpleXMLElement('<?xml version="1.0"?><' . $xmlRoot . '></' . $xmlRoot . '>');

            self::arrayToXml($data, $xml);

            $headers = array_merge($headers, ['Content-Type' => 'application/xml']);

            return Response::make($xml->asXML(), $status, $headers);
        });
    }

    private static function arrayToXml($data, &$xml)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $key = 'item' . $key; // dealing with <0/>..<n/> issues
                }
                $subnode = $xml->addChild($key);
                self::arrayToXml($value, $subnode);
            } else {
                $xml->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}