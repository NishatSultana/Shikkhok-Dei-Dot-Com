<?php


namespace App\CoreMechanism;

class ProfileProgress
{
    function profile_progress_calculation()
    {
        $logged_user = auth()->user();
        $cnt = 0;
        if ($logged_user->full_name) {
            $cnt = $cnt + 1;
        }
        if ($logged_user->profile_pic) {
            $cnt = $cnt + 1;
        }
        if ($logged_user->mobile) {
            $cnt = $cnt + 1;
        }
        if ($logged_user->dob) {
            $cnt = $cnt + 1;
        }
        if ($logged_user->gender) {
            $cnt = $cnt + 1;
        }
        if ($logged_user->present_address) {
            $cnt = $cnt + 1;
        }
        if ($logged_user->permanent_address) {
            $cnt = $cnt + 1;
        }

        $count = ($cnt * 1.42 + 0.06)*10;

        return $count;
    }
}
