<?php
require_once "app/models/Membership.php";

class AnalyticsController {
    public static function showAnalytics() {
        $memberships = Membership::getAllMemberships();
        $totalMonthlyPrice = 0;
        $totalAnnualPrice = 0;
        $monthlyCount = 0;
        $annualCount = 0;

        foreach ($memberships as $membership) {
            if ($membership['type_memb'] === 'monthly') {
                $totalMonthlyPrice += $membership['price'];
                $monthlyCount++;
            } elseif ($membership['type_memb'] === 'annual') {
                $totalAnnualPrice += $membership['price'];
                $annualCount++;
            }
        }

        $averageMonthlyPrice = $monthlyCount > 0 ? $totalMonthlyPrice / $monthlyCount : 0;
        $averageAnnualPrice = $annualCount > 0 ? $totalAnnualPrice / $annualCount : 0;

        require_once "app/views/analytics/analytics.php";
    }
}
?>