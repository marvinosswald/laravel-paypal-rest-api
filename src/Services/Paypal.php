<?php

namespace Marvinosswald\LaravelPayPal\Services;
use Marvinosswald\LaravelPayPal\Contracts\PayPalContract;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;


class Paypal implements PayPalContract {
    /**
     * @var mixed|string
     */
    private $mode = 'live';
    /**
     * @var mixed
     */
    private $client_id;
    /**
     * @var mixed
     */
    private $client_secret;
    /**
     * @var ApiContext
     */
    private $apiContext;

    /**
     * Paypal constructor.
     */
    public function __construct() {
        $this->mode = env('PAYPAL_MODE');
        $this->client_id = env('PAYPAL_CLIENT_ID');
        $this->client_secret = env('PAYPAL_CLIENT_SECRET');
        if(!$this->client_id) {
            throw new \InvalidArgumentException('Please set PAYPAL_CLIENT_ID environment variable.');
        }
        if(!$this->client_secret) {
            throw new \InvalidArgumentException('Please set PAYPAL_CLIENT_SECRET environment variable.');
        }
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $this->client_id,
                $this->client_secret
            )
        );
    }

    /**
     * @return ApiContext
     */
    public function getApiContext(){
        return $this->apiContext;
    }
}