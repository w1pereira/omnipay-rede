<?php

namespace Omnipay\Rede;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return (isset($this->data['tid']) && in_array($this->data['returnCode'], ['00', '174']));
    }

    /**
     * @return string|null
     */
    public function getTransactionReference(): ?string
    {
       return $this->data['tid'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getNsuReference(): ?string
    {
        return $this->data['nsu'] ?? null;
    }

    /**
     * @return mixed|null
     */
    public function getCardHolderFirstDigits()
    {
        return $this->data['authorization']['cardBin'] ?? null;
    }

    /**
     * @return mixed|null
     */
    public function getCardHolderLastDigits()
    {
        return $this->data['authorization']['last4'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getReturnCode(): ?string
    {
        return isset($this->data['authorization']) ? $this->data['authorization']['returnCode'] :
            ($this->data['returnCode'] ?? null);
    }

    /**
     * @return array|null
     */
    public function getCaptureData(): ?array
    {
        if (isset($this->data['capture'])) {
            return [
                'capture_date' => $this->data['capture']['dateTime'],
                'nsu' => $this->data['capture']['nsu'],
                'amount' => $this->data['capture']['amount'],
                'brand_tid' => $this->data['capture']['brand_tid']
            ];
        }
        return null;
    }
}