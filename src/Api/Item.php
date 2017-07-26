<?php
declare(strict_types=1);

namespace Billogram\Api;


use Billogram\Exception\Domain\ValidationException;
use Billogram\Exception\InvalidArgumentException;
use \Billogram\Model\Item\Item as Model;

class Item extends HttpApi
{
    /**
     * @param array $param
     * @return string|array
     * @link https://billogram.com/api/documentation#items_list
     */
    public function search(array $param = ['page'=>1, 'page_size'=> 100 ])
    {
        $response= $this->httpget('/item', $param);

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
     * @param int $itemNo
     * @param array $param
     * @return mixed|\Psr\Http\Message\ResponseInterface
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
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws ValidationException
     */
    public function create(Model $item)
    {
        $response = $this->httpPost('/item', $item->toArray());
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

    /****/
    public function update(int $itemNo, Model $item)
    {

        $response = $this->httpPut('/item/'.$itemNo, $item->toArray());

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