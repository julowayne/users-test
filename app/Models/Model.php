<?php 

namespace App\Models;

use Carbon\Carbon;

class Model
{
  function __construct(){
    foreach ($this->dates as $date) {
      $this->$date = Carbon::parse($this->$date);
    }
  }
}