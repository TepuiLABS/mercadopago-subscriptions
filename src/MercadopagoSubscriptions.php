<?php

namespace Tepuilabs\MercadopagoSubscriptions;

use Illuminate\Support\Facades\Http;

class MercadopagoSubscriptions
{
    public const BASE_URL = 'https://api.mercadopago.com';

    /**
     *
     * @param string $token
     * @param array $params
     * @return array|mixed
     */
    public function createPlan(string $token, array $params)
    {
        return $this->makeHttpPostRequest($token, $params, '/preapproval_plan');
    }

    /**
     *
     * @param string $token
     * @param array $params
     * @return array|mixed
     */
    public function createSubs(string $token, array $params)
    {
        return $this->makeHttpPostRequest($token, $params, '/preapproval');
    }

    /**
     *
     * @param string $token
     * @param array $params
     * @return array|mixed
     */
    public function searchSubs(string $token, array $params)
    {
        return $this->makeHttpPostRequest($token, $params, '/preapproval/search');
    }

    /**
     *
     * @param string $token
     * @param array $params
     * @param string $approvalId
     * @return array|mixed
     */
    public function updateSubs(string $token, array $params, $approvalId)
    {
        return $this->makeHttpPostRequest($token, $params, "/preapproval/{$approvalId}", 'put');
    }

    /**
     *
     * @param string $token
     * @param array $params
     * @param string $path
     * @return array|mixed
     */
    private function makeHttpGetRequest(string $token, array $params, $path = '')
    {
        return Http::withToken($token)
            ->get(self::BASE_URL . $path, $params)
            ->json();
    }

    /**
     *
     * @param string $token
     * @param array $params
     * @param string $path
     * @return array|mixed
     */
    private function makeHttpPostRequest(string $token, array $params, $path = '', $method = 'post')
    {
        return Http::withToken($token)
            ->withBody(json_encode($params), 'application/json')
            ->$method(self::BASE_URL . $path)
            ->json();
    }
}
