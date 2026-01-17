// ReviewPaymentCod.jsx
import React from "react";

const ReviewPaymentCod = ({ order, admission }) => {
    // Fallback if data is missing
    if (!order || !admission) {
        return (
            <div className="min-h-screen flex items-center justify-center bg-gray-50 p-8">
                <div className="text-center bg-white p-10 rounded-2xl shadow-xl max-w-md">
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

    const user = admission;
    const pkg = order.trainingPackage;

    return (
        <div className="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div className="max-w-4xl mx-auto">
                {/* Success Header */}
                <div className="text-center mb-12">
                    <h1 className="text-4xl md:text-5xl font-bold text-green-600 mb-4">
                        Registration Successful!
                    </h1>
                    <p className="text-xl text-gray-700">
                        Thank you for registering. Your details are below.
                    </p>
                    <p className="text-gray-600 mt-2">
                        We will contact you soon for confirmation. Pay on the
                        day of training.
                    </p>
                </div>

                {/* Chosen Package */}
                {pkg && (
                    <div className="mb-12 bg-blue-50 border border-[#1C398E]/30 rounded-2xl p-8 shadow-md">
                        <div className="flex flex-col md:flex-row justify-between items-center gap-6">
                            <div>
                                <span className="text-sm font-bold uppercase text-[#1C398E] tracking-wide block mb-2">
                                    Selected Package
                                </span>
                                <h2 className="text-3xl font-bold text-gray-900">
                                    {pkg.name}
                                </h2>
                            </div>
                            <div className="text-center md:text-right">
                                <div className="text-5xl font-black text-[#1C398E]">
                                    ৳{pkg.price}
                                </div>
                                <div className="text-gray-600 mt-2 text-lg">
                                    {pkg.duration || "Duration not specified"}
                                </div>
                            </div>
                        </div>
                    </div>
                )}

                {/* User Details */}
                <div className="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div className="p-8 md:p-12">
                        <h2 className="text-3xl font-bold text-gray-800 mb-10 border-b pb-5">
                            Your Registration Details
                        </h2>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-800 text-lg">
                            <div>
                                <span className="font-semibold block text-gray-600 mb-2">
                                    Full Name
                                </span>
                                <p>{user.name}</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600 mb-2">
                                    Email
                                </span>
                                <p>{user.email}</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600 mb-2">
                                    Phone
                                </span>
                                <p>{user.phone}</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600 mb-2">
                                    Age
                                </span>
                                <p>{user.age} years</p>
                            </div>
                            <div>
                                <span className="font-semibold block text-gray-600 mb-2">
                                    NID / Birth Certificate
                                </span>
                                <p>{user.nid}</p>
                            </div>
                            <div className="md:col-span-2">
                                <span className="font-semibold block text-gray-600 mb-2">
                                    Permanent Address
                                </span>
                                <p>{user.address || "—"}</p>
                            </div>
                            <div className="md:col-span-2">
                                <span className="font-semibold block text-gray-600 mb-2">
                                    Educational Qualification
                                </span>
                                <p>
                                    {user.educational_qualification ||
                                        "Not provided"}
                                </p>
                            </div>
                        </div>

                        {user.image && (
                            <div className="mt-12 pt-10 border-t border-gray-200">
                                <span className="font-semibold block text-gray-600 mb-4 text-lg">
                                    Uploaded Profile Photo
                                </span>
                                <div className="flex justify-center md:justify-start">
                                    <img
                                        src={`/storage/${user.image}`}
                                        alt="Profile"
                                        className="max-w-xs md:max-w-md rounded-2xl shadow-lg border border-gray-200 object-cover"
                                    />
                                </div>
                            </div>
                        )}
                    </div>
                </div>

                {/* Simple footer */}
                <div className="mt-12 text-center text-gray-600">
                    <p className="text-lg">
                        Thank you for choosing us! We look forward to seeing you
                        at the training.
                    </p>
                </div>
            </div>
        </div>
    );
};

export default ReviewPaymentCod;
