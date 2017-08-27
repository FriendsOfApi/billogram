<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Model\Setting\Setting;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Ibrahim Hizeoui <ibrahimhizeoui@gmail.com>
 */
class Settings extends HttpApi
{
    /**
     * @return Setting|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#settings_fetch
     */
    public function fetch()
    {
        $response = $this->httpGet('/settings');
        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, Setting::class);
    }

    /**
     * @param array $setting
     *
     * @return Setting|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#settings_fetch
     */
    public function update(array $setting)
    {
        $response = $this->httpPUT('/settings', $setting);
        if (!$this->hydrator) {
            return $response;
        }
        // Use any valid status code here
        if ($response->getStatusCode() !== 200) {
            $this->handleErrors($response);
        }

        return $this->hydrator->hydrate($response, Setting::class);
    }
}
