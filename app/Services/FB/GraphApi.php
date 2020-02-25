<?php

namespace App\Services\FB;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;
use Pv\RequestOut;

class GraphApi
{
    const GRAPH_URL = "https://graph.facebook.com/v6.0/me";
    private $accessToken;
    private $requestOut;

    public function __construct(String $accessToken,RequestOut $requestOut)
    {
        $this->accessToken = $accessToken;
        $this->requestOut = $requestOut;
    }

    public function getUserInfo()
    {
        $url = self::GRAPH_URL.'?fields=id,name,email&access_token='.$this->accessToken;
        $this->requestOut->setTargetUrl($url);
        try {
            return json_decode($this->requestOut->get(),1);
        } catch (ClientException $exception) {

            return null;
        } catch (\Exception $exception) {
            Log::error('error when using graph api', [
                'message' => $exception->getMessage(),
                'url' => $url
            ]);
        }

    }
}
