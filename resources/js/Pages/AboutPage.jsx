import React from "react";
import TeamSection from "../components/about/TeamSection";
import BoardDirector from "../components/about/BoardDirector";
import ChairmanMessage from "../components/ChairmanMessage";

const AboutPage = ({ about, teamMembers, boardDirectors, message }) => {
    // console.log(teamMembers);
    return (
        <div className="min-h-screen bg-gray-50">
            {/* Hero Section */}
            <section className="relative h-48 md:h-68 overflow-hidden">
                <img
                    src="https://c8.alamy.com/comp/2R7NY2C/soccer-stadium-inside-view-football-field-empty-stands-a-crowd-of-fans-a-roof-against-the-sky-2R7NY2C.jpg"
                    alt="Stadium full of passionate fans"
                    className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-linear-to-t from-black/80 to-transparent" />

                <div className="container absolute bottom-0 left-0 right-0 p-8 md:p-16 text-white">
                    <h1 className="text-4xl md:text-6xl lg:text-7xl font-bold mb-4">
                        About Our Club
                    </h1>
                    <p className="text-lg md:text-2xl max-w-3xl">
                        Train. Learn. Compete. Succeed.
                    </p>
                </div>
            </section>
            <BoardDirector boardDirectors={boardDirectors} />
            <ChairmanMessage message={message} />


            {/* Club History Section */}
            <section className="py-16 px-6 md:px-12 lg:px-24 bg-white">
                <div className="container  ">
                    <div>
                        <h2 className="text-3xl md:text-5xl font-bold text-blue mb-6">
                            Our History
                        </h2>
                        <p
                            className="text-lg font-normal text-gray-900 mb-3"
                            dangerouslySetInnerHTML={{
                                __html: about?.description,
                            }}
                        />
                    </div>
                    {/* <div className="">
                        <img
                            src={about?.images}
                            alt="Team group photo"
                            className="rounded-lg shadow-lg w-full h-auto object-contain"
                        />
                    </div> */}
                </div>
            </section>

            <TeamSection teamMembers={teamMembers} />
        </div>
    );
};

export default AboutPage;
