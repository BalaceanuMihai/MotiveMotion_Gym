<?php
require_once "app/models/Membership.php";

class MembershipController{
    public static function index() {
        $memberships = Debt::getAllDebts();
        require_once "app/views/memberships/index.php";
    }

    public static function show() {
        $membership_id = $_GET['id'];
        $membership = Debt::getDebt($membership_id);

        if ($membership) {
            require_once "app/views/memberships/show.php";
        } else {
            $_SESSION['error'] = "Membership not found";
            require_once "app/views/404.php";
        }

    }
}
?>