<?php
require_once "app/models/Membership.php";
require_once "app/models/User.php";

class MembershipController {

    private static function checkAdmin() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] !== 1) {
            $_SESSION['error'] = "You do not have permission to perform this action.";
            if ($_SESSION['user']['role_id'] == 2) {
                header("Location: /MotiveMotion/workout_plans/index");
            } else if ($_SESSION['user']['role_id'] == 3) {
                header("Location: /MotiveMotion/memberships/home_user");
            } else {
            header("Location: /MotiveMotion/auth/login");
            }
            exit();
        }
    }
    public static function index() {
        self::checkAdmin();
        $memberships = Membership::getAllMemberships();
        require_once "app/views/memberships/index.php";
    }

    public static function show($id) {
        self::checkAdmin();
        $membership = Membership::getByIdMembership($id);
        require_once "app/views/memberships/show.php";
    }

    public static function create() {
        self::checkAdmin();
        $users = User::getAll();
        require_once "app/views/memberships/create.php";
    }

    public static function store() {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_POST['user_id'];
            $price = $_POST['price'];
            $type_memb = $_POST['type_memb'];
            $starting_date = $_POST['starting_date'];
            $end_date = $_POST['end_date'] ?? null;

            // Verificare dacă prețul este pozitiv
            if ($price <= 0) {
                $_SESSION['error'] = "Price must be positive.";
                header("Location: /MotiveMotion/memberships/create");
                exit();
            }
            
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
        self::checkAdmin();
        $membership = Membership::getByIdMembership($id);

        if ($membership) {
            require_once "app/views/memberships/edit.php";
        } else {
            $_SESSION['error'] = "Membership not found";
            require_once "app/views/404.php";
        }
    }

    public static function update($id) {
        self::checkAdmin();
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
            $membership = Membership::getByIdMembership($id);

            if ($membership) {
                require_once "app/views/memberships/edit.php";
            } else {
                $_SESSION['error'] = "Membership not found";
                require_once "app/views/404.php";
            }
        }
    }

    public static function destroy($id) {
        self::checkAdmin();
        if (Membership::deleteMembership($id)) {
            $_SESSION['success'] = "Membership deleted successfully!";
            header("Location: /MotiveMotion/memberships/index");
            exit();
        } else {
            $_SESSION['error'] = "Failed to delete membership.";
        }
    }

    public static function home_user() {
        $user_id = $_SESSION['user']['id'];
        $activeMemberships = Membership::getActiveMembershipsByUserId($user_id);
        $expiredMemberships = Membership::getExpiredMembershipsByUserId($user_id);
        require_once "app/views/memberships/home_user.php";
    }
}
?>