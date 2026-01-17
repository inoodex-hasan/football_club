import React from "react";

const TeamSection = ({ teamMembers }) => {
    // console.log(teamMembers);
    return (
        <div className="min-h-screen bg-gray-50 py-12">
            {/* First Team Players Section */}
            <section className="py-16 px-6 md:px-12 lg:px-24 bg-gray-100">
                <div className="max-w-7xl mx-auto">
                    <h2 className="text-3xl md:text-5xl font-bold text-center mb-12 text-blue">
                        Trainer Team Members
                    </h2>

                    <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        {teamMembers.length > 0 ? (
                            teamMembers.map((member) => (
                                <div
                                    key={member.id}
                                    className="bg-white rounded-lg shadow-lg overflow-hidden text-center"
                                >
                                    <img
                                        src={`${member.photo}`}
                                        alt={member.name}
                                        className="w-full h-64 object-cover"
                                    />
                                    <div className="p-4">
                                        <h3 className="text-xl font-semibold text-blue">
                                            {member.name}
                                        </h3>
                                        <p className="text-gray-600">
                                            {member.position}
                                        </p>
                                        {/* If you add a 'role' or 'is_captain' field later, you can show it here */}
                                        {member.name.includes("Johnson") && (
                                            <p className="text-sm text-gray-500 mt-1">
                                                Captain
                                            </p>
                                        )}
                                    </div>
                                </div>
                            ))
                        ) : (
                            <div className="col-span-full text-center text-gray-500">
                                No team members found.
                            </div>
                        )}
                    </div>
                </div>
            </section>
        </div>
    );
};

export default TeamSection;
