<?php

$dbPath = __DIR__ . '/musicians.db';
$db = new SQLite3($dbPath, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

if (!$db) {
    die("Error de connexió: " . $db->lastErrorMsg());
}

$db->exec("DROP TABLE IF EXISTS musicians;");
$db->exec("CREATE TABLE IF NOT EXISTS musicians (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    biography TEXT NOT NULL,
    birth_year INTEGER,
    genres TEXT,
    images TEXT,
    notable_work TEXT
);");

$insert = $db->exec("INSERT INTO musicians (name, biography, birth_year, genres, images, notable_work) VALUES
    -- Catalans
    ('Sílvia Pérez Cruz', 'Cantautora catalana reconeguda per la seva veu expressiva i la fusió de flamenc, jazz i música tradicional.', 1983, 'Fusió, Flamenc, Jazz', 'https://upload.wikimedia.org/wikipedia/commons/b/b2/S%C3%ADlvia_P%C3%A9rez_Cruz_2013.jpg', 'Vestida de nit'),
    ('Txarango', 'Banda catalana que mescla reggae, rumba i música festiva amb missatges socials.', 2010, 'Reggae, Rumba, Mestissatge', 'https://upload.wikimedia.org/wikipedia/commons/0/06/Txarango_2014.jpg', 'Una lluna a l’aigua'),
    ('Roger Mas', 'Cantautor que combina música d’arrel amb poesia moderna.', 1975, 'Cançó d’autor, Folk', 'https://upload.wikimedia.org/wikipedia/commons/f/f3/Roger_Mas_%2810192393733%29.jpg', 'Llums de colors'),
    
    -- Internacionals
    ('Rosalía', 'Artista catalana amb projecció global, coneguda per reinventar el flamenc amb sons urbans.', 1992, 'Flamenc, Urbà, Pop', 'https://upload.wikimedia.org/wikipedia/commons/9/92/Rosalia_Motomami_World_Tour_2022.jpg', 'Malamente'),
    ('Kendrick Lamar', 'Raper nord-americà amb lletres profundes i una producció innovadora.', 1987, 'Hip-hop, Rap', 'https://upload.wikimedia.org/wikipedia/commons/f/f8/Kendrick_Lamar_2018.jpg', 'Alright'),
    ('Taylor Swift', 'Cantautora amb una trajectòria que abasta el country, pop i indie.', 1989, 'Pop, Country, Indie', 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Taylor_Swift_2023.jpg', 'Blank Space'),
    ('Bad Bunny', 'Fenomen global del trap llatí i reggaetón, amb estil distintiu i crítica social.', 1994, 'Trap, Reggaetón', 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Bad_Bunny_2019.jpg', 'Tití Me Preguntó'),
    ('Dua Lipa', 'Cantant britànica d’èxit internacional, coneguda per les seves melodies enganxoses i estil pop-disco.', 1995, 'Pop, Disco', 'https://upload.wikimedia.org/wikipedia/commons/0/07/Dua_Lipa_2022.jpg', 'Levitating')
");

if (!$insert) {
    die("Error en l'INSERT: " . $db->lastErrorMsg());
}

echo "Base de dades creada amb músics catalans i internacionals.";

?>
