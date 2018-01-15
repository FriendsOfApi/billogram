<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Model\Invoice\Invoice as Model;
use Billogram\Model\Invoice\InvoiceCollection;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Invoice extends HttpApi
{
    /**
     * @param array $param
     *
     * @return InvoiceCollection|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_list
     */
    public function search(array $param = [])
    {
        $param = array_merge(['page' => 1, 'page_size' => 100], $param);
        $response = $this->httpGet('/billogram', $param);

        return $this->handleResponse($response, InvoiceCollection::class);
    }

    /**
     * @param string $invoiceId
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_fetch
     */
    public function fetch(string $invoiceId)
    {
        $response = $this->httpGet('/billogram/'.$invoiceId);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param array $invoice
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     *
     * @throws \Billogram\Exception
     */
    public function create(array $invoice)
    {
        $response = $this->httpPost('/billogram', $invoice);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     * @param array  $invoice
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_update
     *
     * @throws \Billogram\Exception
     */
    public function update(string $invoiceId, array $invoice)
    {
        $response = $this->httpPut('/billogram/'.$invoiceId, $invoice);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     * @param string $method
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_send
     *
     * @throws \Billogram\Exception
     */
    public function send(string $invoiceId, $method = null)
    {
        $params = [];
        if (null !== $method) {
            $params = ['method' => $method];
        }
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/send', $params);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     * @param string $method
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_resend
     *
     * @throws \Billogram\Exception
     */
    public function resend(string $invoiceId, $method = null)
    {
        $params = [];
        if (null !== $method) {
            $params = ['method' => $method];
        }

        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/resend', $params);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_collect
     *
     * @throws \Billogram\Exception
     */
    public function collect(string $invoiceId)
    {
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/collect', []);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     * @param float  $amount
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_payment
     *
     * @throws \Billogram\Exception
     */
    public function manualRegister(string $invoiceId, float $amount)
    {
        $params = ['amount' => $amount];
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/payment', $params);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     * @param string $mode
     * @param float  $amount
     * @param string $method
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_credit
     *
     * @throws \Billogram\Exception
     */
    public function credit(string $invoiceId, string $mode, float $amount, string $method)
    {
        $params = [
            'mode' => $mode,
            'amount' => $amount,
            'method' => $method,
        ];
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/credit', $params);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_writeoff
     *
     * @throws \Billogram\Exception
     */
    public function writeOff(string $invoiceId)
    {
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/writeoff');

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_writedown
     *
     * @throws \Billogram\Exception
     */
    public function writeDown(string $invoiceId)
    {
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/writedown');

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_writedown
     *
     * @throws \Billogram\Exception
     */
    public function writeDownRevert(string $invoiceId)
    {
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/revert-writedown');

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param string $invoiceId
     * @param string $message
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_writedown
     *
     * @throws \Billogram\Exception
     */
    public function addMessage(string $invoiceId, string $message)
    {
        $params = ['message' => $message];
        $response = $this->httpPost('/billogram/'.$invoiceId.'/command/message', $params);

        return $this->handleResponse($response, Model::class);
    }
}
