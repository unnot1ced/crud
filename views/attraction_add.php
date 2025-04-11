<?php
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Attractie Toevoegen</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="attraction-banner">
        <div class="attraction-name">Nieuwe Attractie Toevoegen</div>
    </div>

    <h1>Attractie Toevoegen</h1>

    <?php if (isset($error)): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="index.php?action=create" method="post" class="add-form">
        <div class="form-group">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>
        </div>

        <div class="form-group">
            <label for="datum">Datum:</label>
            <input type="date" id="datum" name="datum" required>
        </div>

        <div class="form-group">
            <label for="uur">Uur:</label>
            <input type="time" id="uur" name="uur" required>
        </div>

        <div class="form-group">
            <label for="aantal_bezoekers">Aantal Bezoekers:</label>
            <input type="number" id="aantal_bezoekers" name="aantal_bezoekers" min="0" required>
        </div>

        <div class="form-group">
            <label for="gem_wachttijd">Gem. Wachttijd (minuten):</label>
            <input type="number" id="gem_wachttijd" name="gem_wachttijd" min="0" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-button">Opslaan</button>
            <a href="index.php" class="back-button">Annuleren</a>
        </div>
    </form>
</div>
</body>
</html>
