<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class StorageController extends Controller
{

    /**
     * Salva un'immagine all'interno del filesystem
     */
    public static function storeImage($file, $name, $dir) {
        $filename = $name . "." . $file->getClientOriginalExtension();
        $foto = $file->storeAs($dir, $filename , 'public');
        return  "storage/" . $foto;
    }


    /**
     * Aggiorna l'immagine all'interno del filesystem
     */
    public static function updateImage($file, $name, $dir) {
        self::findAndDeleteImage($name, $dir);
        return self::storeImage($file, $name, $dir);
    }


    /**
     * Cerca ed elimina un'immagine all'interno del filesystem a prescindere dalla sua estensione
     */
    public static function findAndDeleteImage($name, $dir) {
        $pattern = "storage/" . $dir . "/" . $name . ".*";
        # Use glob function because I don't know the extension.
        $searchResult = File::glob($pattern);
        if (! empty($searchResult)) {
            File::delete($searchResult[0]);
        }
    }


    /**
     * Elimina una directory all'interno del filesystem
     */
    public static function deleteDirectory($dir) {
        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }
    }

}
