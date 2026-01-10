import React from "react";

const PrivacyPolicy = ({ policy }) => {
    // console.log(policy);
    return (
        <div className="min-h-screen bg-gray-50 py-12 md:py-20">
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
                {/* Header */}
                <div className="text-center mb-16">
                    <h1
                        className="text-2xl md:text-5xl font-bold mb-6"
                        style={{ color: "#1C398E" }}
                    >
                        Privacy Policy
                    </h1>
                    <p className="text-lg text-gray-600 max-w-3xl mx-auto">
                        Last updated: 10/01/2026
                    </p>
                </div>

                {/* Content */}
                <div className="bg-white rounded-2xl shadow-xl p-8 md:p-12 lg:p-16 prose prose-lg max-w-none">
                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            1. Introduction
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            Welcome to Ambition Football Club ("we," "our," or
                            "us"). We are committed to protecting your personal
                            information and your right to privacy. This Privacy
                            Policy explains how we collect, use, disclose, and
                            safeguard your information when you visit our
                            website, register for training packages, or
                            otherwise interact with our services.
                        </p>
                        <p className="text-gray-700 leading-relaxed mt-4">
                            If you have any questions or concerns about this
                            privacy policy or our practices, please contact us
                            at Ambitionfcmd@gmail.com.
                        </p>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            2. Information We Collect
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            We may collect the following types of information:
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                <strong>Personal Information:</strong> Name,
                                email address, phone number, age, and any other
                                details you provide when registering for
                                training packages or contacting us.
                            </li>
                            <li>
                                <strong>Payment Information:</strong> If you
                                purchase a training package, we collect payment
                                details (processed securely through third-party
                                payment processors).
                            </li>
                            <li>
                                <strong>Usage Data:</strong> Information about
                                how you interact with our website (e.g., IP
                                address, browser type, pages visited, time spent
                                on pages).
                            </li>
                            <li>
                                <strong>Cookies and Tracking Data:</strong> We
                                use cookies to improve your experience (see
                                section 6).
                            </li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            3. How We Use Your Information
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            We use the collected information for the following
                            purposes:
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                To process registrations and manage your
                                training package
                            </li>
                            <li>
                                To communicate with you about sessions, updates,
                                and club news
                            </li>
                            <li>To improve our website and services</li>
                            <li>To comply with legal obligations</li>
                            <li>To prevent fraud and ensure security</li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            4. Sharing Your Information
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            We do not sell your personal information. We may
                            share your data with:
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                Trusted service providers (e.g., payment
                                processors, email services)
                            </li>
                            <li>
                                Coaches and staff for training management
                                purposes
                            </li>
                            <li>Legal authorities when required by law</li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            5. Data Security
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            We implement appropriate technical and
                            organizational measures to protect your personal
                            information. However, no method of transmission over
                            the internet is 100% secure, and we cannot guarantee
                            absolute security.
                        </p>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            6. Cookies and Tracking Technologies
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            Our website uses cookies to enhance user experience,
                            analyze traffic, and personalize content. You can
                            control cookies through your browser settings.
                        </p>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            7. Children's Privacy
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            Our services are intended for users of all ages,
                            including minors. For players under 13, we require
                            parental consent before collecting personal
                            information.
                        </p>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            8. Your Rights
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            You have the right to:
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                Access, correct, or delete your personal
                                information
                            </li>
                            <li>Opt out of marketing communications</li>
                            <li>
                                Request information about how your data is used
                            </li>
                        </ul>
                        <p className="text-gray-700 leading-relaxed mt-4">
                            To exercise these rights, contact us at
                            Ambitionfcmd@gmail.com.
                        </p>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            9. Changes to This Policy
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            We may update this Privacy Policy from time to time.
                            The updated version will be posted on this page with
                            a revised "Last updated" date.
                        </p>
                    </section>

                    <section>
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            10. Contact Us
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            If you have any questions about this Privacy Policy,
                            please contact us:
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>Email: Ambitionfcmd@gmail.com</li>
                            <li>Phone: (407) 985-6532</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    );
};

export default PrivacyPolicy;
