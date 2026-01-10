<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\AdmissionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admission\{AdmissionStoreRequest, AdmissionUpdateRequest};
use App\Models\{Admission, GeneralSetting, Order, TrainingPackage};
use App\Traits\ImageUploadTrait;
use Brian2694\Toastr\Facades\Toastr;

class AdmissionController extends Controller
{
    use ImageUploadTrait;
    public function index(AdmissionDataTable $dataTable)
    {
        return $dataTable->render('backend.admission.index');
    }

    public function show(string $id)
    {
        $admissions = Admission::findOrFail($id);
        $trainingPackages = TrainingPackage::where('id', $admissions->training_package_id)->get();
        return view('backend.admission.show', compact('admissions', 'trainingPackages'));
    }
    public function create()
    {
        $trainingPackages = TrainingPackage::select('id', 'name')->get();
        return view('backend.admission.create', compact('trainingPackages'));
    }

    public function store(AdmissionStoreRequest $request)
    {
        //  Upload image if exists
        $imagePath = $request->hasFile('image')
            ? $this->uploadImage($request, 'image', 'uploads/admissions')
            : null;

        $general = GeneralSetting::select('currency_name', 'currency_icon')->first();

        $package = TrainingPackage::findOrFail($request->training_package_id);

        //  Transaction: Order + Admission
        DB::transaction(function () use ($request, $package, $imagePath, $general) {

            // Generate unique transaction id
            $transactionId = 'tran_adm-' . time() . '-' . rand(1000, 999999999);

            // Create Order
            $order = Order::create([
                'training_package_id' => $package->id,
                'transaction_id' => $transactionId,
                'status' => 'pending',
                'amount' => $package->price,
                'currency' => $general->currency_icon,
                'bank_tran_id' => null,
                'card_type' => null,
                'card_issuer' => null,
            ]);

            // Create Admission linked with order
            Admission::create([
                'order_id' => $order->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'educational_qualification' => $request->educational_qualification,
                'age' => $request->age,
                'nid' => $request->nid,
                'address' => $request->address ?? null,
                'status' => $request->status ?? 'Pending',
                'training_package_id' => $package->id,
                'image' => $imagePath,
            ]);
        });

        Toastr::success('Admission created successfully');
        return redirect()->route('admin.admission.index');
    }

    public function edit(string $id)
    {
        $admission = Admission::with('order')->findOrFail($id);
        $trainingPackages = TrainingPackage::select('id', 'name')->get();
        return view('backend.admission.edit', compact('admission', 'trainingPackages'));
    }

    public function update(AdmissionUpdateRequest $request, $id)
    {
        // Find the admission with its order
        $admission = Admission::with('order')->findOrFail($id);
        $order = $admission->order;

        // Handle image upload using your trait method
        if ($request->hasFile('image')) {
            $imagePath = $this->updateImage($request, 'image', 'uploads/admissions', $admission->image);
        } else {
            $imagePath = $admission->image; // Keep old image
        }

        DB::transaction(function () use ($request, $admission, $order, $imagePath) {

            // Update Order if it exists
            if ($order) {
                $order->update([
                    'status' => $request->order_status ?? $order->status,
                    'training_package_id' => $request->training_package_id ?? $order->training_package_id,
                ]);
            }

            // Update Admission
            $admission->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'educational_qualification' => $request->educational_qualification,
                'age' => $request->age,
                'nid' => $request->nid,
                'address' => $request->address ?? null,
                'status' => $request->status ?? $admission->status,
                'training_package_id' => $request->training_package_id,
                'image' => $imagePath,
            ]);
        });

        Toastr::success('Admission updated successfully');
        return redirect()->route('admin.admission.index');
    }
}
