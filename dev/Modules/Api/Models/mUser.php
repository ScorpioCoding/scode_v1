<?php

namespace Modules\Api\Models;

use PDO;
use PDOException;

use App\Core\Database;

use App\Core\NewException;
use RuntimeException;



class mUser extends Database
{

  public function __construct()
  {
    parent::__construct();
  }

  public static function countByRealm(string $realm): array
  {
    try {
      $query = "SELECT * FROM `user` WHERE `realm`=:realm";
      $dB = static::getdb();
      $stmt = $dB->prepare($query);
      $stmt->bindValue(':realm', $realm, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      return array(
        "state" => true,
        "data" => array($stmt->rowCount())
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function countByEmail(string $email): array
  {
    try {
      $query = "SELECT * FROM `user` WHERE `email`=:email";
      $dB = static::getdb();
      $stmt = $dB->prepare($query);
      $stmt->bindValue(':email', $email, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      return array(
        "state" => true,
        "data" => array($stmt->rowCount())
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }


  public static function countByToken($token): array
  {
    try {
      $query = "SELECT * FROM `user` WHERE `token`=:token LIMIT 1";
      $dB = static::getdb();
      $stmt = $dB->prepare($query);
      $stmt->bindValue(':token', $token, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      return array(
        "state" => true,
        "data" => array($stmt->rowCount())
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }


  public static function create($args = array()): array
  {
    try {
      $password = password_hash($args['psw'], PASSWORD_DEFAULT);

      $query = "INSERT INTO `user` (
      `id`, 
      `name`,
      `email`, 
      `validate`,
      `archive`,
      `realm`, 
      `pswhash`,
      `token`
      )
      VALUES (
      :id, 
      :name,
      :email,
      :validate,
      :archive,  
      :realm, 
      :pswhash,
      :token
      )";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', null, PDO::PARAM_NULL);
      $stmt->bindValue(':name', $args['name'], PDO::PARAM_STR);
      $stmt->bindValue(':email', $args['email'], PDO::PARAM_STR);
      $stmt->bindValue(':validate', $args['validate'], PDO::PARAM_STR);
      $stmt->bindValue(':archive', $args['archive'], PDO::PARAM_STR);
      $stmt->bindValue(':realm', $args['realm'], PDO::PARAM_STR);
      $stmt->bindValue(':token', $args['token'], PDO::PARAM_STR);
      $stmt->bindValue(':pswhash', $password, PDO::PARAM_STR);

      $stmt->execute();
      return array(
        "state" => true,
        "data" => array($dB->lastInsertId())
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }


  public static function readAll(): array|string
  {
    try {
      $query = "SELECT * FROM `user`";
      $dB = static::getdb();
      $stmt = $dB->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      return array(
        "state" => true,
        "data" => $stmt->fetchAll(),
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }


  public static function readByEmail($email): array
  {
    try {
      $query = "SELECT * FROM `user` WHERE `email` = :email LIMIT 1";
      $dB = static::getdb();
      $stmt = $dB->prepare($query);
      $stmt->bindValue(':email', $email, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      $stmt->execute();
      return array(
        "state" => true,
        "data" => $stmt->fetchAll(),
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }


  public static function readByRealm(string $realm): array
  {
    try {
      $query = "SELECT * FROM `user` WHERE `realm` = :realm LIMIT 1";
      $dB = static::getdb();
      $stmt = $dB->prepare($query);
      $stmt->bindValue(':realm', $realm, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      $stmt->execute();
      return array(
        "state" => true,
        "data" => $stmt->fetchAll(),
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function readByToken(string $token): array
  {
    try {
      $query = "SELECT * FROM `user` WHERE `token` = :token LIMIT 1";
      $dB = static::getdb();
      $stmt = $dB->prepare($query);
      $stmt->bindValue(':token', $token, PDO::PARAM_STR);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      $stmt->execute();
      return array(
        "state" => true,
        "data" => $stmt->fetchAll(),
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function update($args = array()): array
  {
    try {
      $query = "UPDATE `user` SET 
      `realm`=:realm, 
      `name`=:name, 
      `email`=:email, 
      `validate`=:validate, 
      `archive`=:archive, 
      `token`=:token
      WHERE `id`=:id";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', $args['id'], PDO::PARAM_INT);
      $stmt->bindValue(':realm', $args['realm'], PDO::PARAM_STR);
      $stmt->bindValue(':name', $args['name'], PDO::PARAM_STR);
      $stmt->bindValue(':email', $args['email'], PDO::PARAM_STR);
      $stmt->bindValue(':validate', $args['validate'], PDO::PARAM_STR);
      $stmt->bindValue(':archive', $args['archive'], PDO::PARAM_STR);
      $stmt->bindValue(':token', $args['token'], PDO::PARAM_STR);

      $stmt->execute();

      return array(
        "state" => true,
        "data" => array()
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }




  public static function updateName($args = array()): array
  {
    try {
      $query = "UPDATE `user` SET `name`=:name WHERE `id`=:id";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', $args['id'], PDO::PARAM_INT);
      $stmt->bindValue(':name', $args['name'], PDO::PARAM_STR);

      $stmt->execute();

      return array(
        "state" => true,
        "data" => array()
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function updateEmail($args = array()): array
  {
    try {
      $query = "UPDATE `user` SET 
      `email`=:email,
      `token`=:token 
      WHERE `id`=:id";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', $args['id'], PDO::PARAM_INT);
      $stmt->bindValue(':email', $args['email'], PDO::PARAM_STR);
      $stmt->bindValue(':token', $args['token'], PDO::PARAM_STR);

      $stmt->execute();

      return array(
        "state" => true,
        "data" => array()
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function updatePassword($args = array()): array
  {
    try {

      $password = password_hash($args['psw'], PASSWORD_DEFAULT);

      $query = "UPDATE `user` SET 
      `pswhash`=:pswhash,
      `token`=:token 
      WHERE `id`=:id";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', $args['id'], PDO::PARAM_INT);
      $stmt->bindValue(':pswhash', $password, PDO::PARAM_STR);
      $stmt->bindValue(':token', $args['token'], PDO::PARAM_STR);

      $stmt->execute();

      return array(
        "state" => true,
        "data" => array()
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function updateToken(object $user): array
  {
    try {
      $query = "UPDATE `user` SET `token`=:token WHERE `id`=:id";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', $user->id, PDO::PARAM_INT);
      $stmt->bindValue(':token', $user->token, PDO::PARAM_STR);

      $stmt->execute();

      return array(
        "state" => true,
        "data" => array()
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function updateArchive($args = array()): array
  {
    try {
      $query = "UPDATE `user` SET `archive`=:archive WHERE `id`=:id";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', $args['id'], PDO::PARAM_INT);
      $stmt->bindValue('archive', $args['archive'], PDO::PARAM_STR);

      $stmt->execute();

      return array(
        "state" => true,
        "data" => array()
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }

  public static function updateRealm($args = array()): array
  {
    try {
      $query = "UPDATE `user` SET `realm`=:realm WHERE `id`=:id";

      $dB = static::getdb();
      $stmt = $dB->prepare($query);

      $stmt->bindValue(':id', $args['id'], PDO::PARAM_INT);
      $stmt->bindValue(':realm', $args['realm'], PDO::PARAM_STR);

      $stmt->execute();

      return array(
        "state" => true,
        "data" => array()
      );
    } catch (PDOException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }
  }




  //HELPER FUNCTIONS


  public static function emailExists($email): bool
  {
    $user = static::getUserByEmail($email);
    if ($user) {
      return true;
    } else {
      return false;
    }
  }

  public static function isArchived($email): bool
  {
    $user = static::getUserByEmail($email);
    if ($user->archive > 0) {
      return true;
    } else {
      return false;
    }
  }

  public static function isValidated($email): bool
  {
    $user = static::getUserByEmail($email);
    if ($user->validate > 0) {
      return true;
    } else {
      return false;
    }
  }

  public static function getUserByEmail($email): object
  {

    $query = "SELECT * FROM `user` WHERE `email`=:email LIMIT 1";

    $dB = static::getdb();

    $stmt = $dB->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
    $stmt->execute();
    return $stmt->fetch();
  }

  public static function authenticate(string $email, string $psw): bool|object
  {
    //print_r($args['psw']);
    $user = static::getUserByEmail($email);
    //print_r($user);
    if ($user) {
      if ($user->archive == '0' || $user->archive == 'null')
        if ($user->validate == '1')
          if (true === password_verify($psw, $user->pswhash))
            return $user;
    }
    return false;

  }

  //
  //END CLASS
}