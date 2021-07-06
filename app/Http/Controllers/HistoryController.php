<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('history');
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
    public function store(Request $request, $user_id)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $start_time = $request->input('start_time');
        $valid_hours = $request->input('valid_hours');
        $type = $request->input('type');

        $history = new History();
        $history->start_date = $start_date;
        $history->end_date = $end_date;
        $history->start_time = $start_time;
        $history->valid_hours = $valid_hours;
        $history->user_id = $user_id;
        $history->type = $type;
        $user = User::find($user_id);
        $user->last_update = date('Y-m-d H:i:s');
        $user->save();
        $history->save();

        return new Response(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function get_history(Request $request, $id)
    {
        $columns = array(
            //  'id',
            'updated_at',
            'arabic_name',
            'eid',
            'passport',
            'moblie',
            'type',
            'start_date',
            'end_date',
            'start_time',
            'valid_hours',
            'status',
            'active',
        );

        $total = History::where('user_id', $id)->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        $historis = History::where('user_id', $id)->offset($start)->limit($limit)->orderBy($order, $dir)->get();
        $user = User::select(['name', 'arabic_name', 'email as eid', 'passport', 'moblie'])->find($id)->toArray();
        $resData = [];
        if (count($historis) > 0) {
            foreach ($historis as $key => $history) {
                $date = strtotime($history->start_date . " " . $history->start_hours);
                $date = strtotime('+' . $history->valid_hours . ' hours', $date);
                $status = 2;
                if (($date - time()) > 0) {
                    $status = 1;
                }
                $resData[] = array_merge($user, $history->toArray(), ['status' => $status]);
            }
        }

        return new Response(array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($total),
            "recordsFiltered" => intval($total),
            "data" => $resData,
        ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id, $id)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $start_time = $request->input('start_time');
        $valid_hours = $request->input('valid_hours');
        $type = $request->input('type');

        $history = History::find($id);

        if (!$history) {
            return new Response([
                'success' => false,
                'message' => 'History not found.',
            ], 400);
        }

        $history->start_date = $start_date;
        $history->end_date = $end_date;
        $history->start_time = $start_time;
        $history->valid_hours = $valid_hours;
        $history->user_id = $user_id;
        $history->type = $type;
        $user = User::find($user_id);
        $user->last_update = date('Y-m-d H:i:s');
        $user->save();
        $history->save();

        return new Response(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = History::find($id);

        if (!$history) {
            return new Response([
                'success' => false,
                'message' => 'History not found.',
            ], 400);
        }

        $history->delete();
        return new Response([
            "success" => true,
        ]);

    }
}