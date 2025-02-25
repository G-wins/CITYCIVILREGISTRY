<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageRequirement;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ImageRequirementsController extends Controller
{
    // Show Reference Number in View
    public function showReference(Request $request)
    {
        return view('image_requirements', ['refNumber' => $request->input('refNumber', null)]);
    }

    // Store Uploaded Files
    public function store(Request $request)
    {
        try {
            Log::info('Incoming File Upload Request', $request->all());

            // Validate request
            $request->validate([
                'files.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:10240',
                'descriptions.*' => 'required|string|max:255',
                'refNumber' => 'required|string',
            ]);

            $referenceNumber = $request->input('refNumber');

            // List of appointment tables to check for reference_number
            $models = [
                \App\Models\AppointmentBirthCertificate::class,
                \App\Models\AppointmentMarriageCertificate::class,
                \App\Models\AppointmentMarriageLicense::class,
                \App\Models\AppointmentDeathCertificate::class,
                \App\Models\AppointmentCenomar::class,
                \App\Models\AppointmentOtherDocument::class,
            ];

            // Check if reference number exists in any table
            $exists = collect($models)->contains(fn($model) => $model::where('reference_number', $referenceNumber)->exists());

            if (!$exists) {
                Log::error('Reference number not found', ['referenceNumber' => $referenceNumber]);
                return response()->json(['success' => false, 'message' => "Reference number $referenceNumber does not exist."], 400);
            }

            // Process each uploaded file
            foreach ($request->file('files') as $index => $file) {
                $path = $file->store('uploads', 'public'); // Store in /storage/app/public/uploads

                ImageRequirement::create([
                    'file_path' => $path,
                    'description' => $request->descriptions[$index],
                    'reference_number' => $referenceNumber,
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Files uploaded successfully!']);
        } catch (\Exception $e) {
            Log::error('File upload error', ['exception' => $e]);
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again later.'], 500);
        }
    }

    // Show Uploaded Images Based on Reference Number
    public function showImages($reference_number)
    {
        $images = ImageRequirement::where('reference_number', $reference_number)->get();

        return view('images', [
            'images' => $images->isEmpty() ? null : $images,
            'error' => $images->isEmpty() ? 'No images found.' : null,
            'reference_number' => $reference_number,
        ]);
    }

    // Update Image Status (Approval/Rejection)
    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate(['status' => 'required|string|in:Approved,Rejected,Pending']);

            $image = ImageRequirement::findOrFail($id);
            $image->status = $request->status;
            $image->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again later.'], 500);
        }
    }
}
