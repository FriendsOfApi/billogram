<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Exception\Domain\ValidationException;
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

        return $this->hydrator->hydrate($response, InvoiceCollection::class);
    }

    /**
     * @param string $invoiceId
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     */
    public function fetch(string $invoiceId)
    {
        $response = $this->httpGet('/billogram/'.$invoiceId);
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
     * @param array $invoice
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     *
     * @throws ValidationException
     */
    public function create(array $invoice)
    {
        $response = $this->httpPost('/billogram', $invoice);
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
     * @param array  $invoice
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#billogram_call_create
     *
     * @throws ValidationException
     */
    public function update(string $invoiceId, array $invoice)
    {
        $response = $this->httpPut('/billogram/'.$invoiceId, $invoice);
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
