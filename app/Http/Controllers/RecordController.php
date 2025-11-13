<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RecordController extends Controller
{
     public function addRecord(Request $request)
    {
        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'BusinessName' => 'nullable|string|max:255',
            'Email' => 'required|email|unique:records,Email',
            'PhoneNumber' => 'nullable|string|max:20',
            'File' => 'nullable|file',
            'message' => 'nullable|string',
        ]);

        // Save the record
        Record::create($validated);

        return back()->with('success', 'Record saved successfully!');
    }

  public function index()
{
    $records = Record::all();
    return view('records.index', compact('records'));
}

    public function show($id)
    {
        $record = Record::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {   
        $record = Record::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'FullName' => 'sometimes|required|string|max:255',
            'BusinessName' => 'sometimes|nullable|string|max:255',
            'Email' => 'sometimes|required|email|unique:records,Email,' . $id,
            'PhoneNumber' => 'sometimes|nullable|string|max:20',
            'File' => 'sometimes|nullable|file',
            'message' => 'sometimes|nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $record->update($validator->validated());

        return response()->json(['message' => 'Record updated successfully', 'record' => $record]);
    }

    public function destroy($id)
    {
        $record = Record::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $record->delete();

        return response()->json(['message' => 'Record deleted successfully']);
    }

}
