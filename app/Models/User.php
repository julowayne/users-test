<?php

namespace App\Models;

Class User extends Model
{
  public $id;
  public $created_at;
  public $updated_at;
  public $first_name;
  public $last_name;
  public $email;
  protected $password;

  protected $dates = ['created_at', 'updated_at'];

  public function __toString()
  {
    return json_encode($this);
  }

  
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }


  public function getCreatedAt()
  {
    return $this->created_at;
  }
  public function setCreatedAt($created_at)
  {
    $this->created_at = $created_at;

    return $this;
  }


  public function getFirstName()
  {
    return $this->first_name;
  }
  public function setFirstName($first_name)
  {
    $this->first_name = $first_name;

    return $this;
  }


  public function getLastName()
  {
    return $this->last_name;
  }
  public function setLastName($last_name)
  {
    $this->last_name = $last_name;

    return $this;
  }


  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }


  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }


  public function getUpdatedAt()
  {
    return $this->updated_at;
  }


  public function setUpdatedAt($updated_at)
  {
    $this->updated_at = $updated_at;

    return $this;
  }

  function getFullName(){
    return $this->first_name .' '.  $this->last_name;
  }
}