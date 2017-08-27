<?php

declare(strict_types=1);

namespace Billogram\Model\LogoType;

use Billogram\Exception\Domain\ValidationException;
use Billogram\Model\CreatableFromArray;

class LogoType implements CreatableFromArray
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $fileType;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return LogoType
     */
    public function withContent(string $content)
    {
        $new = clone $this;
        $new->content = $content;

        return $new;
    }

    /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->fileType;
    }

    /**
     * @param string $fileType
     *
     * @return LogoType
     */
    public function withFileType(string $fileType)
    {
        $new = clone $this;
        $new->fileType = $fileType;

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

        $logoType = new self();
        $logoType->content = $data['content'] ?? null;
        $logoType->fileType = $data['file_type'] ?? null;

        return $logoType;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];
        if ($this->content !== null) {
            $data['content'] = $this->content;
        }
        if ($this->fileType !== null) {
            $data['file_type'] = $this->fileType;
        }

        return $data;
    }
}
