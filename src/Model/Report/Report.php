<?php

declare(strict_types=1);

namespace Billogram\Model\Report;

use Billogram\Exception\Domain\ValidationException;
use Billogram\Model\CreatableFromArray;

class Report implements CreatableFromArray
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $fileType;

    /**
     * @var string
     */
    private $info;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $content;

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     *
     * @return Report
     */
    public function withFilename(string $filename)
    {
        $new = clone $this;
        $new->filename = $filename;

        return $new;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Report
     */
    public function withType(string $type)
    {
        $new = clone $this;
        $new->type = $type;

        return $new;
    }

    /**
     * @return string
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param string $fileType
     *
     * @return Report
     */
    public function withFileType(string $fileType)
    {
        $new = clone $this;
        $new->fileType = $fileType;

        return $new;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     *
     * @return Report
     */
    public function withInfo(string $info)
    {
        $new = clone $this;
        $new->info = $info;

        return $new;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     *
     * @return Report
     */
    public function withCreatedAt(string $createdAt)
    {
        $new = clone $this;
        $new->createdAt = $createdAt;

        return $new;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Report
     */
    public function withContent(string $content)
    {
        $new = clone $this;
        $new->content = $content;

        return $new;
    }

    /**
     * Create an API response object from the HTTP response from the API server.
     *
     * @param array $data
     *
     * @return self
     *
     * @throws ValidationException
     */
    public static function createFromArray(array $data)
    {
        if ($data['status'] === 'INVALID_PARAMETER' && array_key_exists('message', $data['data'])) {
            throw new ValidationException($data['data']['message']);
        }
        $report = new self();
        $report->filename = $data['filename'] ?? null;
        $report->type = $data['type'] ?? null;
        $report->fileType = $data['file_type'] ?? null;
        $report->info = $data['info'] ?? null;
        $report->createdAt = isset($data['created_at']) ? new \DateTime($data['created_at']) : null;
        $report->content = $data['content'] ?? null;

        return $report;
    }

    public function toArray()
    {
        // TODO write me
    }
}
