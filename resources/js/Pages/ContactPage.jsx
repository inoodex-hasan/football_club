import React from "react";
import { useForm, Head, router } from "@inertiajs/react";
import { Mail, Phone, MapPin, Send, Loader2 } from "lucide-react";
import { toast } from "react-toastify";
import Swal from "sweetalert2";

const ContactPage = ({ contact }) => {
    // 1. Initialize Inertia Form
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        email: "",
        phone: "",
        message: "",
    });

    // 2. Handle Form Submission
    const handleSubmit = (e) => {
        e.preventDefault();
        post("/contact-form", {
            onStart: () => {},
            onSuccess: () => {
                reset();
                Swal.fire({
                    title: "Success!",
                    text: "Thank You for your message. We will get back to you soon.",
                    icon: "success",
                    confirmButtonText: "Ok",
                });
            },
            onError: () => {
                toast.error("Validation failed. Please check the form.");
            },
        });
    };

    return (
        <div className="relative min-h-screen bg-gray-50 pt-32 pb-20">
            <Head title="Contact Us" />

            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {/* Header */}
                <div className="text-center mb-16">
                    <h1
                        className="text-5xl font-bold mb-4"
                        style={{ color: "#283e77" }}
                    >
                        Get In Touch
                    </h1>
                    <p className="text-xl text-gray-600 max-w-2xl mx-auto">
                        We’d love to hear from you! Whether you have a question
                        about our education expo or need assistance, we’re here
                        to help.
                    </p>
                </div>

                <div className="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div className="lg:col-span-1 space-y-8">
                        <div className="bg-white flex gap-4 p-8 rounded-2xl shadow-lg border border-gray-100 hover:scale-105 transition-transform">
                            <div className="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center shrink-0">
                                <MapPin
                                    size={28}
                                    style={{ color: "#283e77" }}
                                />
                            </div>
                            <div>
                                <h3
                                    className="text-2xl font-semibold mb-2"
                                    style={{ color: "#283e77" }}
                                >
                                    Visit Us
                                </h3>
                                <p className="text-gray-600 leading-relaxed">
                                    {contact.address}
                                </p>
                            </div>
                        </div>

                        <div className="bg-white flex gap-4 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                            <div className="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center shrink-0">
                                <Phone size={28} style={{ color: "#283e77" }} />
                            </div>
                            <div>
                                <h3
                                    className="text-2xl font-semibold mb-2"
                                    style={{ color: "#283e77" }}
                                >
                                    Call Us
                                </h3>
                                <p className="text-gray-600 font-medium">
                                    {contact.phone}
                                </p>
                            </div>
                        </div>

                        <div className="bg-white flex gap-4 p-8 rounded-2xl shadow-lg border border-gray-100 hover:scale-105 transition-transform">
                            <div className="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center shrink-0">
                                <Mail size={28} style={{ color: "#283e77" }} />
                            </div>
                            <div>
                                <h3
                                    className="text-2xl font-semibold mb-2"
                                    style={{ color: "#283e77" }}
                                >
                                    Email Us
                                </h3>
                                <p className="text-gray-600 break-all">
                                    {contact.email}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div className="lg:col-span-2">
                        <form
                            onSubmit={handleSubmit}
                            className="bg-white p-8 rounded-2xl shadow-2xl border border-gray-100"
                        >
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div>
                                    <label className="block text-gray-700 font-medium mb-2">
                                        Full Name
                                    </label>
                                    <input
                                        type="text"
                                        value={data.name}
                                        onChange={(e) =>
                                            setData("name", e.target.value)
                                        }
                                        className={`w-full px-5 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ${
                                            errors.name
                                                ? "border-red-500"
                                                : "border-gray-300"
                                        }`}
                                        placeholder="Your name"
                                    />
                                    {errors.name && (
                                        <p className="text-red-500 text-sm mt-1">
                                            {errors.name}
                                        </p>
                                    )}
                                </div>
                                <div>
                                    <label className="block text-gray-700 font-medium mb-2">
                                        Email Address
                                    </label>
                                    <input
                                        type="email"
                                        value={data.email}
                                        onChange={(e) =>
                                            setData("email", e.target.value)
                                        }
                                        className={`w-full px-5 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ${
                                            errors.email
                                                ? "border-red-500"
                                                : "border-gray-300"
                                        }`}
                                        placeholder="your@email.com"
                                    />
                                    {errors.email && (
                                        <p className="text-red-500 text-sm mt-1">
                                            {errors.email}
                                        </p>
                                    )}
                                </div>
                            </div>

                            <div className="mb-8">
                                <label className="block text-gray-700 font-medium mb-2">
                                    Phone Number
                                </label>
                                <input
                                    type="tel"
                                    value={data.phone}
                                    onChange={(e) =>
                                        setData("phone", e.target.value)
                                    }
                                    className="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                                    placeholder="+880 1XXXXXXXXX"
                                />
                            </div>

                            <div className="mb-8">
                                <label className="block text-gray-700 font-medium mb-2">
                                    Your Message
                                </label>
                                <textarea
                                    rows={5}
                                    value={data.message}
                                    onChange={(e) =>
                                        setData("message", e.target.value)
                                    }
                                    className={`w-full px-5 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ${
                                        errors.message
                                            ? "border-red-500"
                                            : "border-gray-300"
                                    }`}
                                    placeholder="Tell us how we can help you..."
                                ></textarea>
                                {errors.message && (
                                    <p className="text-red-500 text-sm mt-1">
                                        {errors.message}
                                    </p>
                                )}
                            </div>

                            <button
                                type="submit"
                                disabled={processing}
                                className="w-full md:w-auto px-10 py-4 text-white font-semibold rounded-lg transition flex items-center justify-center gap-2 shadow-lg disabled:opacity-70"
                                style={{ backgroundColor: "#283e77" }}
                            >
                                {processing ? (
                                    <Loader2
                                        className="animate-spin"
                                        size={20}
                                    />
                                ) : (
                                    <Send size={20} />
                                )}
                                {processing ? "Sending..." : "Send Message"}
                            </button>

                            <div className="mt-6 h-1 w-32 bg-[#c3a25d] mx-auto rounded-full"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ContactPage;
