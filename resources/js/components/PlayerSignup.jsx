// HeroSection.jsx
import React from "react";

const PlayerSignup = () => {
    return (
        <section className="  py-16 md:py-24 bg-[#C8B47D]">
            <div className="container px-4 sm:px-6 lg:px-8 text-center">
                {/* Title */}
                <h2 className="text-2xl md:text-5xl lg:text-6xl font-bold text-black mb-6">
                    Free Player Sign Up Form
                </h2>

                {/* Subtitle (optional, but makes it look better) */}
                <p className="text-lg md:text-xl text-gray-600 mb-10 max-w-3xl mx-auto">
                    Join our community of players and start playing today!
                </p>

                {/* Button */}
                <a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSeFOlYpGEFe7PoKnOeaxf_u-VdueqPQ_6L0iGo7g3RcQYDTGQ/viewform"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="
    inline-flex items-center justify-center 
    px-8 py-4 md:px-10 md:py-5
    text-lg md:text-xl font-semibold 
    text-white bg-blue  
    active:bg-[#16244a]
    transition-all duration-200 
    rounded-xl 
    shadow-2xl hover:shadow-3xl 
    focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-40
  "
                >
                    Register Now
                </a>
            </div>
        </section>
    );
};

export default PlayerSignup;
