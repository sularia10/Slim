<?php

class Musics {
    private SQLite3 $db;

    public function __construct(SQLite3 $db) {
        $this->db = $db;
    }

    /**
     * Retorna tots els músics de la base de dades.
     *
     * @return array Llista de músics com a arrays associatius.
     */
    public function getAllMusics(): array {
        $query = "SELECT * FROM musicians";
        $results = $this->db->query($query);

        if (!$results) {
            // Si hi ha un error en la consulta, retornem un array buit
            return [];
        }

        $musics = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $musics[] = $row;
        }

        return $musics;
    }
}
