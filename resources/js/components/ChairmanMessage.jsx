import React from "react";

const ChairmanMessage = ({ message }) => {
    if (!message || !Array.isArray(message) || message.length === 0) {
        return (
            <section className="py-16 bg-gray-50 text-center text-gray-600">
                No messages available
            </section>
        );
    }

    return (
        <section className="py-6 md:py-10 bg-gray-50">
            <div className="container mx-auto px-5  ">
                {/* <h2 className="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-12 md:mb-16">
                    Messages from Leadership
                </h2> */}

                <div className="space-y-16 md:space-y-20 lg:space-y-24">
                    {message.map((m) => (
                        <div
                            key={m.id || `${m.name}-${m.designation}`} // fallback key
                            className="flex flex-col lg:flex-row items-start gap-10 lg:gap-16"
                        >
                            {/* Image Column */}
                            <div className="w-full lg:w-4/12 flex justify-center lg:justify-end">
                                <div className="relative">
                                    <div className="w-60 h-60 sm:w-80 sm:h-80 lg:w-90 lg:h-90  overflow-hidden border-8 border-[#C8B47D] shadow-xl">
                                        <img
                                            src={m.photo}
                                            alt={m.name || "Chairman"}
                                            className="w-full h-full object-contain"
                                        />
                                    </div>
                                    <div className="mt-6 pt-4">
                                        {/* <p className="text-lg sm:text-xl font-semibold text-gray-800">
                                        With warm regards and best wishes,
                                    </p> */}
                                        <p className="text-xl sm:text-3xl font-bold text-[#C8B47D] mt-2">
                                            {m.name}
                                        </p>
                                        <p className="text-base sm:text-lg text-gray-600 mt-1">
                                            {m.designation}
                                        </p>
                                        <p>Ambit10n Academy Bangladesh</p>
                                    </div>
                                </div>
                            </div>

                            {/* Text Content */}
                            <div className="w-full lg:w-7/12 text-center lg:text-left">
                                <h2 className="text-xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                                    Message from the {m.designation}
                                </h2>

                                <div className="p-5 md:p-6 lg:p-8 rounded-lg bg-gray-100 shadow-sm">
                                    <p
                                        className="text-base sm:text-lg lg:text-xl text-gray-700 leading-relaxed italic"
                                        dangerouslySetInnerHTML={{
                                            __html: m.message || "",
                                        }}
                                    />
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
};

export default ChairmanMessage;
