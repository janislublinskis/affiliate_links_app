<?php


namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class LinkClicked extends ShouldBeStored
{
    /** @var string */
    public $linkUuid;

    /** @var string */
    public $url;

    /** @var string */
    public $created_at;

    public function __construct(string $linkUuid, string $url, string $created_at)
    {
        $this->linkUuid = $linkUuid;
        $this->url = $url;
        $this->created_at = $created_at;
    }
}
