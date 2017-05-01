<?php
class Database extends PDO {
    public function __construct() {
        parent::__construct('mysql:host=localhost;dbname=id1495092_bee', 'id1495092_chagarin', 'Ljvjajyk7273', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}
?>