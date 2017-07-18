<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Api;
use Billogram\Exception\Domain\ValidationException;
use Billogram\Exception\InvalidArgumentException;
use Billogram\Model\Customer\Customer as Model;
use Billogram\Model\Customer\Customers;
use Billogram\Api\HttpApi;

class Customer extends HttpApi
{
    /**
     * @param array $param
     * @return string|array
     * @link https://billogram.com/api/documentation#customers_list
     */
    public function search(array $param = [])
    {
        if (empty($param)){
            $param = ['page'=>1, 'page_size'=> 100 ];

        }
        $response= $this->httpget('/customer', $param);

        if (!$this->hydrator) {
            return $response;
        }

        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }
        return $this->hydrator->hydrate($response, Customers::class);

    }

    /**
     *
     * @param int   $customerNo
     * @param array $param
     *
     *
     * @link https://billogram.com/api/documentation#customers_fetch
     * @return \Billogram\Model\Customer\Customer
     */
    public function fetch(int $customerNo, array $param = [])
    {
        if (empty($customerNo)) {
            throw new InvalidArgumentException('Id cannot be empty');
        }
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
     * @param Model $costumer
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws ValidationException
     */
    public function create(Model $costumer)
    {
        if (empty($costumer->toArray())) {
            throw new InvalidArgumentException('Message cannot be empty');
        }

        $response = $this->httpPost('/customer', $costumer->toArray());
        $body = $response->getBody()->__toString();

        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 201) {
            switch ($response->getStatusCode()) {
                case 400:
                    throw new ValidationException();
                    break;
                default:
                    $this->handleErrors($response);
                    break;
            }
        }
        return $this->hydrator->hydrate($response, Model::class);
    }

    /**
     * @param int $customerNo
     * @param Model $costumer
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws ValidationException
     */
    public function update(int $customerNo, Model $costumer)
    {
        if ($customerNo < 0) {
            throw new \InvalidArgumentException('Id is invalid');
        }
        $response = $this->httpPut('/customer/'.$customerNo, $costumer->toArray());

        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            switch ($response->getStatusCode()) {
                case 400:
                    throw new ValidationException();
                    break;
                default:
                    $this->handleErrors($response);
                    break;
            }
        }
        return $this->hydrator->hydrate($response, Model::class);
    }


}
