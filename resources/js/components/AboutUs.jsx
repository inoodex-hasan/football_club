// src/components/AboutUs.jsx
import { Link } from "@inertiajs/react";
import React from "react";
// import { Link } from "react-router";
import aboutimg from "../assets/about/about.jpeg";
const AboutUs = ({ about }) => {
  // console.log(about);
  return (
    <section className="bg-white py-16 md:py-24">
      <div className="container px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-2 gap-8">
          {/* Header */}
          <div className="">
            <div className="mb-12">
              <h2 className="text-4xl  font-bold text-blue mb-4 font-noto">
                {about?.title}
              </h2>
             <p 
  className="text-lg font-normal text-gray-900 mb-3"
  dangerouslySetInnerHTML={{ __html: about?.description }}
/>
            </div>
            <Link
              href="/about"
              className="mt-6 md:mt-0 bg-blue inline-flex hover:bg-blue-800 text-white font-normal px-10 py-3 rounded-full text-lg
               transition duration-300     gap-2"
            >
              Explore →
            </Link>
          </div>

          {/* Right: Image Grid */}
          <div className="flex justify-end">
            <img src={about?.images} alt="" />
          </div>
        </div>
      </div>
    </section>
  );
};

export default AboutUs;
