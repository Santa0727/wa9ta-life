<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $users = User::where('id', $this->guard()->user()->id)->where('role', '1')->get(['id', 'name', 'arabic_name', 'email as eid']);

        $resData = [];

        if (count($users)) {
            foreach ($users as $k => $user) {
                $resData[] = [
                    "id" => $user->id,
                    "name" => $this->get_name($lang, $user),
                    "eid" => $user->eid,
                ];
            }
        }

        return response()->json([
            'success' => true,
            "data" => [
                'users' => $resData,
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $resData = null;
        $user = User::select(['id', 'passport', 'profile_photo_path', 'name', 'arabic_name', 'email as eid'])->with('reports')->find($id);
        if ($user) {
            $resData = [
                "id" => $user->id,
                "passport" => $user->passport,
                "profile_photo_path" => $user->profile_photo_path,
                "name" => $this->get_name($lang, $user),
                "eid" => $user->eid,
                "reports" => [],
            ];
            $repData = [];
            if (count($user->reports) > 0) {
                foreach ($user->reports as $k => $report) {
                    $data = [
                        "id" => $report->id,
                        "user_id" => $report->user_id,
                        "type" => $report->type,
                        "start_date" => $report->start_date,
                        "end_date" => $report->end_date,
                        "start_time" => $report->start_time,
                        "calcDate" => $this->calcDate($report->start_date, $report->start_time, $lang),
                        "valid_hours" => $report->valid_hours,
                        "created_at" => $report->created_at,
                        "updated_at" => $report->updated_at,
                    ];
                    $repData[] = $data;
                }
                $resData['reports'] = $repData;
            }
        }
        return response()->json([
            'success' => true,
            "data" => [
                'user' => $resData,
            ],
        ]);
    }

    public function calcDate($date, $start, $lang = "en")
    {
        if (!$date && !$start) {
            return null;
        }

        $from = date_create("$date $start");
        $to = date_create(date('Y-m-d H:i:s'));

        $diff = date_diff($from, $to);

        $res = "";
        if ($diff->y > 0) {
            $res = "$date $start";
        } else if ($diff->m > 1) {
            if ($lang == "ar") {
                $res = "منذ " . $diff->m . " أشهر";
            } else {
                $res = $diff->m . " months ago";
            }
        } else if ($diff->m == 1) {
            if ($lang == "ar") {
                $res = "قبل شهر";
            } else {
                $res = "a month ago";
            }
        } else if ($diff->days > 1) {
            if ($lang == "ar") {
                $res = "منذ " . $diff->days . " أيام";
            } else {
                $res = $diff->days . " days ago";
            }
        } else if ($diff->days == 1) {
            if ($lang == "ar") {
                $res = "قبل يوم";
            } else {
                $res = "a day ago";
            }
        } else if ($diff->h > 1) {
            if ($lang == "ar") {
                $res = "منذ " . $diff->h . " ساعات";
            } else {
                $res = $diff->h . " hours ago";
            }
        } else if ($diff->h == 1) {
            if ($lang == "ar") {
                $res = "قبل ساعة";
            } else {
                $res = "a hours ago";
            }
        } else if ($diff->i > 1) {
            if ($lang == "ar") {
                $res = "منذ " . $diff->i . " دقيقة";
            } else {
                $res = $diff->i . " minutes ago";
            }
        } else if ($diff->i == 1) {
            if ($lang == "ar") {
                $res = "قبل دقيقة";
            } else {
                $res = "a minute ago";
            }
        } else if ($diff->s > 10) {
            if ($lang == "ar") {
                $res = "منذ " . $diff->s . " ثوان";
            } else {
                $res = $diff->s . " seconds ago";
            }
        } else {
            if ($lang == "ar") {
                $res = "الآن";
            } else {
                $res = "now";
            }
        }
        return $res;
    }

    public function get_name($lang = "en", $user)
    {
        if ($lang == "ar") {
            if ($user->arabic_name) {
                return $user->arabic_name;
            }
        }
        return $user->name;
    }

    public function guard()
    {
        return Auth::guard('api');
    }
}