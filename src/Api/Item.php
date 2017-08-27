<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Exception\Domain\ValidationException;
use Billogram\Model\Item\Item as Model;
use Billogram\Model\Item\CollectionItem;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Item extends HttpApi
{
    /**
     * @param array $param
     *
     * @return CollectionItem|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#items_list
     */
    public function search(array $param = [])
    {
        $param = array_merge(['page' => 1, 'page_size' => 100], $param);
        $response = $this->httpGet('/item', $param);
        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, CollectionItem::class);
    }

    /**
     * @param string $itemNo
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#items_fetch
     */
    public function fetch(string $itemNo)
    {
        $response = $this->httpGet('/item/'.$itemNo);
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
     * @return Model|ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#items_create
     */
    public function create(array $item)
    {
        $response = $this->httpPost('/item', $item);
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
     * @param string $itemNo
     * @param array  $item
     *
     * @return Model|ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#items_edit
     */
    public function update(string $itemNo, array $item)
    {
        $response = $this->httpPut('/item/'.$itemNo, $item);
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
     * @param string $itemNo
     *
     * @return Model|ResponseInterface
     *
     * @throws ValidationException
     *
     * @see https://billogram.com/api/documentation#items_delete
     */
    public function delete(string $itemNo)
    {
        $response = $this->httpDelete('/item/'.$itemNo);
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
