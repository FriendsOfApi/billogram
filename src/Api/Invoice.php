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
     * @throws ValidationException
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
     * @throws ValidationException
     */
    public function update(string $invoiceId, array $invoice)
    {
        $response = $this->httpPut('/billogram/'.$invoiceId, $invoice);

        return $this->handleResponse($response, Model::class);
    }

    // TODO add send stuff https://billogram.com/api/documentation#billogram_call_send
}
