<?php

namespace App\Interfaces;

interface OccasionInterface
{
    public function getAllOccasions(): array;
    public function getAllTodaysOccasions(): array;
    public function getOccasionsByRoomName($roomName): array;
}
