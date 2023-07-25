<?php

namespace App\Controllers;

use App\Models\Events;
use Database\DBConnection;

class EventController extends Controller {
    protected $eventModel;
    protected $calendarService;
    protected $dbConnection;

    public function __construct(DBConnection $dbConnection, $calendarService) {
        $this->dbConnection = $dbConnection;
        $this->eventModel = new Events($dbConnection);
        $this->calendarService = $calendarService;
    }

    public function createEvent($name, $description, $roomId, $memberId, $date, $startTime, $endTime) {
        $event = new Events($this->dbConnection);

        $event->name = $name;
        $event->description = $description;
        $event->roomId = $roomId;
        $event->memberId = $memberId;
        $event->date = $date;
        $event->startTime = $startTime;
        $event->endTime = $endTime;

        if($event->save()) {
            $this->calendarService->createCalendarEvent($event);
            return true;
        } else {
            return false;
        }
    }

    public function updateEvent($id, $name, $description, $roomId, $memberId, $date, $startTime, $endTime) {
        $event = $this->eventModel->find($id);

        if($event) {
            $event->name = $name;
            $event->description = $description;
            $event->roomId = $roomId;
            $event->memberId = $memberId;
            $event->date = $date;
            $event->startTime = $startTime;
            $event->endTime = $endTime;

            if($event->save()) {
                $this->calendarService->updateCalendarEvent($event);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteEvent($id) {
        if($this->eventModel->delete($id)) {
            $this->calendarService->deleteCalendarEvent($id);
            return true;
        } else {
            return false;
        }
    }

    public function getAllEvents() {
        return $this->eventModel->getAll();
    }

    public function showCalendar() {
        $this->isLogged();
        $events = $this->eventModel->getAll();
        $this->render('calendar', ['events' => $events]);
    }
}
