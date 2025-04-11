<?php

class AttractionController
{
    private $db;
    private $attraction;

    public function __construct($db)
    {
        $this->db = $db;
        $this->attraction = new Attraction($db);
    }

    public function index()
    {
        $stmt = $this->attraction->getAll();
        $attractions = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $attractions[] = $row;
        }

        include_once __DIR__ . '/../views/attractions.php';
    }

    public function detail($id)
    {
        if ($this->attraction->getById($id)) {
            include_once __DIR__ . '/../views/attraction_detail.php';
        } else {
            header("Location: index.php");
            exit;
        }
    }

    public function showAddForm()
    {
        include_once __DIR__ . '/../views/attraction_add.php';
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->attraction->naam = $_POST['naam'];
            $this->attraction->datum = $_POST['datum'];
            $this->attraction->uur = $_POST['uur'];
            $this->attraction->aantal_bezoekers = $_POST['aantal_bezoekers'];
            $this->attraction->gem_wachttijd = $_POST['gem_wachttijd'];

            if ($this->attraction->create()) {
                header("Location: index.php?msg=success");
                exit;
            } else {
                $error = "Er is een probleem opgetreden bij het toevoegen van de attractie.";
                include_once __DIR__ . '/../views/attraction_add.php';
            }
        }
    }

    public function delete($id)
    {
        $this->attraction->id = $id;

        if ($this->attraction->delete()) {
            header("Location: index.php?msg=deleted");
            exit;
        } else {
            header("Location: index.php?error=delete_failed");
            exit;
        }
    }
}
