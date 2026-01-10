import React from "react";
import { useForm } from "@inertiajs/react";
import {
    User,
    Mail,
    Phone,
    MapPin,
    CreditCard,
    Calendar,
    Upload,
    CheckCircle2,
    GraduationCap,
} from "lucide-react";

const TrainingRegistration = ({ training_package, selected_id }) => {
    // Initialize form state
    // We use package_id as the single source of truth for the selection
    const { data, setData, post, processing, errors } = useForm({
        package_id: selected_id || "",
        name: "",
        email: "",
        phone: "",
        educational_qualification: "",
        address: "",
        nid: "",
        age: "",
        image: null,
    });

    // Find the details of the currently selected package dynamically
    const currentPackage = training_package.find(
        (pkg) => pkg.id == data.package_id
    );

    // Validation helper
    const validateForm = () => {
        if (
            !data.package_id ||
            !data.name ||
            !data.email ||
            !data.phone ||
            !data.address ||
            !data.nid ||
            !data.age
        ) {
            alert("Please fill all required fields and select a package.");
            return false;
        }
        return true;
    };

    // COD Payment handler using Inertia
    const handleCodPayment = (e) => {
        e.preventDefault();
        if (!validateForm()) return;

        post("/cod-order", {
            forceFormData: true,
            onSuccess: () => alert("Registration Successful!"),
            onError: (err) => console.error(err),
        });
    };

    // SSL Payment handler using standard Form submission to handle external redirects
    const handleSslPayment = (e) => {
        e.preventDefault();
        if (!validateForm()) return;

        const form = document.createElement("form");
        form.method = "POST";
        form.action = "/pay";
        form.enctype = "multipart/form-data";

        // CSRF
        const csrf = document.querySelector('meta[name="csrf-token"]').content;
        const csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = csrf;
        form.appendChild(csrfInput);

        const fields = {
            package_id: data.package_id,
            name: data.name,
            email: data.email,
            phone: data.phone,
            educational_qualification: data.educational_qualification,
            address: data.address,
            nid: data.nid,
            age: data.age,
        };

        Object.entries(fields).forEach(([key, value]) => {
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = key;
            input.value = value;
            form.appendChild(input);
        });

        if (data.image) {
            const dt = new DataTransfer();
            dt.items.add(data.image);

            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.name = "image";
            fileInput.files = dt.files;
            form.appendChild(fileInput);
        }

        document.body.appendChild(form);
        form.submit();
    };

    return (
        <div className="min-h-screen bg-gray-50 py-12 px-4">
            <div className="max-w-4xl mx-auto">
                {/* Header */}
                <div className="text-center mb-10">
                    <h1 className="text-3xl font-bold text-[#1C398E]">
                        Complete Your Registration
                    </h1>
                    <p className="text-gray-500 mt-2">
                        Provide your details to join the academy
                    </p>
                </div>

                {/* Selected Package Summary - Updates when dropdown changes */}
                {currentPackage && (
                    <div className="mb-8 bg-blue-50 border-2 border-[#1C398E] rounded-2xl p-6 flex flex-col md:flex-row justify-between items-center shadow-sm animate-in fade-in duration-500">
                        <div>
                            <span className="text-xs font-bold uppercase tracking-wider text-[#1C398E] block mb-1">
                                Selected Program
                            </span>
                            <h2 className="text-2xl font-bold text-gray-900">
                                {currentPackage.name}
                            </h2>
                        </div>
                        <div className="text-right mt-4 md:mt-0">
                            <div className="text-3xl font-black text-[#1C398E]">
                                ৳{currentPackage.price}
                            </div>
                            <div className="text-sm font-medium text-gray-500">
                                {currentPackage.duration}
                            </div>
                        </div>
                    </div>
                )}

                <div className="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
                    <div className="p-8 md:p-12">
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {/* Package Selection */}
                            <div className="md:col-span-2 space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <CheckCircle2
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Select Training Package *
                                </label>
                                <select
                                    value={data.package_id}
                                    onChange={(e) =>
                                        setData("package_id", e.target.value)
                                    }
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none transition appearance-none"
                                    required
                                >
                                    <option value="">
                                        -- Choose a Package --
                                    </option>
                                    {training_package.map((pkg) => (
                                        <option key={pkg.id} value={pkg.id}>
                                            {pkg.name} (৳{pkg.price})
                                        </option>
                                    ))}
                                </select>
                                {errors.package_id && (
                                    <p className="text-red-500 text-xs">
                                        {errors.package_id}
                                    </p>
                                )}
                            </div>

                            {/* Full Name */}
                            <div className="space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <User
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Full Name *
                                </label>
                                <input
                                    type="text"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData("name", e.target.value)
                                    }
                                    placeholder="Enter your name"
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none"
                                />
                                {errors.name && (
                                    <p className="text-red-500 text-xs">
                                        {errors.name}
                                    </p>
                                )}
                            </div>

                            {/* Email */}
                            <div className="space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <Mail
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Email Address *
                                </label>
                                <input
                                    type="email"
                                    value={data.email}
                                    onChange={(e) =>
                                        setData("email", e.target.value)
                                    }
                                    placeholder="email@example.com"
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none"
                                />
                            </div>

                            {/* Phone */}
                            <div className="space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <Phone
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Phone Number *
                                </label>
                                <input
                                    type="tel"
                                    value={data.phone}
                                    onChange={(e) =>
                                        setData("phone", e.target.value)
                                    }
                                    placeholder="+880 1XXX-XXXXXX"
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none"
                                />
                            </div>

                            {/* Educational Qualification */}
                            <div className="space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <GraduationCap
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Educational Qualification *
                                </label>
                                <input
                                    type="text"
                                    value={data.educational_qualification}
                                    onChange={(e) =>
                                        setData(
                                            "educational_qualification",
                                            e.target.value
                                        )
                                    }
                                    placeholder="Enter qualification"
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none"
                                />
                            </div>

                            {/* Age */}
                            <div className="space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <Calendar
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Age *
                                </label>
                                <input
                                    type="number"
                                    value={data.age}
                                    onChange={(e) =>
                                        setData("age", e.target.value)
                                    }
                                    placeholder="18"
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none"
                                />
                            </div>

                            {/* NID */}
                            <div className="space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <CreditCard
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    NID / Birth Certificate *
                                </label>
                                <input
                                    type="text"
                                    value={data.nid}
                                    onChange={(e) =>
                                        setData("nid", e.target.value)
                                    }
                                    placeholder="Enter identification number"
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none"
                                />
                            </div>

                            {/* Address */}
                            <div className="md:col-span-2 space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <MapPin
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Permanent Address *
                                </label>
                                <input
                                    type="text"
                                    value={data.address}
                                    onChange={(e) =>
                                        setData("address", e.target.value)
                                    }
                                    placeholder="House, Road, City"
                                    className="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#1C398E] outline-none"
                                />
                            </div>

                            {/* Image Upload */}
                            <div className="md:col-span-2 space-y-2">
                                <label className="text-sm font-bold text-gray-700 flex items-center gap-2">
                                    <Upload
                                        size={16}
                                        className="text-[#1C398E]"
                                    />{" "}
                                    Profile Image *
                                </label>
                                <div className="relative group border-2 border-dashed border-gray-200 rounded-xl p-6 hover:border-[#1C398E] transition text-center bg-gray-50">
                                    <input
                                        type="file"
                                        accept="image/*"
                                        onChange={(e) =>
                                            setData("image", e.target.files[0])
                                        }
                                        className="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    />
                                    <div className="flex flex-col items-center gap-2">
                                        <Upload className="text-gray-400 group-hover:text-[#1C398E]" />
                                        <p className="text-sm text-gray-500">
                                            {data.image ? (
                                                <span className="text-[#1C398E] font-bold">
                                                    {data.image.name}
                                                </span>
                                            ) : (
                                                "Click to upload or drag & drop"
                                            )}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Form Actions */}
                        <div className="mt-10 flex justify-end flex-wrap gap-4">
                            <button
                                type="button"
                                onClick={handleCodPayment}
                                disabled={processing}
                                className="px-8 py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 disabled:opacity-50 transition-all shadow-lg hover:shadow-green-200"
                            >
                                Pay on Doorstep
                            </button>

                            <button
                                type="button"
                                onClick={handleSslPayment}
                                disabled={processing}
                                className="px-8 py-3 bg-[#1C398E] text-white font-bold rounded-xl hover:bg-blue-800 disabled:opacity-50 transition-all shadow-lg hover:shadow-blue-200"
                            >
                                Pay with SSLCommerz
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default TrainingRegistration;
