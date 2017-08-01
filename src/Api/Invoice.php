<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Exception\Domain\ValidationException;
use Billogram\Model\Invoice\Invoice as Model;
use Billogram\Model\Invoice\Invoices;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Invoice extends HttpApi
{
    /**
     * @param array $param
     *
     * @return string|array
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     */
    public function search(array $param = [])
    {
        $param = array_merge(['page' => 1, 'page_size' => 100], $param);
        $response = $this->httpGet('/billogram', $param);
        if (!$this->hydrator) {
            return $response;
        }

        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, Invoices::class);
    }

    /**
     * @param string $invoiceId
     * @param array  $param
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     */
    public function fetch(string $invoiceId, array $param = [])
    {
        $response = $this->httpGet('/billogram/'.$invoiceId, $param);
        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, Model::class);
    }

    /**
     * @param Model $invoice
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     *
     * @throws ValidationException
     */
    public function create(Model $invoice)
    {
        $response = $this->httpPost('/billogram', $invoice->toArray());
        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, Model::class);
    }

    /**
     * @param string $invoiceId
     * @param Model  $invoice
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     *
     * @throws ValidationException
     */
    public function update(string $invoiceId, Model $invoice)
    {
        $response = $this->httpPut('/billogram/'.$invoiceId, $invoice->toArray());
        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, Model::class);
    }
}
