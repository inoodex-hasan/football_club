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
                            key={m.id || `${m.name}-${m.designation}`}
                            className="flex flex-col lg:flex-row items-start gap-10 lg:gap-16"
                        >
                            {/* Left block – force same width */}
                            <div className="w-full lg:w-[380px] xl:w-[420px] flex-shrink-0 flex flex-col items-center lg:items-end">
                                <div className="w-60 h-60 sm:w-80 sm:h-80 lg:w-90 lg:h-90  overflow-hidden border-8 border-[#C8B47D] shadow-xl">
                                    <img
                                        src={m.photo}
                                        alt={m.name}
                                        className="w-full h-full object-contain"
                                    />
                                </div>

                                <div className="mt-6 text-center">
                                    <p className="text-xl sm:text-2xl lg:text-2xl font-bold text-[#C8B47D]">
                                        {m.name}
                                    </p>
                                    <p className="text-base sm:text-lg lg:text-xl text-gray-700 mt-1">
                                        {m.designation}
                                    </p>
                                    {/* <p className="text-sm sm:text-base text-gray-500 mt-1">
                                        Ambit10n Academy Bangladesh
                                    </p> */}
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
