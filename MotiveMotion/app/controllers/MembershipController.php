<?php
require_once 'app/models/Membership.php';

class MembershipController{
    public static function index() {
        $memberships = Membership::getAllMemberships();
        require_once "app/views/memberships/index.php";
    }

    public static function show() {
        $membership_id = $_GET['id'];
        $membership = Membership::getMembership($membership_id);

        if ($membership) {
            require_once "app/views/memberships/show.php";
        } else {
            $_SESSION['error'] = "Membership not found";
            require_once "app/views/404.php";
        }

    }
}
?>
