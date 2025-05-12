<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Músics destacats</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 2rem;
        }
        img {
            max-width: 300px;
            height: auto;
            display: block;
            margin-bottom: 1rem;
        }
        li {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <h1>Músics destacats</h1>
    <ul>
        <?php foreach ($musics as $music): ?>
            <li>
                <h3><?= htmlspecialchars($music['name']) ?></h3>
                <p><strong>Any de naixement:</strong> <?= htmlspecialchars($music['birth_year']) ?></p>
                <p><strong>Gèneres:</strong> <?= htmlspecialchars($music['genres']) ?></p>
                <p><strong>Biografia:</strong> <?= htmlspecialchars($music['biography']) ?></p>
                <?php if (!empty($music['images'])): ?>
                    <img src="<?= htmlspecialchars($music['images']) ?>" alt="<?= htmlspecialchars($music['name']) ?>">
                <?php endif; ?>
                <p><strong>Obra destacada:</strong> <?= htmlspecialchars($music['notable_work']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
