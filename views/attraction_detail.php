<?php

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->attraction->naam; ?> - Details</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="attraction-banner">
        <div class="attraction-name"><?php echo $this->attraction->naam; ?></div>
    </div>

    <h1>Attractie Details</h1>

    <div class="detail-item" style="--item-index: 0;">
        <span class="detail-label">ID:</span>
        <span class="detail-value"><?php echo $this->attraction->id; ?></span>
    </div>

    <div class="detail-item" style="--item-index: 1;">
        <span class="detail-label">Naam:</span>
        <span class="detail-value"><?php echo $this->attraction->naam; ?></span>
    </div>

    <div class="detail-item" style="--item-index: 2;">
        <span class="detail-label">Datum:</span>
        <span class="detail-value"><?php echo $this->attraction->datum; ?></span>
    </div>

    <div class="detail-item" style="--item-index: 3;">
        <span class="detail-label">Uur:</span>
        <span class="detail-value"><?php echo $this->attraction->uur; ?></span>
    </div>

    <div class="detail-item" style="--item-index: 4;">
        <span class="detail-label">Aantal Bezoekers:</span>
        <span class="detail-value"><?php echo $this->attraction->aantal_bezoekers; ?></span>
    </div>

    <div class="detail-item" style="--item-index: 5;">
        <span class="detail-label">Gem. Wachttijd:</span>
        <span class="detail-value"><?php echo $this->attraction->gem_wachttijd; ?> min</span>
    </div>

    <a href="index.php" class="back-button">Terug naar home</a>
</div>
</body>
</html>
