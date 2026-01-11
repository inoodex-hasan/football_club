import React from "react";

const TermsAndConditions = ({ terms }) => {
    // console.log(terms);
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
                        Last updated:{" "}
                        {new Date(terms.updated_at).toLocaleDateString(
                            "en-US",
                            {
                                year: "numeric",
                                month: "long",
                                day: "numeric",
                            }
                        )}
                    </p>
                </div>

                {/* Content */}
                <div className="bg-white rounded-2xl shadow-xl p-8 md:p-12 lg:p-16 prose prose-lg max-w-none">
                    <section className="mb-12">
                        <h2
                            className="text-3xl font-bold mb-6"
                            style={{ color: "#1C398E" }}
                        >
                            {terms.title}
                        </h2>
                        <div
                            className="text-gray-700 leading-relaxed"
                            dangerouslySetInnerHTML={{
                                __html: terms.description,
                            }}
                        />
                    </section>
                </div>
            </div>
        </div>
    );
};

export default TermsAndConditions;
