<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Exception\Domain\ValidationException;
use Billogram\Model\Item\Item as Model;
use Billogram\Model\Item\Items;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Item extends HttpApi
{
    /**
     * @param array $param
     *
     * @return string|array
     *
     * @see https://billogram.com/api/documentation#items_list
     */
    public function search(array $param = [])
    {
        $param = array_merge(['page' => 1, 'page_size' => 100], $param);
        $response = $this->httpget('/item', $param);
        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, Items::class);
    }

    /**
     * @param int   $itemNo
     * @param array $param
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @see https://billogram.com/api/documentation#items_fetch
     */
    public function fetch(int $itemNo, array $param = [])
    {
        $response = $this->httpGet('/item/'.$itemNo, $param);
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
     * @param Model $item
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#items_create
     */
    public function create(Model $item)
    {
        $response = $this->httpPost('/item', $item->toArray());
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
     * @param int   $itemNo
     * @param Model $item
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#items_edit
     */
    public function update(int $itemNo, Model $item)
    {
        $response = $this->httpPut('/item/'.$itemNo, $item->toArray());
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
     * @param int   $itemNo
     * @param Model $item
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#items_delete
     */
    public function delete(int $itemNo, Model $item)
    {
        $response = $this->httpDelete('/item/'.$itemNo, $item->toArray());
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
