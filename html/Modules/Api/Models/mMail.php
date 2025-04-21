<?php
namespace Modules\Api\Models;

use PDO;
use PDOException;

use App\Core\Database;

use App\Core\NewException;

class mMail extends Database
{
  public function __construct()
  {
    parent::__construct();
  }