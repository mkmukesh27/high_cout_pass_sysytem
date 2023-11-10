<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $designations = Designation::all();
            return DataTables::of($designations)
                ->addIndexColumn()
                ->editColumn('status', function ($designations) {
                    return $designations->is_active;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="modal" data-target=".editDesignation-modal-lg" data-id="' . $row->id . '" data-name="' . $row->name . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editDesignation" >Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteDesignation">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('designations');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:designations',
            'status' => 'required',
        ]);

        // dd($request->all());
        $designation = Designation::create([
            'name' => $request->name,
            'is_active' => $request->status,
        ]);
        return response()->json(['message' => 'Designation created successfully', 'designation' => $designation]);
    }


    public function update(Request $request, Designation $designation)
    {
        // dd($request->all());
        $requestData = $request->json()->all();
        $validator = Validator::make($requestData, [
            'edit_name' => 'required|string|max:255',
            'edit_status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $editName = $requestData['edit_name'];
        $editStatus = $requestData['edit_status'];

        $designation->update([
            'name' => $editName,
            'is_active' => $editStatus,
        ]);
        return response()->json(['message' => 'Designation updated successfully', 'designation' => $designation]);
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();
        return response()->json(['message' => 'Designation deleted successfully']);
    }


    public function view(Request $request)
    {
        if ($request->ajax()) {
            $designations = Designation::all();
            return DataTables::of($designations)
                ->addIndexColumn()
                ->editColumn('status', function ($designations) {
                    return $designations->is_active;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="modal" data-target=".editDesignation-modal-lg" data-id="' . $row->id . '" data-name="' . $row->name . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editDesignation" >Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteDesignation">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.department.designations');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:designations',
            'status' => 'required',
        ]);

        // dd($request->status);
        $designation = Designation::create([
            'name' => $request->input('name'),
            'is_active' => $request->input('status'),
        ]);
        return response()->json(['message' => 'Designation created successfully', 'designation' => $designation]);
    }

    public function update_new(Request $request)
    {
        $request->validate([
            'edit_name' => 'required|string|max:255',
            'edit_status' => 'required',
        ]);
        // dd($request->all());

        $designation = Designation::findOrFail($request->input('h_id'));
        if (!empty($designation)) {
            $data['name'] = $request->edit_name;
            $data['is_active'] = $request->edit_status;

            Designation::where('id', $request->input('h_id'))->update($data);
        }
        return response()->json(['message' => 'Designation updated successfully', 'designation' => $designation]);
    }
}
