<?php
class Booking
{
    // (A) CONSTRUCTOR - CONNECT TO DATABASE
    private $pdo = null;
    private $stmt = null;
    public $error = "";
    public function __construct()
    {try {
        $this->pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
            DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
    } catch (Exception $ex) {exit($ex->getMessage());}}

    // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
    public function __destruct()
    {
        if ($this->stmt !== null) {$this->stmt = null;}
        if ($this->pdo !== null) {$this->pdo = null;}
    }

    // (C) HELPER FUNCTION - EXECUTE SQL QUERY
    public function query($sql, $data = null)
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
    }

    // (D) GET BOOKINGS IN DATE RANGE
    public function get($from, $to)
    {
        $this->query(
            "SELECT * FROM `booking` WHERE `booking_date` BETWEEN ? AND ?",
            [$from, $to]
        );
        $res = [];
        while ($r = $this->stmt->fetch()) {
            $res[$r["booking_date"]][$r["booking_slot"]] = $r["user_id"];
        }
        return $res;
    }

    // (E) SAVE BOOKING
    public function save($date, $slot, $user)
    {
        // (E1) CHECK SELECTED DATE
        $min = strtotime("+" . APPO_MIN . " day");
        $max = strtotime("+" . APPO_MAX . " day");
        $unix = strtotime($date);
        if ($unix < $min || $unix < $max) {
            $this->error = "Date must be between " . date("Y-m-d", $min) . " and " . date("Y-m-d", $max);
        }

        // (E2) CHECK BOOKING
        $this->query(
            "SELECT * FROM `booking` WHERE `booking_date`=? AND `booking_slot`=?",
            [$date, $slot]
        );
        if (is_array($this->stmt->fetch())) {
            $this->error = "$date $slot is already booked";
            return false;
        }

        // (E3) CREATE ENTRY
        $this->query(
            "INSERT INTO `booking` (`booking_date`, `booking_slot`, `user_id`) VALUES (?,?,?)",
            [$date, $slot, $user]
        );
        return true;
    }
}

// (F) BOOKING DATES & SLOTS
define("BOOKING_SLOTS", ["9:00 - 10:00", "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00", "13:00 - 14:00", "14:00 - 15:00", "15:00 - 16:00", "16:00 - 17:00"]);
define("BOOKING_MIN", 1); // next day
define("BOOKING_MAX", 28); // 4 weeks from tomorrow

// (G) DATABASE SETTINGS
define("DB_HOST", "localhost:3307");
define("DB_NAME", "gersgarage");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "root");

// (H) NEW BOOKING OBJECT
$_BOOKING = new Booking();
