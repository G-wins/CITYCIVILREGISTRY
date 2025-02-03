<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageRequirement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\log;

class ImageRequirementsController extends Controller
{
    public function showReference(Request $request)
    {
        $refNumber = null;

        // If the request is a POST and has 'refNumber', get its value
        if ($request->isMethod('post') && $request->has('refNumber')) {
            $refNumber = $request->input('refNumber');
        }

        // Pass the reference number to the view
        return view('image_requirements', ['refNumber' => $refNumber]);
    }


    public function store(Request $request){
        try {
            Log::info('Incoming File Upload Request', $request->all());
    
            $request->validate([
                'files.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:10240',
                'descriptions.*' => 'required|string|max:255',
                'refNumber' => 'required|string',
            ]);
    
            $referenceNumber = $request->input('refNumber');
    
            $models = [
                \App\Models\AppointmentBirthCertificate::class,
                \App\Models\AppointmentMarriageCertificate::class,
                \App\Models\AppointmentMarriageLicense::class,
                \App\Models\AppointmentDeathCertificate::class,
                \App\Models\AppointmentCenomar::class,
                \App\Models\AppointmentOtherDocument::class,
            ];
    
            $exists = false;
            foreach ($models as $model) {
                if ($model::where('reference_number', $referenceNumber)->exists()) {
                    $exists = true;
                    break;
                }
            }
    
            if (!$exists) {
                Log::error('Reference number not found', ['referenceNumber' => $referenceNumber]);
                return response()->json(['success' => false, 'message' => 'The reference number ' . $referenceNumber . ' does not exist.'], 400);
            }
    
            foreach ($request->file('files') as $index => $file) {
                Log::info('Processing File', [
                    'Original Name' => $file->getClientOriginalName(),
                    'Mime Type' => $file->getMimeType(),
                    'Size' => $file->getSize(),
                    'Temp Path' => $file->getPathname(),
                ]);
    
                $path = $file->store('uploads', 'public');
    
                DB::table('requirements_img_tbl')->insert([
                    'file_path' => $path,
                    'description' => $request->descriptions[$index],
                    'reference_number' => $referenceNumber,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            return response()->json(['success' => true, 'message' => 'Files uploaded successfully!']);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->errors()]);
            return response()->json(['success' => false, 'message' => 'Validation error: ' . json_encode($e->errors())], 400);
        } catch (\Exception $e) {
            Log::error('File upload error', ['message' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Server error: ' . $e->getMessage()], 500);
        }
    }
    
    
    
    



    public function showImages($reference_number)
    {
        // Fetch all images with the given reference_number
        $images = ImageRequirement::where('reference_number', $reference_number)->get();

        // Check if there are images
        if ($images->isEmpty()) {
            return view('images', ['error' => 'No images found for this reference number.', 'reference_number' => $reference_number]);
        }

        return view('images', ['images' => $images, 'reference_number' => $reference_number]);
    }

    public function updateStatus(Request $request, $id){
        try {
            // Validate the status
            $request->validate([
                'status' => 'required|string|in:Approved,Rejected,Pending'
            ]);

            // Find the image record by ID
            $image = DB::table('requirements_img_tbl')->where('id', $id)->first();

            if (!$image) {
                return response()->json(['success' => false, 'message' => 'Image not found'], 404);
            }

            // Update the status in the database
            DB::table('requirements_img_tbl')
                ->where('id', $id)
                ->update(['status' => $request->status]);

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Server error: ' . $e->getMessage()], 500);
        }
    }


}
