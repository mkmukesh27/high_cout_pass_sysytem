<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Designation;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with('designation')->get();
        $designations = Designation::all();

        if ($request->ajax()) {
            return DataTables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-name="' . $row->name . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editEmployee">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteEmployee">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('employees', compact('designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation_id' => 'required|exists:designations,id',
            'is_active' => 'boolean',
            'role' => 'string|max:255',
            'can_have_visitors' => 'boolean',
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'designation_id' => $request->designation_id,
            'is_active' => $request->has('is_active') ? $request->is_active : true,
            'role' => $request->has('role') ? $request->role : 'user',
            'can_have_visitors' => $request->has('can_have_visitors') ? $request->can_have_visitors : true,
        ]);

        return response()->json(['message' => 'Employee created successfully', 'employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $requestData = $request->json()->all();

        $validator = validator($requestData, [
            'edit_name' => 'required|string|max:255',
            'edit_designation_id' => 'required|exists:designations,id',
            'edit_is_active' => 'boolean',
            'edit_role' => 'string|max:255',
            'edit_can_have_visitors' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employee->update([
            'name' => $requestData['edit_name'],
            'designation_id' => $requestData['edit_designation_id'],
            'is_active' => $requestData['edit_is_active'] ?? true,
            'role' => $requestData['edit_role'] ?? 'user',
            'can_have_visitors' => $requestData['edit_can_have_visitors'] ?? true,
        ]);

        return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }

    public function getEmployeeDetails(Request $request)
    {
        $employeeId = $request->input('employee_id');

        try {
            $employee = Employee::find($employeeId);

            if (!$employee) {
                return response()->json(['error' => 'Employee not found'], 404);
            }
            return response()->json(['employee' => $employee]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch employee details'], 500);
        }
    }



    public function view(Request $request)
    {
        $employees = Employee::with('designation')->get();
        $designations = Designation::all();

        if ($request->ajax()) {
            return DataTables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="modal" data-target=".editEmployee-modal-lg" data-id="' . $row->id . '" data-name="' . $row->name . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editEmployee" >Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteEmployee">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.department.employees', compact('designations'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation_id' => 'required|exists:designations,id',
            'is_active' => 'boolean',
            'role' => 'string|max:255',
            'can_have_visitors' => 'boolean',
        ]);

        // dd($request->all());
        $employee = Employee::create([
            'name' => $request->name,
            'designation_id' => $request->designation_id,
            'is_active' => $request->has('is_active') ? $request->is_active : true,
            'role' => $request->has('role') ? $request->role : 'user',
            'can_have_visitors' => $request->has('can_have_visitors') ? $request->can_have_visitors : true,
        ]);

        return response()->json(['message' => 'Employee created successfully', 'employee' => $employee]);
    }

    public function update_new(Request $request)
    {
        $request->validate([
            'edit_name' => 'required|string|max:255',
            'edit_designation_id' => 'required|exists:designations,id',
            'edit_is_active' => 'boolean',
            'edit_role' => 'string|max:255',
            'edit_can_have_visitors' => 'boolean',
        ]);
        // dd($request->all());

        $employee = Employee::findOrFail($request->input('h_employee_id'));
        if (!empty($employee)) {
            $data['name'] = $request->edit_name;
            $data['designation_id'] = $request->edit_designation_id;
            $data['is_active'] = $request->edit_is_active;
            $data['role'] = $request->edit_role;
            $data['can_have_visitors'] = $request->edit_can_have_visitors;

            Employee::where('id', $request->input('h_employee_id'))->update($data);
        }
        return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee]);
    }
}
