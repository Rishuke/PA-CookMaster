<?php

namespace App\Models;

use Database\DBConnection;

class Events extends Model
{
    private $id;
    private $name;
    private $description;
    private $roomId;
    private $memberId;
    private $date;
    private $startTime;
    private $endTime;

    protected $db;

    public function __construct(DBConnection $db) {
        $this->db = $db;
    }

    public function save() {
        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'room_id' => $this->roomId,
            'member_id' => $this->memberId,
            'date' => $this->date,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime
        ];

        if ($this->id) {
            // update
            $this->db->update('events', $data, $this->id);
        } else {
            // create
            $this->db->insert('events', $data);
        }
    }

    public function find($id) {
        $result = $this->db->select('events', ['id' => $id]);
        if ($result) {
            $event = new Events($this->db);
            $event->id = $result['id'];
            $event->name = $result['name'];
            $event->description = $result['description'];
            $event->roomId = $result['room_id'];
            $event->memberId = $result['member_id'];
            $event->date = $result['date'];
            $event->startTime = $result['start_time'];
            $event->endTime = $result['end_time'];

            return $event;
        }

        return null;
    }

    public function getAll() {
        $results = $this->db->selectAll('events');
        $events = [];
        foreach ($results as $result) {
            $event = new Events($this->db);
            $event->id = $result['id'];
            $event->name = $result['name'];
            $event->description = $result['description'];
            $event->roomId = $result['room_id'];
            $event->memberId = $result['member_id'];
            $event->date = $result['date'];
            $event->startTime = $result['start_time'];
            $event->endTime = $result['end_time'];

            $events[] = $event;
        }

        return $events;
    }

    public function delete($id) {
        return $this->db->delete('events', $id);
    }
}


