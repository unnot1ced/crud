<?php

class Attraction
{
    public $id;
    public $naam;
    public $datum;
    public $uur;
    public $aantal_bezoekers;
    public $gem_wachttijd;
    private $conn;
    private $table_name = "lego";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['ID'];
            $this->naam = $row['naam'];
            $this->datum = $row['datum'];
            $this->uur = $row['uur'];
            $this->aantal_bezoekers = $row['aantal_bezoekers'];
            $this->gem_wachttijd = $row['gem_wachttijd'];
            return true;
        }

        return false;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " 
                  (naam, datum, uur, aantal_bezoekers, gem_wachttijd) 
                  VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->naam = htmlspecialchars(strip_tags($this->naam));
        $this->datum = htmlspecialchars(strip_tags($this->datum));
        $this->uur = htmlspecialchars(strip_tags($this->uur));
        $this->aantal_bezoekers = htmlspecialchars(strip_tags($this->aantal_bezoekers));
        $this->gem_wachttijd = htmlspecialchars(strip_tags($this->gem_wachttijd));

        $stmt->bindParam(1, $this->naam);
        $stmt->bindParam(2, $this->datum);
        $stmt->bindParam(3, $this->uur);
        $stmt->bindParam(4, $this->aantal_bezoekers);
        $stmt->bindParam(5, $this->gem_wachttijd);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
