<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Model\LogoType\LogoType as Model;
use Psr\Http\Message\ResponseInterface;

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

        return $this->handleResponse($response, Model::class);
    }

    /**
     * @param array $logoType
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#logotype_calls
     */
    public function upload(array $logoType)
    {
        $response = $this->httpPost('/logotype', $logoType);

        return $this->handleResponse($response, Model::class);
    }
}
