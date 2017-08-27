<?php

declare(strict_types=1);

namespace Billogram\Model\Report;

use Billogram\Model\CreatableFromArray;

class ReportCollection implements CreatableFromArray
{
    /**
     * @var Report[]
     */
    private $reports;

    /**
     * @param Report[] $reports
     */
    private function __construct(array $reports)
    {
        $this->reports = $reports;
    }

    public static function createFromArray(array $data)
    {
        $reports = [];
        if (isset($data['data'])) {
            foreach ($data['data'] as $report) {
                $reports[] = Report::createFromArray(['data' => $report]);
            }
        }

        return new self($reports);
    }

    /**
     * @return Report[]
     */
    public function getReports()
    {
        return $this->reports;
    }
}
