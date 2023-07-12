<?php

namespace App\Models;

use Database\DBConnection;

class Address extends Model
{

    protected $table = 'addresses';


    public function getAddressById(int $id)
    {
        $result = $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
        return $result;
    }


    public function getLastId()
    {
        // Sélectionner la ligne avec l'ID le plus élevé
        $result = $this->query("SELECT MAX(id) as id FROM {$this->table}");

        // Si la requête a renvoyé un résultat, renvoyer l'ID, sinon renvoyer null
        return $result ? $result[0]->id : null;
    }
}
