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
        echo ('<div style="width: 80%;border:3px solid black;height:500px;overflow:scroll;">');
        echo '<form method="post" action="./admin.php?page=FTP+CLIENT">';
        $nombre2 = 0;
        $dir = "../../";
        //  si le dossier pointe existe
        if (is_dir($dir)) {

            // si il contient quelque chose
            if ($dh = opendir($dir)) {
                // boucler tant que quelque chose est trouvé
                while (($file = readdir($dh)) !== false) {
                    // affiche le nom et le type si ce n'est pas un element du systeme
                    if ($file != '.' && $file != '..') {
                        $nombre2++;
                        //    if( $file != '.' && $file != '..' && preg_match('#\.(jpe?g|gif|png)$#i', $file)) { Uniquement photo
                        $supprimer=[];
                        echo '
                        <input type="checkbox" name="fichier[]" value="'.$file.'" /> <a href="../../' . $file . '" target=_blank>' . $file . '</a><br>';
                    }
                        
                }
                echo ("Il y a $nombre2 documents <br>");

            }
            echo '<input type="submit" name="supprimer[]" value="Supprimer">
                </form>';

            // on ferme la connection
            closedir($dh);
        }
        

        


        // ----------------------------------------------







        // ----------------------------------------------

        echo ('<br><br><br><form method="POST" action="./admin.php?page=FTP+CLIENT" enctype="multipart/form-data">
        <input type="file" name="uploaded_file"/><br>
        <input type="submit" name="submit"/> <br>
        </form>');

        if (isset($_POST['submit'])) {

            $maxSize = 9999999999999999999;
            $validExt = array(
                '.jpg',
                '.jpeg',
                '.gif',
                '.png',
                '.pdf',
                '.rar',
                '.zip',
                '.mp4',
                '.mp3',
                '.avi',
                '.mkv'
            ); /*Ici les formats autorisés*/

            if ($_FILES['uploaded_file']['error'] > 0) {
                echo "Une erreur est survenue lors du transfert";
                die;
            }

            $fileSize = $_FILES['uploaded_file']['size'];

            if ($fileSize > $maxSize) {
                echo "Le document est trop gros!";
                die;
            }

            $fileName = $_FILES['uploaded_file']['name'];
            $fileExt = "." . strtolower(substr(strrchr($fileName, '.'), 1));

            if (!in_array($fileExt, $validExt)) {
                echo "Le fichier n'est pas conforme!";
                die;
            }

            $tmpName = $_FILES['uploaded_file']['tmp_name'];
            // $uniqueName = md5(uniqid(rand(), true)); Pour avoir un nom aléatoire
            $uniqueName = $fileName; /* Pour avoir le nom du document bien précis */
            $fileName = "../../" . $uniqueName;
            $resultat = move_uploaded_file($tmpName, $fileName);

            if ($resultat) {
                echo "trasnfert terminé";
            }

            /* Tutoriel https://www.youtube.com/watch?v=SfZ0oAiRhCU */
        }
    }
}
