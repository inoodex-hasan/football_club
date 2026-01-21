import React from "react";
import bkash from "../assets/bkash.svg";
import nagad from "../assets/nagad.svg";

const PaymentPage = () => {
    // Static data for demo
    // const data = {
    //     name: "John Doe",
    //     email: "johndoe@example.com",
    //     phone: "+8801700000000",
    //     age: 25,
    //     nid: "1234567890",
    //     address: "123, Dhaka, Bangladesh",
    //     educational_qualification: "High School",
    // };

    // const image_path = "assets/profile.jpg"; // static image path

    return (
        <div className="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div className="max-w-4xl mx-auto">
                {/* Header */}
                <div className="text-center mb-10">
                    <h1 className="text-3xl md:text-4xl font-bold text-[#1C398E]">
                        Payment Instructions
                    </h1>
                    <p className="mt-3 text-lg text-gray-600">
                        Below are the details and how to complete the payment.
                    </p>
                </div>

                {/* Payment Instructions */}
                <div className="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div className="p-8 md:p-10">
                        <h2 className="text-2xl font-bold text-gray-800 mb-8 text-center">
                            How to Complete Your Payment
                        </h2>

                        <div className="space-y-10">
                            {/* Bank Transfer */}
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
                                        </ul>
                                        <p className="mt-4 text-sm text-amber-800 bg-amber-100 p-3 rounded-lg">
                                            <strong>Important:</strong> Please
                                            mention your Name + Phone Number in
                                            the payment purpose/remarks.
                                        </p>
                                    </div>
                                    <p className="mt-4 text-gray-700">
                                        After transfer, send the payment
                                        receipt/screenshot to WhatsApp:
                                        +8801798594927 or <br /> email:
                                        ambit10nacademybangladesh@gmail.com
                                    </p>
                                    <p className="mt-2 text-sm text-gray-500">
                                        We will confirm your registration within
                                        24–48 hours.
                                    </p>
                                </div>
                            </div>

                            {/* Online Payment */}
                            <div className="flex items-start gap-6 md:gap-8">
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
                                        financial services. Include the
                                        athlete’s full name in the payment
                                        reference/notes.
                                    </p>
                                    <div className="grid md:grid-cols-2 gap-6">
                                        {/* bKash */}
                                        <div className="bg-white border border-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all">
                                            <div className="flex items-center  gap-3 mb-4">
                                                <img
                                                    src={bkash}
                                                    alt="bKash"
                                                    className="w-16 mx-auto "
                                                />
                                            </div>
                                            <div className="space-y-2 text-gray-700">
                                                <p>
                                                    <strong>
                                                        Merchant Name:
                                                    </strong>{" "}
                                                    AMBIT10N FOOTBALL & FUTSAL
                                                    ACADEMY BANGLADESH LTD
                                                </p>
                                                <p>
                                                    <strong>
                                                        Merchant Number:
                                                    </strong>{" "}
                                                    01307038528
                                                </p>
                                                <p className="text-sm text-gray-600 mt-3">
                                                    • Use “Make Payment” option
                                                    <br />• Add your name in
                                                    reference
                                                    <br />• Send screenshot to
                                                    confirm
                                                </p>
                                            </div>
                                        </div>

                                        {/* Nagad */}
                                        <div className="bg-white border border-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all">
                                            <div className="flex items-center gap-3 mb-4">
                                                <img
                                                    src={nagad}
                                                    alt="Nagad"
                                                    className="w-16 mx-auto"
                                                />
                                            </div>
                                            <div className="space-y-2 text-gray-700">
                                                <p>
                                                    <strong>
                                                        Merchant Name:
                                                    </strong>{" "}
                                                    AMBIT10N FOOTBALL & FUTSAL
                                                    ACADEMY BANGLADESH LTD
                                                </p>
                                                <p>
                                                    <strong>
                                                        Merchant Number:
                                                    </strong>{" "}
                                                    01307038528
                                                </p>
                                                <p className="text-sm text-gray-600 mt-3">
                                                    • Use “Make Payment” option
                                                    <br />• Add your name in
                                                    reference
                                                    <br />• Send screenshot to
                                                    confirm
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {/* Contact */}
                                    <div className="mt-8 bg-blue-50 border border-blue-100 rounded-xl p-5 text-center md:text-center">
                                        <p className="text-gray-800 font-medium mb-3">
                                            After payment, send the transaction
                                            screenshot to:
                                        </p>
                                        <div className="flex flex-col sm:flex-row items-center justify-center gap-4 md:justify-center">
                                            <a
                                                href="https://wa.me/8801798594927?text=Hi"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="inline-flex items-center gap-2 px-5 py-2.5 bg-blue text-white rounded-lg hover:bg-blue-900 transition font-medium"
                                            >
                                                Call / WhatsApp: +880 179 859
                                                4927
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Final Note */}
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

export default PaymentPage;
