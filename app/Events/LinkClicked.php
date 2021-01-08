<?php


namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class LinkClicked extends ShouldBeStored
{
    /** @var string */
    public $url;

    /** @var string */
    public $linkUuid;

    /** @var string */
    public $created_at;

    public function __construct(string $url, string $linkUuid, string $created_at)
    {
        $this->url = $url;
        $this->linkUuid = $linkUuid;
        $this->created_at = $created_at;
    }
}
