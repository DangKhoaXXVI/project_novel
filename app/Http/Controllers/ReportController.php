<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\InCategory;
use App\Models\Novel;
use App\Models\Chapter;
use App\Models\User;
use App\Models\Rating;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Report;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function report(Request $request) {
        $data = $request->validate(
            [
                'reason' => 'required',
            ],
            [
                'reason.required' => 'Báo cáo phải có lý do!',
            ]
        );
        $report = new Report();
        $report->novel_id = $request->novel_id;
        $report->user_id = Auth::user()->id;
        $report->reason = $request->reason;
        
        $report->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        $report->save();        
        return redirect()->back()->with('status', 'Đã báo cáo truyện thành công!');
    }
}
