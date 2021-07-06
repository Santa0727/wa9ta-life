<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');
        $name = $request->input('name');
        $arabic_name = $request->input('arabic_name');
        $eid = $request->input('eid');
        $passport = $request->input('passport');
        $moblie = $request->input('moblie');

        $existUser = User::where(['email' => $eid])->first();
        if ($existUser) {
            return response()->json(["success" => false, "message" => "ID # has already taken by other user. <br> Please use another email."], 422);
        }

        $user = new User();
        $user->email = $eid;
        if (!$moblie) {
            return response()->json(["success" => false, "message" => "Moblie number field is required"], 400);
        }
        $user->password = bcrypt($moblie);

        // $user->email = $email;
        // if ($password != null) {
        //     $user->password = bcrypt($password);
        // }

        $user->name = $name;
        $user->arabic_name = $arabic_name;
        $user->passport = $passport;
        $user->moblie = $moblie;
        if ($request->hasFile('avatar')) {
            $user->profile_photo_path = parent::upladImage($request->file('avatar'), 'avatar');
        }
        $user->save();

        return new Response(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');
        $name = $request->input('name');
        $arabic_name = $request->input('arabic_name');
        $eid = $request->input('eid');
        $passport = $request->input('passport');
        $moblie = $request->input('moblie');

        $user = User::find($id);

        if (!$user) {
            return new Response([
                'success' => false,
                'message' => 'User not found.',
            ], 400);
        }

        if (!$eid) {
            return response()->json(["success" => false, "message" => "ID # is required."], 400);
        }

        $exitUser = User::where('id', '!=', $user->id)->where('email', $eid)->first();
        if ($exitUser) {
            return response()->json(["success" => false, "message" => "ID # has already taken by other user. <br> Please use another email."], 422);
        }
        $user->email = $eid;

        if ($moblie != null) {
            $user->password = bcrypt($moblie);
        }

        $user->name = $name;
        $user->arabic_name = $arabic_name;
        $user->passport = $passport;
        // $user->email = $email;

        $user->moblie = $moblie;
        if ($request->hasFile('avatar')) {
            if ($user->profile_photo_path != "") {
                if (file_exists(public_path($user->profile_photo_path))) {
                    unlink(public_path($user->profile_photo_path));
                }
            }

            $user->profile_photo_path = parent::upladImage($request->file('avatar'), 'avatar');
        }
        $user->save();

        return new Response(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == "1") {
            return new Response([
                "success" => false,
                "message" => "Dermission denied!",
            ]);
        }
        $user = User::find($id);

        if (!$user) {
            return new Response([
                'success' => false,
                'message' => 'User not found.',
            ], 400);
        }

        $user->delete();
        History::where('user_id', $id)->delete();
        return new Response([
            "success" => true,
        ]);
    }

    /**
     * Get all users
     *
     * @return \Illuminate\Http\Response
     */

    public function get_users(Request $request)
    {

        $columns = array(
            'last_update',
            'name',
            'arabic_name',
            'email',
            'passport',
            'moblie',
            'pcr_test',
            'dpi_test',
            'active',
            'id',
            'status',
        );

        $total = User::where('role', 1)->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        $users = User::where('role', 1)->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        $resData = [];
        if (count($users) > 0) {
            foreach ($users as $key => $user) {
                $user_id = $user['id'];
                $pcr_test = History::where('user_id', $user_id)->where('type', '1')->count();
                $dpi_test = History::where('user_id', $user_id)->where('type', '2')->count();
                $last = History::select(['start_date', 'end_date', 'valid_hours', 'start_time', 'type', 'created_at'])->where('user_id', $user_id)->latest()->first();
                if ($last) {
                    $date = strtotime($last->start_date . " " . $last->start_hours);
                    $date = strtotime('+' . $last->valid_hours . ' hours', $date);
                    $status = 2;
                    if (($date - time()) > 0) {
                        $status = 1;
                    }
                    $resData[] = array_merge($user->toArray(), ["pcr_test" => $pcr_test, "dpi_test" => $dpi_test, "status" => $status], $last->toArray());
                } else {
                    $resData[] = array_merge($user->toArray(), ["pcr_test" => $pcr_test, "dpi_test" => $dpi_test, "status" => "", "type" => "", "start_date" => "", "end_date" => "", "start_time" => "", "valid_hours" => ""]);
                }

            }
        }

        return new Response(array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($total),
            "recordsFiltered" => intval($total),
            "data" => $resData,
        ));
    }

    public function active_user($id)
    {
        $user = User::find($id);
        if (!$user) {
            return new Response([
                'success' => false,
                'message' => 'User not found.',
            ], 400);
        }

        if ($user->active == 1) {
            $user->active = 0;
        } else {
            $user->active = 1;
        }
        $user->save();
        return new Response([
            'success' => true,
        ]);
    }
}