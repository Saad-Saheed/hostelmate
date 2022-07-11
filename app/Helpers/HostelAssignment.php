<?php

use App\Models\HostelAssign;
use App\Models\HostelCategory;
use App\Models\User;
use Carbon\Carbon;

if(!function_exists('checkGender')){
    function checkGender(HostelCategory $hostelCategory, User $user)
    {
        if($hostelCategory->gender != $user->gender){
            session()->flash('error', "This hostel Category is for ONLY {$hostelCategory->gender}");
            return false;
        }
        return true;
    }
}

if(!function_exists('geneticAlgo')){
    function geneticAlgo(HostelCategory $hostelCategory)
    {
        $new_user = auth()->user();

        // check if user has hostel already
        if((auth()->user()->hostelAssign()->exists())){
            session()->flash('error', 'You have hostel already!' );
            return false;
        }

        foreach($hostelCategory->hostels as $hostel){
            // get hostel total bed, through each hostel or their category
            $this_hostel_total_bed = $hostel->total_bed ?? $hostelCategory->total_bed_per_room;

            //make sure hostel is not full
            if($hostel->hostelAssigns()->count() < $this_hostel_total_bed){

                $used_bed_arr = $hostel->hostelAssigns()->exists() ? $hostel->hostelAssigns()->pluck('bed_no') : [];
                $all_bed_arr = range(1, $this_hostel_total_bed);

                // if hostel has ever being asssigned to a student
                if($hostel->hostelAssigns()->exists()){
                    /*check all student assigned to this hostel
                    if they are not in the same level and 3 year age differences with this new student*/
                    foreach($hostel->hostelAssigns as $hostelAssigns){

                        if($hostelAssigns->user->level != $new_user->level && Carbon::parse($hostelAssigns->user->dob)->diffInYears(Carbon::parse($new_user->dob)) > 3){
                            // get the hostel and random bed_no from available bed space.
                            return HostelAssign::create([
                                'user_id' => $new_user->id,
                                'hostel_id' => $hostel->id,
                                'bed_no' =>  $all_bed_arr[array_rand(array_diff($all_bed_arr, $used_bed_arr))],
                                'status' => 0
                            ]);
                        }
                    }
                }else{

                    // get the hostel and random bed_no from available bed space.
                    return HostelAssign::create([
                        'user_id' => $new_user->id,
                        'hostel_id' => $hostel->id,
                        'bed_no' =>  $all_bed_arr[array_rand(array_diff($all_bed_arr, $used_bed_arr))],
                        'status' => 0
                    ]);
                }

            }
        }

        session()->flash('error', 'No matched hostel, kindly contact administrator for support!' );
        return false;
    }
}
