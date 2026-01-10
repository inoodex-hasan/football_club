import React from "react";
import TeamSection from "../components/about/TeamSection";

const AboutPage = ({about, teamMembers}) => {
  // console.log(teamMembers);
  return (
    <div className="min-h-screen bg-gray-50">
      {/* Hero Section */}
      <section className="relative h-24 md:h-68 overflow-hidden">
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
            Pride, Passion, and Tradition Since 1905
          </p>
        </div>
      </section>

      {/* Club History Section */}
      <section className="py-16 px-6 md:px-12 lg:px-24 bg-white">
        <div className="container grid md:grid-cols-2 gap-12 items-center">
          <div>
            <h2 className="text-3xl md:text-5xl font-bold text-[#283E77] mb-6">
              Our History
            </h2>
         <p 
  className="text-lg font-normal text-gray-900 mb-3"
  dangerouslySetInnerHTML={{ __html: about?.description }}
/>
          </div>
           <div className="flex justify-end">
            <img
              src={about?.images}
              alt="Team group photo"
              className="rounded-lg shadow-lg w-full object-cover"
            />
          </div>
        </div>
      </section>

      <TeamSection teamMembers={teamMembers} />
    </div>
  );
};

export default AboutPage;
