<?php

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropisch Eiland Attracties</title>
    <link rel="stylesheet" href="assets/style.css">
    <script>
        function confirmDelete(id, naam) {
            if (confirm("Zekers dat je  '" + naam + "' wilt verwijderen? :(")) {
                window.location.href = "index.php?action=delete&id=" + id;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Lava Lagoon tropisch eiland attracties</h1>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
        <div class="success-message">Attractie is succesvol toegevoegd!</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
        <div class="success-message">Attractie is verwijdert!</div>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'delete_failed'): ?>
        <div class="error-message">Oh nee.. Er is probleem opgetreden bij het verwijderen van de attractie :(</div>
    <?php endif; ?>

    <div class="button-container">
        <a href="index.php?action=add" class="add-button">Nieuwe Attractie Toevoegen</a>
    </div>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Datum</th>
            <th>Uur</th>
            <th>Aantal Bezoekers</th>
            <th>Gem. Wachttijd</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($attractions as $attraction): ?>
            <tr>
                <td><?php echo $attraction['ID']; ?></td>
                <td><?php echo $attraction['naam']; ?></td>
                <td><?php echo $attraction['datum']; ?></td>
                <td><?php echo $attraction['uur']; ?></td>
                <td><?php echo $attraction['aantal_bezoekers']; ?></td>
                <td><?php echo $attraction['gem_wachttijd']; ?> min</td>
                <td>
                    <a href="index.php?action=detail&id=<?php echo $attraction['ID']; ?>"
                       class="action-button view-button">Bekijken</a>
                    <a href="javascript:void(0);"
                       onclick="confirmDelete(<?php echo $attraction['ID']; ?>, '<?php echo addslashes($attraction['naam']); ?>')"
                       class="action-button delete-button">Verwijderen</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
