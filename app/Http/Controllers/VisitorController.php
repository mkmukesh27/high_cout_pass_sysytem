<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Visitor;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $visitors = DB::table('visitors')
            ->join('employees', 'visitors.employee_id', '=', 'employees.id')
            ->select('visitors.*', 'employees.name as employee_name')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($visitors)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $currentTime = Carbon::now();
                    $timeSlot = Carbon::parse($row->time_slot);

                    if ($timeSlot->lt($currentTime) || $row->status != 'pending') {
                        $btn = '<button type="button" class="btn btn-secondary btn-sm" disabled>Expired</button>';
                    } else {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Accept" class="btn btn-success btn-sm acceptBtn">Accept</a>';
                        $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Reject" class="btn btn-danger btn-sm rejectBtn">Reject</a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('visitors');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'designation' => 'nullable|string|max:255',
                'aadhar' => 'nullable|string|max:255',
                'employee_id' => 'required|exists:employees,id',
                'time_slot' => 'required|date_format:Y-m-d H:i:s',
                'purpose' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
                'status' => 'required|in:accepted,rejected,pending',
            ]);
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->errors()], 422);
        }

        $visitor = Visitor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'aadhar' => $request->aadhar,
            'employee_id' => $request->employee_id,
            'time_slot' => $request->time_slot,
            'purpose' => $request->purpose,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Visitor created successfully', 'visitor' => $visitor]);
    }

    public function rejectVisitor(Request $request)
    {
        $visitorId = $request->input('visitor_id');
        $visitor = Visitor::find($visitorId);

        if (!$visitor) {
            return response()->json(['error' => 'Visitor not found'], 404);
        }

        $visitor->status = 'rejected';
        $visitor->save();

        return response()->json(['message' => 'Visitor rejected successfully']);
    }

    public function view(Request $request)
    {
        $visitors = DB::table('visitors')
            ->join('employees', 'visitors.employee_id', '=', 'employees.id')
            ->select('visitors.*', 'employees.name as employee_name')
            ->get();

        if ($request->ajax()) {
            return DataTables::of($visitors)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $currentTime = Carbon::now();
                    $timeSlot = Carbon::parse($row->time_slot);

                    if ($timeSlot->lt($currentTime) || $row->status != 'pending') {
                        $btn = '<button type="button" class="btn btn-secondary btn-sm" disabled>Expired</button>';
                    } else {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Accept" class="btn btn-success btn-sm acceptBtn">Accept</a>';
                        $btn = $btn . '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Reject" class="btn btn-danger btn-sm rejectBtn">Reject</a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.department.visitors');
    }
}
