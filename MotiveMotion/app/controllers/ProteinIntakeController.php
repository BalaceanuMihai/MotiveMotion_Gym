<?php
require_once "app/models/User.php";
require_once "services/NutritionService.php";

class ProteinIntakeController {
    public static function showProteinIntake($userId, $weight) {
        // Debugging: Verificăm dacă metoda este apelată
        echo "showProteinIntake method called with userId: $userId and weight: $weight<br>";

        $user = User::getUser($userId);
        if ($user) {
            // Debugging: Afișăm informațiile utilizatorului
            echo "User found: ";
            print_r($user);
            echo "<br>";

            // Calculăm necesarul de proteine pe baza greutății utilizatorului
            $proteinPerKg = 0.8;
            $proteinGoal = $weight * $proteinPerKg;

            // Obținem cantitatea de proteine per ou mare
            $proteinPerEgg = NutritionService::getProteinIntakeEggs();
            if ($proteinPerEgg !== null) {
                // Calculăm numărul de ouă necesare pentru a atinge necesarul de proteine
                $eggsNeeded = $proteinGoal / $proteinPerEgg;

                echo '<pre>';
                echo 'Pentru a atinge necesarul de proteine de ' . $proteinGoal . 'g, utilizatorul ' . $user['first_name'] . ' ' . $user['last_name'] . ' trebuie să mănânce ' . $eggsNeeded . ' ouă mari.';
                echo '</pre>';
            } else {
                echo '<pre>';
                echo 'Nu s-au putut obține informațiile despre proteine.';
                echo '</pre>';
            }
        } else {
            echo '<pre>';
            echo 'Utilizatorul nu a fost găsit.';
            echo '</pre>';
        }
    }
}
?>