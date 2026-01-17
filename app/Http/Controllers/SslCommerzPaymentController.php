<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Log};
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\{Admission, GeneralSetting, Order, TrainingPackage};
use App\Traits\ImageUploadTrait;
use Brian2694\Toastr\Facades\Toastr;
use Inertia\Inertia;

class SslCommerzPaymentController extends Controller
{
    use ImageUploadTrait;
    /**
     * Private: Create or update order (instead of static method)
     */
    private function storeOrder(array $data): Order
    {
        $general=GeneralSetting::first();
        return Order::updateOrCreate(
            ['transaction_id' => $data['transaction_id']],
            [
                'training_package_id' => $data['training_package_id'] ?? null,
                'status'              => $data['status'] ?? 'Pending',
                'amount'              => $data['amount'] ?? 0,
                // 'currency'            => $data['currency'] ?? 'BDT',
                'currency'            => $general->currency_icon,
                'bank_tran_id'        => $data['bank_tran_id'] ?? null,
                'card_type'           => $data['card_type'] ?? null,
                'card_issuer'         => $data['card_issuer'] ?? null,
            ]
        );
    }

    /**
     * Private: Create admission (instead of static method)
     */
    private function createAdmission(Order $order, array $data): Admission
    {
        $imagePath = $data['image'] ?? null;

        return Admission::updateOrCreate(
            ['order_id' => $order->id],
            [
                'training_package_id' => $order->training_package_id,
                'name'                => $data['name'] ?? $order->customer_name,
                'email'               => $data['email'] ?? $order->customer_email,
                'phone'               => $data['phone'] ?? $order->customer_phone,
                'educational_qualification' => $data['educational_qualification'] ?? $order->educational_qualification,
                'address'             => $data['address'] ?? $order->customer_address,
                'nid'                 => $data['nid'] ?? $order->nid,
                'age'                 => $data['age'] ?? $order->age,
                'image'               => $imagePath,
                'status'              => 'pending',
            ]
        );
    }

    /**
     * SSL Payment Initiation
     */
    public function index(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:training_packages,id',
            'name'       => 'required|string|max:100',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'address'    => 'nullable|string|max:255',
            'nid'        => 'nullable|string|max:50',
            'educational_qualification' => 'nullable|string|max:100',
            'age'        => 'required|integer|min:8',
            'image'      => 'nullable|image|max:2048',
        ]);

        $package = TrainingPackage::findOrFail($request->package_id);
        $tran_id = uniqid('tran_');

        // Image upload
       $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request, 'image', 'uploads/admissions');
        }

        // Create pending order using private method
        $order = $this->storeOrder([
            'transaction_id'      => $tran_id,
            'training_package_id' => $package->id,
            'amount'              => $package->price,
            'currency'            => 'BDT',
            'status'              => 'Pending',
        ]);

        // Create admission using private method
        $this->createAdmission($order, [
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'educational_qualification' => $request->educational_qualification ?? null,
            'address' => $request->address ?? null,
            'nid'     => $request->nid ?? null,
            'age'     => $request->age,
            'image'   => $imagePath,
        ]);

        // Post data
        $post_data = [
            'total_amount'     => $package->price,
            'currency'         => 'BDT',
            'tran_id'          => $tran_id,
            'cus_name'         => $request->name,
            'cus_email'        => $request->email,
            'cus_phone'        => $request->phone,
            'cus_add1'         => $request->address ?? 'N/A',
            'cus_country'      => "Bangladesh",
            'shipping_method'  => "NO",
            'product_name'     => $package->name,
            'product_category' => "Training Package",
            'product_profile'  => "physical-goods",
            'value_a' => $package->id,
            'value_b' => $request->name,
            'value_c' => $request->email,
            'value_d' => $request->phone,
            'value_e' => $request->address ?? 'N/A',
            'value_f' => $request->nid,
            'value_h' => $request->age,
            'value_i' => $imagePath, 
        ];

        $sslc = new SslCommerzNotification();
        return $sslc->makePayment($post_data, 'hosted');
    }

    public function success(Request $request)
    {
        $tran_id  = $request->tran_id;
        $amount   = $request->amount;
        $currency = $request->currency;

        $sslc = new SslCommerzNotification();
        $valid = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

        if ($valid && $request->status === 'VALID') {
            $order = Order::where('transaction_id', $tran_id)
                ->where('status', 'Pending')
                ->first();

            if (!$order || $order->amount != $amount) {
                return Inertia::render('FailCancel', [
                    'tran_id' => $tran_id ?? 'unknown',
                    'status'  => 'fail',
                ]);
            }

            // Update order using private method
            $this->storeOrder([
                'transaction_id' => $tran_id,
                'training_package_id' => $order->training_package_id,
                'amount'         => $order->amount,
                'currency'       => $order->currency,
                'status'         => 'Processing',
                'bank_tran_id'   => $request->bank_tran_id ?? null,
                'card_type'      => $request->card_type ?? null,
                'card_issuer'    => $request->card_issuer ?? null,
            ]);

            // Update admission status
            if ($order->admission) {
                $order->admission->update(['status' => 'completed']);
            }

            return Inertia::render('Success', [
                'tran_id' => $tran_id,
                'status'  => 'success',
            ]);
        }

        return Inertia::render('FailCancel', [
            'tran_id' => $tran_id ?? 'unknown',
            'status'  => 'fail',
        ]);
    }

    public function fail(Request $request)
    {
        return Inertia::render('FailCancel', [
            'tran_id' => $request->tran_id ?? 'unknown',
            'status'  => 'fail',
        ]);
    }

    public function cancel(Request $request)
    {
        return Inertia::render('FailCancel', [
            'tran_id' => $request->tran_id ?? 'unknown',
            'status'  => 'cancel',
        ]);
    }

    public function ipn(Request $request)
    {
        if ($request->status === 'VALID') {
            $tran_id = $request->tran_id;
            $order = Order::where('transaction_id', $tran_id)->first();

            if ($order && $order->status !== 'Processing') {
                $sslc = new SslCommerzNotification();
                $valid = $sslc->orderValidate($request->all(), $tran_id, $order->amount, $order->currency);

                if ($valid) {
                    $this->storeOrder([
                        'transaction_id' => $tran_id,
                        'status'         => 'Processing',
                    ]);
                }
            }
        }

        return response()->json(['status' => 'IPN processed']);
    }

public function codOrder(Request $request)
{
    // Log incoming request for debugging (same as register)
    Log::info('COD registration request received', [
        'all_data' => $request->except(['image']),
        'has_image' => $request->hasFile('image'),
        'payment_method' => $request->input('payment_method', 'cod'),
    ]);

    // Validate incoming data (same style as register, but adjusted for COD)
    $validated = $request->validate([
        'training_package_id'        => 'required|exists:training_packages,id',
        'name'                       => 'required|string|max:255',
        'email'                      => 'required|email|max:255',
        'phone'                      => 'required|string|max:20',
        'educational_qualification'  => 'nullable|string|max:255',
        'age'                        => 'required|integer|min:12|max:60',
        'nid'                        => 'required|string|max:50',
        'address'                    => 'nullable|string|max:500',
        'image'                      => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        // payment_method is optional here since we force "cod"
    ]);

    try {
        // Get currency setting with fallback (same as register)
        $general = GeneralSetting::select('currency_name', 'currency_icon')->first();
        $currencyIcon = $general ? $general->currency_icon : '৳';

        // Find package (same as register)
        $package = TrainingPackage::findOrFail($validated['training_package_id']);

        // Handle image upload (same as register)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request, 'image', 'uploads/admissions');
        }

        // Create records inside transaction (same logic as register)
        $created = DB::transaction(function () use ($validated, $package, $imagePath, $currencyIcon) {

            // $transactionId = 'cod-' . time() . '-' . rand(1000, 999999999);
            $transactionId = 'cod-' . substr(str_replace('-', '', (string) \Illuminate\Support\Str::uuid()), 0, 8);

            // Create Order – same structure as register, but force COD
            $order = Order::create([
                'training_package_id' => $package->id,
                'transaction_id'      => $transactionId,
                'status'              => 'pending',
                'amount'              => $package->price,
                'currency'            => $currencyIcon,
                'bank_tran_id'        => null,
                'card_type'           => 'N/A',
                'card_issuer'         => 'N/A',
                'payment_method'      => 'cod',
            ]);

            // Create Admission – identical to register
            $admission = Admission::create([
                'order_id'                  => $order->id,
                'name'                      => $validated['name'],
                'email'                     => $validated['email'],
                'phone'                     => $validated['phone'],
                'educational_qualification' => $validated['educational_qualification'] ?? null,
                'age'                       => $validated['age'],
                'nid'                       => $validated['nid'],
                'address'                   => $validated['address'] ?? null,
                'status'                    => 'Pending',
                'training_package_id'       => $package->id,
                'image'                     => $imagePath,
            ]);

            return compact('order', 'admission');
        });

        // Success → return same Inertia page as register (no redirect!)
       return Inertia::render('ReviewPaymentCod', [
        'order'     => $created['order']->load('trainingPackage'),
        'admission' => $created['admission'],
    ]);

    } catch (\Exception $e) {
        // Same error handling as register
        Log::error('COD registration failed', [
            'message' => $e->getMessage(),
            'trace'   => $e->getTraceAsString(),
            'request' => $request->except(['image']),
        ]);

        if (app()->environment('local')) {
            throw $e; // see exact error in browser during development
        }

        Toastr::error('Something went wrong while processing your registration. Please try again.');
        return redirect()->back()->withInput();
    }
}

    // public function codOrder(Request $request)
    // {
    //     dd($request->all());
    //     $request->validate([
    //         'package_id' => 'required|exists:training_packages,id',
    //         'name'       => 'required|string|max:100',
    //         'email'      => 'required|email',
    //         'phone'      => 'required|string|max:20',
    //         'address'    => 'nullable|string|max:255',
    //         'nid'        => 'nullable|string|max:20',
    //         'educational_qualification' => 'nullable|string|max:100',
    //         'age'        => 'nullable|integer|min:0',
    //         'image'      => 'nullable|image|max:2048',
    //         'payment_method' => 'nullable|string|max:20',
    //     ]);

    //     $package = TrainingPackage::findOrFail($request->package_id);
    //     $tran_id = uniqid('cod_');

    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $this->uploadImage($request, 'image', 'uploads/admissions');
    //     }

    //     $order = $this->storeOrder([
    //         'transaction_id'      => $tran_id,
    //         'training_package_id' => $package->id,
    //         'amount'              => $package->price,
    //         'currency'            => 'BDT',
    //         'status'              => 'Pending',
    //         'card_type'           => 'Doorstep',
    //         'card_issuer'         => 'N/A',
    //         'bank_tran_id'        => 'N/A',
    //         'payment_method'      => 'cod',
    //     ]);

    //     $this->createAdmission($order, [
    //         'name'    => $request->name,
    //         'email'   => $request->email,
    //         'phone'   => $request->phone,
    //         'educational_qualification' => $request->educational_qualification ?? null,
    //         'address' => $request->address ?? null,
    //         'nid'     => $request->nid ?? null,
    //         'age'     => $request->age,
    //         'image'   => $imagePath,
    //     ]);

    //     Toastr::success('Admission has been created successfully');
    //     return redirect()->route('home');
    //         // return Inertia::render('Success', [
    //         //     'tran_id' => $tran_id,
    //         //     'status'  => 'success',
    //         // ]);
    // }

    public function review(Request $request)
{
    // Validate all fields (same as your store validation)
    $validated = $request->validate([
        'package_id' => 'required|exists:training_packages,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'educational_qualification' => 'nullable|string',
        'address' => 'required|string',
        'nid' => 'required|string',
        'age' => 'required|integer|min:16',
        'image' => 'nullable|image|max:5120', 
    ]);

    // Store temporarily in session (simple way)
    $request->session()->put('pending_registration', [
        'data' => $validated,
        'image_path' => $request->hasFile('image') 
            ? $request->file('image')->store('temp_images', 'public') 
            : null,
    ]);

    // Or better: create pending record in DB
    // $pending = PendingRegistration::create([...$validated, 'image' => $path, 'status' => 'review']);

    return Inertia::render('ReviewPayment', [
        'pending' => $request->session()->get('pending_registration'),
        // 'pending' => $pending, // if using DB
    ]);
}
}
