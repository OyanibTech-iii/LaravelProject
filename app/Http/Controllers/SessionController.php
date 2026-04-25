<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sessions = \DB::table('sessions')
                ->leftJoin('users', 'sessions.user_id', '=', 'users.id')
                ->select('sessions.*', 'users.name as user_name');

            return \Yajra\DataTables\Facades\DataTables::of($sessions)
                ->addColumn('user', function ($row) {
                    return '<span class="text-xs font-bold text-navy">' . ($row->user_name ?? 'Guest') . '</span>';
                })
                ->addColumn('last_activity_formatted', function ($row) {
                    return '<span class="text-[10px] text-gray-400">' . date('M d, Y h:i A', $row->last_activity) . '</span>';
                })
                ->addColumn('ip_address', function ($row) {
                    return '<span class="text-[10px] text-gray-600 font-mono">' . $row->ip_address . '</span>';
                })
                ->addColumn('user_agent', function ($row) {
                    return '<span class="text-[10px] text-gray-400" title="' . e($row->user_agent) . '">' . \Illuminate\Support\Str::limit($row->user_agent, 40) . '</span>';
                })
                ->rawColumns(['user', 'last_activity_formatted', 'ip_address', 'user_agent'])
                ->make(true);
        }

        return view('sessions.index');
    }
}
