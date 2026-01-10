// src/pages/TermsAndConditions.jsx or src/components/TermsAndConditions.jsx
import React from "react";

const TermsAndConditions = ({ terms }) => {
    return (
        <div className="min-h-screen bg-gray-50 py-12 md:py-20">
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
                {/* Header */}
                <div className="text-center mb-16">
                    <h1
                        className="text-2xl md:text-5xl font-bold mb-6"
                        style={{ color: "#1C398E" }}
                    >
                        Terms and Conditions
                    </h1>
                    <p className="text-lg text-gray-600 max-w-3xl mx-auto">
                        Last updated: December 23, 2025
                    </p>
                </div>

                {/* Content */}
                <div className="bg-white rounded-2xl shadow-xl p-8 md:p-12 lg:p-16 prose prose-lg max-w-none">
                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            1. Acceptance of Terms
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            By accessing this website, registering for training
                            packages, or participating in any programs offered
                            by Ambition Football Club ("we," "us," or "our"),
                            you agree to be bound by these Terms and Conditions.
                            If you do not agree with any part of these terms,
                            you must not use our services.
                        </p>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            2. Services Provided
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            Ambition Football Club provides football training,
                            academy programs, private lessons, group sessions,
                            and related activities for players of all ages and
                            skill levels.
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                Training sessions are conducted at designated
                                fields and facilities.
                            </li>
                            <li>
                                Schedules are subject to change due to weather,
                                holidays, or coach availability.
                            </li>
                            <li>
                                We reserve the right to cancel or reschedule
                                sessions when necessary.
                            </li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            3. Registration and Payment
                        </h2>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                All registrations must be completed through our
                                official website or authorized staff.
                            </li>
                            <li>
                                Full payment or agreed installment is required
                                to secure a spot in any program.
                            </li>
                            <li>
                                Payments are processed securely through
                                third-party providers.
                            </li>
                            <li>
                                All fees are non-refundable except in cases of
                                program cancellation by the club.
                            </li>
                            <li>
                                Late payments may result in suspension from
                                training until settled.
                            </li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            4. Cancellation and Refund Policy
                        </h2>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                No refunds will be issued for missed sessions
                                due to player absence.
                            </li>
                            <li>
                                Refunds may be considered for medical reasons
                                with a valid doctor's note (minus administrative
                                fees).
                            </li>
                            <li>
                                If we cancel a session, a make-up session or
                                credit will be provided where possible.
                            </li>
                            <li>
                                Monthly packages cannot be paused or carried
                                over.
                            </li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            5. Conduct and Safety
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            All players, parents, and guardians are expected to:
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                Show respect to coaches, staff, players, and
                                facilities.
                            </li>
                            <li>Arrive on time and prepared for sessions.</li>
                            <li>
                                Wear appropriate football attire and bring
                                necessary equipment (e.g., shin guards, water).
                            </li>
                            <li>
                                Follow all safety guidelines and coach
                                instructions.
                            </li>
                            <li>
                                Ambition Football Club reserves the right to
                                dismiss any player for inappropriate behavior
                                without refund.
                            </li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            6. Health and Liability
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            Participation in football training involves physical
                            activity and inherent risks. By registering, you
                            acknowledge and agree:
                        </p>
                        <ul className="list-disc pl-8 mt-4 space-y-3 text-gray-700">
                            <li>
                                All players must be in good health and able to
                                participate safely.
                            </li>
                            <li>
                                Parents/guardians must inform us of any medical
                                conditions, allergies, or injuries.
                            </li>
                            <li>
                                Ambition Football Club is not liable for
                                injuries, loss, or damage occurring during
                                sessions (except in cases of gross negligence).
                            </li>
                            <li>
                                A signed waiver may be required for
                                participation.
                            </li>
                        </ul>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            7. Photography and Media
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            We may take photos or videos during training and
                            matches for promotional purposes (website, social
                            media, etc.). By participating, you grant us
                            permission to use such media featuring your
                            child/player unless you notify us in writing to opt
                            out.
                        </p>
                    </section>

                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            8. Changes to Terms
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            We reserve the right to modify these Terms and
                            Conditions at any time. Changes will be posted on
                            this page with an updated "Last updated" date.
                            Continued use of our services constitutes acceptance
                            of the new terms.
                        </p>
                    </section>

                    <section>
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            9. Contact Us
                        </h2>
                        <p className="text-gray-700 leading-relaxed">
                            For any questions about these Terms and Conditions,
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

export default TermsAndConditions;
