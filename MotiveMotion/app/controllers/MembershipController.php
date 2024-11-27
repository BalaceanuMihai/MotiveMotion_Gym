<?php
require_once "app/models/Membership.php";

class MembershipController {
    public static function index() {
        $memberships = Membership::getAllMemberships();
        require_once "app/views/memberships/index.php";
    }

    public static function show($id) {
        $membership = Membership::findById($id);
        require_once "app/views/memberships/show.php";
    }

    public static function create() {
        require_once "app/views/memberships/create.php";
    }

    public static function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_POST['user_id'];
            $price = $_POST['price'];
            $type_memb = $_POST['type_memb'];
            $starting_date = $_POST['starting_date'];
            $end_date = $_POST['end_date'] ?? null;

            if (Membership::createMembership($user_id, $price, $type_memb, $starting_date, $end_date)) {
                $_SESSION['success'] = "Membership created successfully!";
                header("Location: /MotiveMotion/memberships/index");
                exit();
            } else {
                $_SESSION['error'] = "Failed to create membership.";
            }
        }
    }

    public static function edit($id) {
        $membership = Membership::findById($id);

        if ($membership) {
            require_once "app/views/memberships/edit.php";
        } else {
            $_SESSION['error'] = "Membership not found";
            require_once "app/views/404.php";
        }
    }

    public static function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission
            $user_id = $_POST['user_id'];
            $price = $_POST['price'];
            $type_memb = $_POST['type_memb'];
            $starting_date = $_POST['starting_date'];
            $end_date = $_POST['end_date'];
            $status_memb = $_POST['status_memb'];

            if (Membership::updateMembership($id, $user_id, $price, $type_memb, $starting_date, $end_date, $status_memb)) {
                $_SESSION['success'] = "Membership updated successfully!";
                header("Location: /MotiveMotion/memberships/index");
                exit();
            } else {
                $_SESSION['error'] = "Failed to update membership.";
            }
        } else {
            // Display the form
            $membership = Membership::findById($id);

            if ($membership) {
                require_once "app/views/memberships/edit.php";
            } else {
                $_SESSION['error'] = "Membership not found";
                require_once "app/views/404.php";
            }
        }
    }

    public static function destroy($id) {
        if (Membership::deleteMembership($id)) {
            $_SESSION['success'] = "Membership deleted successfully!";
            header("Location: /MotiveMotion/memberships/index");
            exit();
        } else {
            $_SESSION['error'] = "Failed to delete membership.";
        }
    }
}
?>