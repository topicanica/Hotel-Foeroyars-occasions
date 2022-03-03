<?php

namespace App\Models;

class Occasion
{
    public string $eventName;
    public string $startTime;
    public string $endTime;
    public string $roomName;

    public function __construct(string $eventName, string $startTime, string $endTime, string $roomName)
    {
        $this->eventName = $eventName;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->roomName = $roomName;
    }
}
