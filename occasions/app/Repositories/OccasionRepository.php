<?php

namespace App\Repositories;

use App\Models\Occasion;
use App\Interfaces\OccasionInterface;
use DateTime;
use SimpleXMLElement;

class OccasionRepository implements OccasionInterface
{
    protected $data;
    public function __construct()
    {
        if (file_exists('C:\Users\annke\OneDrive\Desktop\Project\occasions\30.xml')) {

            $this->data = array();
            $xmlData = simplexml_load_file('C:\Users\annke\OneDrive\Desktop\Project\occasions\30.xml', 'SimpleXMLElement', LIBXML_NOCDATA);
            //$xmlData = new SimpleXMLElement($fileData);
            foreach ($xmlData as $event) {
                info($event);
                $o = new Occasion(
                    (string)$event->Eventname,
                    (string)$event->Starttime,
                    (string)$event->Endtime,
                    (string)$event->Roomname
                );
                $this->data[] = $o;
            }
        } else {
            exit('Failed to open an xml file');
        }
    }
    //write a function(or in the constructor) that fills in data with Occasion class instances made from the xml file 
    //pass that through others


    public function getAllOccasions(): array
    {

        return $this->data;
    }
    public function getAllTodaysOccasions(): array
    {
        $events = $this->data;
        $data = array();
        $today = date("Y-m-d");
        foreach ($events as $event) {
            $eventDate = date(strtotime($event->startTime));
            if ($eventDate > $today || $eventDate < $today) {
                $data[] = $event;
            }
        }
        return $data;
    }
    public function getOccasionsByRoomName($roomName): array
    {
        $events = $this->data;
        $data = array();
        $today = date("Y-m-d");
        foreach ($events as $event) {
            $eventDate = date(strtotime($event->startTime));
            if ($eventDate > $today || $eventDate < $today) {
                if ($event->roomName == $roomName) {
                    $data[] = $event;
                }
            }
        }
        return $data;
    }
    // public function getAllOccasions(): array
    // {
    //     $events = new SimpleXMLElement($this->data);
    //     $data = array();
    //     foreach ($events as $event) {
    //         $data = array_fill(0, $events->count(), $event);
    //     }
    //     return $data;
    // }
    // public function getAllTodaysOccasions(): array
    // {
    //     $events = new SimpleXMLElement($this->data);
    //     $data = array();
    //     $today = date("Y-m-d");
    //     foreach ($events as $event) {
    //         $eventDate = date(strtotime($event->Starttime));
    //         if ($eventDate > $today || $eventDate < $today) {
    //             $data[] = $event;
    //         }
    //     }
    //     return $data;
    // }
    // public function getOccasionsByRoomName($roomName): array
    // {
    //     $events = new SimpleXMLElement($this->data);
    //     $data = array();
    //     $today = date("Y-m-d");
    //     foreach ($events as $event) {
    //         $eventDate = date(strtotime($event->Starttime));
    //         if ($eventDate > $today || $eventDate < $today) {
    //             if ($events->event->Roomname == $roomName) {
    //                 $data[] = $event;
    //             }
    //         }
    //     }
    //     return $data;
    // }
}
