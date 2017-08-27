<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Exception\Domain\NotFoundException;
use Billogram\Exception\Domain\ValidationException;
use Billogram\Model\Customer\Customer as Model;
use Billogram\Model\Customer\CustomerCollection;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Customer extends HttpApi
{
    /**
     * @param array $param
     *
     * @return CustomerCollection|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#customers_list
     */
    public function search(array $param = [])
    {
        $param = array_merge(['page' => 1, 'page_size' => 100], $param);
        $response = $this->httpGet('/customer', $param);

        return $this->handleResponse($response, CustomerCollection::class);
    }

    /**
     * @param int $customerNo
     *
     * @return Model|ResponseInterface
     *
     * @throws NotFoundException
     *
     * @see https://billogram.com/api/documentation#customers_fetch
     */
    public function fetch(int $customerNo)
    {
        $response = $this->httpGet('/customer/'.$customerNo);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param array $customer
     *
     * @return Model|ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#customers_create
     */
    public function create(array $customer)
    {
        $response = $this->httpPost('/customer', $customer);

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param int   $customerNo
     * @param array $customer
     *
     * @return Model|ResponseInterface
     *
     * @throws NotFoundException
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#customers_edit
     */
    public function update(int $customerNo, array $customer)
    {
        $response = $this->httpPut('/customer/'.$customerNo, $customer);

        return $this->handleResponse($response, Model::class);
    }
}
