import React from "react";
import bkash from "../assets/bkash.svg";
import nagad from "../assets/nagad.svg";

const ReviewPayment = ({ pending }) => {
    // If no data came through (edge case)
    if (!pending?.data) {
        return (
            <div className="min-h-screen bg-gray-50 py-12 px-4 flex items-center justify-center">
                <div className="bg-white p-8 rounded-2xl shadow-lg text-center max-w-md">
                    <h2 className="text-2xl font-bold text-red-600 mb-4">
                        No Data Found
                    </h2>
                    <p className="text-gray-700">
                        Something went wrong. Please go back and fill the
                        registration form again.
                    </p>
                </div>
            </div>
        );
    }

    const { data } = pending;

    return (
        <div className="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div className="max-w-4xl mx-auto">
                {/* Header */}
                <div className="text-center mb-10">
                    <h1 className="text-3xl md:text-4xl font-bold text-[#1C398E]">
                        Registration Received – Payment Instructions
                    </h1>
                    <p className="mt-3 text-lg text-gray-600">
                        Thank you for registering! Below are your details and
                        how to complete the payment.
                    </p>
                </div>

                {/* User Details Card */}
                <div className="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-10">
                    <div className="p-8 md:p-10">
                        <h2 className="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">
                            Your Registration Details
                        </h2>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-800">
                            <div>
                                <span className="font-semibold block text-gray-600">
                                    Full Name
                                </span>
                                <p className="mt-1">{data.name}</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600">
                                    Email
                                </span>
                                <p className="mt-1">{data.email}</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600">
                                    Phone
                                </span>
                                <p className="mt-1">{data.phone}</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600">
                                    Age
                                </span>
                                <p className="mt-1">{data.age} years</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600">
                                    NID / Birth Certificate
                                </span>
                                <p className="mt-1">{data.nid}</p>
                            </div>
                            <div className="md:col-span-2">
                                <span className="font-semibold block text-gray-600">
                                    Permanent Address
                                </span>
                                <p className="mt-1">{data.address}</p>
                            </div>
                            <div className="md:col-span-2">
                                <span className="font-semibold block text-gray-600">
                                    Educational Qualification
                                </span>
                                <p className="mt-1">
                                    {data.educational_qualification ||
                                        "Not provided"}
                                </p>
                            </div>
                        </div>

                        {pending.image_path && (
                            <div className="mt-8">
                                <span className="font-semibold block text-gray-600 mb-2">
                                    Uploaded Photo
                                </span>
                                <img
                                    src={`/${pending.image_path}`}
                                    alt="Profile"
                                    className="max-w-xs rounded-xl shadow-md border border-gray-200"
                                />
                            </div>
                        )}
                    </div>
                </div>

                {/* Payment Instructions */}
                <div className="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div className="p-8 md:p-10">
                        <h2 className="text-2xl font-bold text-gray-800 mb-8 text-center">
                            How to Complete Your Payment
                        </h2>

                        <div className="space-y-10">
                            {/* Option 1 - Pay on Doorstep */}
                            {/* <div className="flex items-start gap-5">
                                <div className="flex-shrink-0 w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                                    <span className="text-2xl text-green-600">
                                        ৳
                                    </span>
                                </div>
                                <div>
                                    <h3 className="text-xl font-bold text-green-700 mb-2">
                                        Pay on Doorstep (Cash on Arrival)
                                    </h3>
                                    <p className="text-gray-700">
                                        You can pay the full amount in cash when
                                        you arrive at the training venue on the
                                        first day. No advance payment required
                                        for this option.
                                    </p>
                                    <p className="mt-2 text-sm text-gray-500">
                                        Preferred if you're local and want to
                                        confirm your seat in person.
                                    </p>
                                </div>
                            </div> */}

                            {/* Option 2 - Bank Transfer */}
                            <div className="flex items-start gap-5">
                                <div className="flex-shrink-0 w-14 h-14 bg-amber-100 rounded-full flex items-center justify-center">
                                    <span className="text-2xl text-amber-700">
                                        🏦
                                    </span>
                                </div>
                                <div>
                                    <h3 className="text-xl font-bold text-amber-800 mb-2">
                                        Bank Transfer (Manual)
                                    </h3>
                                    <div className="bg-amber-50 p-5 rounded-xl border border-amber-200 mt-3">
                                        <p className="font-semibold mb-3">
                                            Bank Details:
                                        </p>
                                        <ul className="space-y-2 text-gray-800">
                                            <li>
                                                <strong>Bank:</strong> Trust
                                                Bank PLC
                                            </li>
                                            <li>
                                                <strong>Account Name:</strong>{" "}
                                                AMBIT10N FOOTBALL AND FUTSAL
                                                ACADEMY BANGLADESH
                                            </li>
                                            <li>
                                                <strong>Account Number:</strong>{" "}
                                                00410210020404
                                            </li>
                                            <li>
                                                <strong>Branch:</strong> Kafrul
                                            </li>
                                            {/* <li>
                                                <strong>Routing Number:</strong>{" "}
                                                0902715XXX
                                            </li> */}
                                        </ul>
                                        <p className="mt-4 text-sm text-amber-800 bg-amber-100 p-3 rounded-lg">
                                            <strong>Important:</strong> Please
                                            mention your{" "}
                                            <strong>Name + Phone Number</strong>{" "}
                                            in the payment purpose/remarks.
                                        </p>
                                    </div>
                                    <p className="mt-4 text-gray-700">
                                        After transfer, please send the payment
                                        receipt/screenshot to WhatsApp:
                                        +8801798594927 or email:
                                        ambit10nacademybangladesh@gmail.com
                                    </p>
                                    <p className="mt-2 text-sm text-gray-500">
                                        We will confirm your registration within
                                        24–48 hours after verification.
                                    </p>
                                </div>
                            </div>

                            {/* Option 3 - Online Payment */}
                            <div className="flex items-start gap-6 md:gap-8">
                                {/* Icon circle */}
                                <div className="flex-shrink-0 w-14 h-14 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center shadow-sm">
                                    <span className="text-3xl md:text-4xl text-[#1C398E]">
                                        💳
                                    </span>
                                </div>

                                <div className="flex-1">
                                    <h3 className="text-xl md:text-2xl font-bold text-[#1C398E] mb-3">
                                        Pay Online (Instant)
                                    </h3>

                                    <p className="text-gray-700 mb-6 leading-relaxed">
                                        Pay securely using popular mobile
                                        financial services. Include the{" "}
                                        <strong>athlete’s full name</strong> in
                                        the payment reference/notes for quick
                                        identification.
                                    </p>

                                    <div className="grid md:grid-cols-2 gap-6">
                                        {/* bKash Card */}
                                        <div className="bg-white border border-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all">
                                            <div className="flex items-center gap-3 mb-4">
                                                <span className="text-3xl">
                                                    <img src={bkash} alt="" />
                                                </span>
                                            </div>
                                            <div className="space-y-2 text-gray-700">
                                                <p>
                                                    <strong>
                                                        Merchant Name:
                                                    </strong>
                                                    <br />
                                                    AMBIT10N FOOTBALL & FUTSAL
                                                    ACADEMY BANGLADESH LTD
                                                </p>
                                                <p>
                                                    <strong>
                                                        Merchant Number:
                                                    </strong>
                                                    <br />
                                                    <span className="font-medium">
                                                        01307038528
                                                    </span>
                                                </p>
                                                <p className="text-sm text-gray-600 mt-3">
                                                    • Use “Make Payment” option
                                                    <br />
                                                    • Add your name in reference
                                                    <br />• Send screenshot to
                                                    confirm
                                                </p>
                                            </div>
                                        </div>

                                        {/* Nagad Card */}
                                        <div className="bg-white border border-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all">
                                            <div className="flex items-center gap-3 mb-4">
                                                <span className="text-3xl">
                                                    <img src={nagad} alt="" />
                                                </span>
                                            </div>
                                            <div className="space-y-2 text-gray-700">
                                                <p>
                                                    <strong>
                                                        Merchant Name:
                                                    </strong>
                                                    <br />
                                                    AMBIT10N FOOTBALL & FUTSAL
                                                    ACADEMY BANGLADESH LTD
                                                </p>
                                                <p>
                                                    <strong>
                                                        Merchant Number:
                                                    </strong>
                                                    <br />
                                                    <span className="font-medium">
                                                        01307038528
                                                    </span>
                                                </p>
                                                <p className="text-sm text-gray-600 mt-3">
                                                    • Use “Make Payment” option
                                                    <br />
                                                    • Add your name in reference
                                                    <br />• Send screenshot to
                                                    confirm
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {/* Confirmation & Contact */}
                                    <div className="mt-8 bg-blue-50 border border-blue-100 rounded-xl p-5 text-center md:text-left">
                                        <p className="text-gray-800 font-medium mb-3">
                                            After payment, please send the
                                            transaction screenshot to:
                                        </p>
                                        <div className="flex flex-col sm:flex-row items-center justify-center gap-4 md:justify-start">
                                            <a
                                                href="tel:+8801798594927"
                                                className="inline-flex items-center gap-2 px-5 py-2.5 bg-[#1C398E] text-white rounded-lg hover:bg-blue-900 transition font-medium"
                                            >
                                                <span>Call / WhatsApp</span>
                                                <span>+880 179 859 4927</span>
                                            </a>
                                        </div>
                                        <p className="mt-4 text-sm text-gray-600">
                                            We will confirm your registration
                                            within a few hours after receiving
                                            the payment.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Final note */}
                        <div className="mt-12 pt-8 border-t border-gray-200 text-center">
                            <p className="text-gray-700 font-medium">
                                Any questions? Feel free to contact us:
                            </p>
                            <p className="mt-2 text-[#1C398E] font-semibold">
                                WhatsApp / Call: +880 179 859 4927
                                <br />
                                Email: ambit10nacademybangladesh@gmail.com
                            </p>
                            <p className="mt-6 text-sm text-gray-500">
                                Thank you for choosing us — we look forward to
                                seeing you at the training!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ReviewPayment;
