<?php
require_once 'app/models/Membership.php';
require_once 'app/models/User.php';

$users = User::getAllUsers();

echo "<p>Users:</p>";
foreach ($users as $user) {
    echo "<pre>";
    print_r($user);
    echo "</pre>";
}

$memberships = Debt::getAllMemberships();
echo "<p>Memberships:</p>";
foreach ($memberships as $membership) {
    echo "<pre>";
    print_r($membership);
    echo "</pre>";
}


?>