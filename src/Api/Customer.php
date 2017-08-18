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
     * @return string|array
     *
     * @see https://billogram.com/api/documentation#customers_list
     */
    public function search(array $param = [])
    {
        $param = array_merge(['page' => 1, 'page_size' => 100], $param);
        $response = $this->httpGet('/customer', $param);
        if (!$this->hydrator) {
            return $response;
        }
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, CustomerCollection::class);
    }

    /**
     * @param int   $customerNo
     * @param array $param
     *
     * @return Model|ResponseInterface
     *
     * @throws NotFoundException
     *
     * @see https://billogram.com/api/documentation#customers_fetch
     */
    public function fetch(int $customerNo, array $param = [])
    {
        $response = $this->httpGet('/customer/'.$customerNo, $param);
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
     * @param Model $customer
     *
     * @return Model|ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#customers_create
     */
    public function create(Model $customer)
    {
        $response = $this->httpPost('/customer', $customer->toArray());
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
     * @param int   $customerNo
     * @param Model $customer
     *
     * @return Model|ResponseInterface
     *
     * @throws NotFoundException
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#customers_edit
     */
    public function update(int $customerNo, Model $customer)
    {
        $response = $this->httpPut('/customer/'.$customerNo, $customer->toArray());
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
