<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\CustomerResource;
use App\Imports\CustomersImport;
use App\Models\Campaign;
use DataTables;
use Validator;

class CustomerController extends BaseController
{
    public function index(Request $request)
    {
        $campaigns = Campaign::all();

        if ($request->ajax()) {
            $data = Customer::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = '<a href="' . route('customer.edit', $row->id) . '" class="btn btn-secondary btn-rounded btn-icon-md" title="Edit"><i class="ti-pencil"></i></a>';
                    $delete = '<a href="#" data-href="' . route('customer.destroy', $row->id) . '" class="btn btn-danger btn-rounded btn-icon-md" title="Delete" data-toggle="modal" data-target="#modal-delete" data-key="' . $row->name . '"><i class="ti-trash"></i></a>';
                    return $edit . $delete;
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.upload.index', compact('campaigns'));
    }

    public function data()
    {
        $customer = Customer::all();

        return $this->sendResponse(CustomerResource::collection($customer), 'Customers retrieved successfully.');
    }

    public function upload(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new CustomersImport, public_path('/file_siswa/'.$nama_file));
 
        return redirect()->route('customer.index')->with('success', 'Data uploaded successfully');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer = Customer::create($input);

        return $this->sendResponse(new CustomerResource($customer), 'Customer created successfully.');
    }

    public function create()
    {
        $campaigns = Campaign::all();
        return view('admin.upload.create', compact('campaigns'));
    }

    public function edit($id)
    {
        $customer = Customer::select('id', 'name', 'address', 'phone_number')->findOrFail($id);
        return view('admin.upload.edit', compact('customer'));
    }

    public function update($id, Request $request)
    {
        $customer = Customer::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $customer->fill($request->post())->save();

        return redirect()->route('customer.index')->with('success', 'Customer has been updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer has been deleted successfully');
    }
}
