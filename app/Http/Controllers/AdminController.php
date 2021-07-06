<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
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
        $email = $request->input('email');
        $existUser = User::where(['email' => $email])->first();
        if ($existUser) {
            return response()->json(["success" => false, "message" => "Email has already taken. <br> Please use another email."], 422);
        }
        $password = $request->input('password');
        if (!$password) {
            return response()->json(["success" => false, "message" => "Password field is required"], 400);
        }

        $name = $request->input('name');
        // $eid = $request->input('eid');
        // $passport = $request->input('passport');
        $moblie = $request->input('moblie');

        $user = new User();
        $user->passport = bcrypt(rand(10, 15));
        $user->email = $email;
        if ($password != null) {
            $user->password = bcrypt($password);
            $user->show_password = $password;
        }

        $user->name = $name;
        // $user->eid = $eid;
        // $user->passport = $passport;
        $user->moblie = $moblie;
        if ($request->hasFile('avatar')) {
            $user->profile_photo_path = parent::upladImage($request->file('avatar'), 'avatar');
        }
        $user->role = 2;
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
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');
        // $eid = $request->input('eid');
        // $passport = $request->input('passport');
        $moblie = $request->input('moblie');

        $user = User::find($id);

        if (!$user) {
            return new Response([
                'success' => false,
                'message' => 'User not found.',
            ], 400);
        }

        $exitUser = User::where('id', '!=', $user->id)->where('email', $email)->first();
        if ($exitUser) {
            return response()->json(["success" => false, "message" => "Email has already taken. <br> Please use another email."], 422);
        }

        $user->passport = bcrypt(rand(10, 15));
        $user->name = $name;
        // $user->eid = $eid;
        // $user->passport = $passport;
        $user->email = $email;
        if ($password != null) {
            $user->password = bcrypt($password);
            $user->show_password = $password;
        }

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
            'profile_photo_path',
            'name',
            'email',
            //  'password',
            'moblie',
            // 'pcr_test',
            // 'dpi_test',
            'active',
            // 'id',
            // 'status',
        );

        $total = User::where('role', 2)->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        $users = User::where('role', 2)->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        // $resData = [];
        // if (count($users) > 0) {
        //     foreach ($users as $key => $user) {
        //         $user_id = $user['id'];
        //         $pcr_test = History::where('user_id', $user_id)->where('type', '1')->count();
        //         $dpi_test = History::where('user_id', $user_id)->where('type', '2')->count();
        //         $last = History::select(['start_date', 'end_date', 'valid_hours', 'start_time', 'type', 'created_at'])->where('user_id', $user_id)->latest()->first();
        //         if ($last) {
        //             $date = strtotime($last->created_at);
        //             $date = strtotime('+48 hours', $date);
        //             $status = 2;
        //             if (($date - time()) > 0) {
        //                 $status = 1;
        //             }
        //             $resData[] = array_merge($user->toArray(), ["pcr_test" => $pcr_test, "dpi_test" => $dpi_test, "status" => $status], $last->toArray());
        //         } else {
        //             $resData[] = array_merge($user->toArray(), ["pcr_test" => $pcr_test, "dpi_test" => $dpi_test, "status" => "", "type" => "", "start_date" => "", "end_date" => "", "start_time" => "", "valid_hours" => ""]);
        //         }

        //     }
        // }

        return new Response(array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($total),
            "recordsFiltered" => intval($total),
            "data" => $users,
        ));
    }

    public function active_user($id)
    {
        if ($id == 1) {
            return new Response([
                'success' => false,
                'message' => 'Permission Denied.',
            ]);
        }
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