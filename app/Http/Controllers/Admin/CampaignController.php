<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use DataTables;

class CampaignController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Campaign::orderBy('id', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $edit = '<a href="' . route('campaign.edit', $row->id) . '" class="btn btn-secondary btn-rounded btn-icon-md" title="Edit"><i class="ti-pencil"></i></a>';
                    $delete = '<a href="#" data-href="' . route('campaign.destroy', $row->id) . '" class="btn btn-danger btn-rounded btn-icon-md" title="Delete" data-toggle="modal" data-target="#modal-delete" data-key="' . $row->campaign_name . '"><i class="ti-trash"></i></a>';
                    return $edit . $delete;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        
        return view('admin.campaign.index');
    }

    public function create()
    {
        return view('admin.campaign.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'campaign_name' => 'required',
            'campaign_start' => 'required',
            'campaign_finish' => 'required',
        ]);

        Campaign::create($request->post());

        return redirect()->route('campaign.index')->with('success', 'Campaign has been created successfully.');
    }

    public function edit($id)
    {
        $campaign = Campaign::select('id', 'campaign_name', 'campaign_start', 'campaign_finish')->findOrFail($id);
        return view('admin.campaign.edit', compact('campaign'));
    }

    public function update($id, Request $request)
    {
        $campaign = Campaign::findOrFail($id);
        $request->validate([
            'campaign_name' => 'required',
            'campaign_start' => 'required',
            'campaign_finish' => 'required',
        ]);

        $campaign->fill($request->post())->save();

        return redirect()->route('campaign.index')->with('success', 'Campaign has been updated successfully');
    }

    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return redirect()->route('campaign.index')->with('success', 'Campaign has been deleted successfully');
    }
}
