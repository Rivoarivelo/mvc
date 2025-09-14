<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use App\Models\MessageModel;

class DbTest extends Controller
{
    public function index()
    {
        echo "<h3>✅ Test de connexion à la base</h3>";

        // Test de connexion
        try {
            $db = Database::connect();
            $result = $db->query("SELECT 1 AS test")->getResult();
            echo "<pre>";
            var_dump($result);
            echo "</pre>";
            echo "✔️ Connexion OK<br><br>";
        } catch (\Exception $e) {
            echo "❌ Erreur de connexion : " . $e->getMessage();
            return;
        }

        echo "<h3>✅ Test du Model MessageModel (lecture)</h3>";

        $model = new MessageModel();
        $messages = $model->findAll();

        if ($messages) {
            echo "✔️ Le modèle lit bien la table `messages`.<br>";
            echo "Exemple de message : <pre>";
            print_r($messages[0]);
            echo "</pre>";
        } else {
            echo "⚠️ Table `messages` vide.<br>";
        }

        echo "<h3>✅ Test d'insertion avec MessageModel</h3>";

        try {
            $newMessage = [
                'sender_id'   => 1,  // tu peux changer
                'receiver_id' => 2,  // tu peux changer
                'message'     => 'Message de test depuis DbTest.php',
                'created_at'  => date('Y-m-d H:i:s')
            ];

            $model->insert($newMessage);

            echo "✔️ Nouveau message inséré avec succès.<br>";

            // Vérifier en lisant le dernier message
            $last = $model->orderBy('id', 'DESC')->first();
            echo "Dernier message inséré : <pre>";
            print_r($last);
            echo "</pre>";
        } catch (\Exception $e) {
            echo "❌ Erreur lors de l'insertion : " . $e->getMessage();
        }
    }
}
