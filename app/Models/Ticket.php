<?php

declare(strict_types = 1);


namespace App\Models;

use App\Model;

class Ticket extends Model
{
    public function all()
    {
      $stmt = $this->db->query(
        'SELECT id, title, content
         FROM ticket'
      );

      return $this->fetchLazy($stmt);
    }
}