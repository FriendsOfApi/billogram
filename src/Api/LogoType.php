<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Model\LogoType\LogoType as Model;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class LogoType extends HttpApi
{
    /**
     * @return string|array
     *
     * @see https://billogram.com/api/documentation#logotype_calls
     */
    public function get()
    {
        $response = $this->httpGet('/logotype');
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
     * @param Model $logoType
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @see https://billogram.com/api/documentation#logotype_calls
     */
    public function upload(Model $logoType)
    {
        $response = $this->httpPost('/logotype', $logoType->toArray());
        if (!$this->hydrator) {
            return $response;
        }

        return $this->hydrator->hydrate($response, Model::class);
    }
}
