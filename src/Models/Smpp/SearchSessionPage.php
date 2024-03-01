<?php

namespace TelQ\Sdk\Models\Smpp;

use TelQ\Sdk\Models\BaseModel;

class SearchSessionPage extends BaseModel
{
    /** @var SearchSession[] */
    private $content = [];

    /** @var int */
    private $totalElements;

    /** @var int */
    private $totalPages;

    /**
     * @return SearchSession[]
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param SearchSession[] $content
     */
    public function setContent(array $content): void
    {
        $values = [];
        foreach ($content as $item) {
            $values[] = is_array($item) ? SearchSession::fromArray($item) : $item;
        }
        $this->content = $values;
    }

    /**
     * @return int
     */
    public function getTotalElements(): int
    {
        return $this->totalElements;
    }

    /**
     * @param int $totalElements
     */
    public function setTotalElements(int $totalElements): void
    {
        $this->totalElements = $totalElements;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @param int $totalPages
     */
    public function setTotalPages(int $totalPages): void
    {
        $this->totalPages = $totalPages;
    }

    protected static function getProperties()
    {
        return ['content', 'totalElements', 'totalPages'];
    }
}