<?php

declare(strict_types=1);

namespace Billogram\Api;

use Billogram\Model\Report\ReportCollection;
use Billogram\Model\Report\Report as Model;
use Psr\Http\Message\ResponseInterface;

/**
 * @see https://billogram.com/api/documentation#reports
 */
class Report extends HttpApi
{
    /**
     * @param array $param
     *
     * @return ReportCollection|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#reports_list
     */
    public function search(array $param = [])
    {
        $param = array_merge(['page' => 1, 'page_size' => 100], $param);
        $response = $this->httpGet('/report', $param);

        return $this->handleResponse($response, ReportCollection::class);
    }

    /**
     * @param string $fileName
     *
     * @return Model|ResponseInterface
     *
     * @see https://billogram.com/api/documentation#reports_fetch
     */
    public function fetch(string $fileName)
    {
        $response = $this->httpGet('/report/'.$fileName);

        return $this->handleResponse($response, Model::class);
    }
}
