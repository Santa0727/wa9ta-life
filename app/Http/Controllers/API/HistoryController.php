<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function get_last_report($lang, $id)
    {
        $last = History::select(['start_date', 'start_time', 'valid_hours'])->where('user_id', $id)->orderBy('updated_at', 'DESC')->first();
        $user = User::select(['id', 'name', 'arabic_name', 'email as eid', 'passport', 'profile_photo_path'])->find($id);

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "User not found.",
            ]);
        }

        return response()->json([
            "success" => true,
            "data" => [
                "lastReport" => array_merge([
                    "id" => $user->id,
                    "name" => $this->get_name($lang, $user),
                    "eid" => $user->eid,
                    "passport" => $user->passport,
                    "profile_photo_path" => $user->profile_photo_path,
                ], $last->toArray()),
            ],
        ]);
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
