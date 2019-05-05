<?php
/**
 * Creates the submenu page for the plugin.
 *
 * @package Custom_Admin_Settings
 */

/**
 * Créer une sous menu pour la page du plugin.
 *
 * Fourni les fonctionnalité nécessaire pour le rendu de la page.
 *
 * @package Custom_Admin_Settings
 */
class Submenu_Page
{

    /**
     * Cette fonction renvoi un contenu associé à un menu qui assure le rendu.
     */
    public function render()
    {
        echo ('Gestion FTP CLIENTS');
        echo ('<div style="width: 80%;border:3px solid black;height:500px;">');
        include ('ftp.php');
        echo ('</div>');
    }
}
