<?php

namespace Omnipay\Rede;

use Omnipay\Common\Message\AbstractRequest;

class BaseRequest extends AbstractRequest
{
    /**
     * e.Rede API endpoint
     * @var string
     */
    protected string $endpoint = 'https://api.userede.com.br/erede/v1/transactions/';

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Default HTTP Method. Can be overridden
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function getApiPv(): string
    {
        return $this->getParameter('apiPv');
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->getParameter('apiToken');
    }


}