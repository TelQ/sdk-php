<?php

namespace TelQ\Sdk\Http;

class CurlClient implements ClientInterface
{
    private $curlOptions = [
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ];

    public function __construct(array $curlOptions = [])
    {
        foreach ($curlOptions as $k => $v) {
            $this->curlOptions[$k] = $v;
        }
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $headers
     * @param string $body
     * @return Response
     */
    public function request($method, $url, array $headers, $body)
    {
        $ch = curl_init();
        curl_setopt_array($ch, $this->curlOptions);
        curl_setopt($ch, CURLOPT_URL, $url);

        if ($headers) {
            $sentHeaders = [];
            foreach ($headers as $k => $v) {
                $sentHeaders[] = $k . ': ' . $v;
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $sentHeaders);
        }

        $method = strtoupper($method);

        if ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        if ($body) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }
        $headersResponse = [];
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($curl, $header) use (&$headersResponse) {
            $len = strlen($header);
            $header = explode(':', $header, 2);
            if (count($header) < 2) {// ignore invalid headers
                return $len;
            }
            $name = trim($header[0]);
            if (!isset($headersResponse[$name])) {
                $headersResponse[$name] = [];
            }
            $headersResponse[$name][] = trim($header[1]);

            return $len;
        });

        $body = curl_exec($ch);

        if (($curlError = curl_errno($ch))) {
            $curlErrorText = curl_error($ch);
            curl_close($ch);
            throw new ClientException('CURL error ' . $curlError . ': ' . $curlErrorText);
        }

        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new Response($status, $headersResponse, $body ? (string) $body : '');
    }

}