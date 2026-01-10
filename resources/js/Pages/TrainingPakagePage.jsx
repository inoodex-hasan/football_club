import { Link } from "@inertiajs/react";
import React from "react";

const TrainingPackage = ({ packages }) => {
  // console.log(packages);
  return (
    <section className="bg-gray-50 py-16 md:py-24">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <div className="text-center mb-12">
          <h2 className="text-4xl font-bold text-[#1C398E] mb-4 font-noto">Training Packages</h2>
          <p className="text-xl md:text-lg font-normal text-gray-900 mb-3">At Besnik Consultancy, we take pride in our values – service, integrity, and excellence.</p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {packages.map((pkg) => (
          <div
    key={pkg.id}
    className={`relative bg-white rounded-2xl shadow-xl p-8 transition-all duration-300 
      ${pkg.is_popular 
        ? "border-4 border-[#1C398E] scale-105 z-10" // Styles for Popular
        : "border border-gray-100"                   // Styles for Normal
      }`}
  >
    {/* Only show the badge if is_popular is true */}
    {pkg.is_popular && (
      <span className="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-[#1C398E] text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg">
        MOST POPULAR
      </span>
    )}

    <h3 className="text-2xl font-bold mb-4 text-[#1C398E]">{pkg.name}</h3>

              {/* Dynamic Duration from DB (e.g., "3 Months") */}
              <p className="text-sm text-gray-500 mb-4 font-medium uppercase tracking-wider">
                {pkg.duration}
              </p>
              
              {/* Dynamic Price from DB */}
              <p className="text-4xl font-bold mb-6 text-[#1C398E]">
  {/* Math.floor removes decimals, and parseInt ensures it's treated as a number */}
  ${Math.floor(pkg.price)}
</p>

              {/* Dynamic Description */}
<ul className="space-y-4 mb-10">
  {pkg.description && pkg.description
    /* 1. Split by the closing </p> tag */
    .split('</p>') 
    /* 2. Filter out any empty lines */
    .filter(item => item.replace(/<[^>]*>?/gm, '').trim() !== "")
    .map((feature, idx) => (
      <li key={idx} className="flex items-start gap-3 text-gray-700">
        <svg
          className="w-6 h-6 text-green-500 flex-shrink-0"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            fillRule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
            clipRule="evenodd"
          />
        </svg>

        {/* 3. Render the text. We add the opening <p> back if it was stripped, 
            or just render the content. */}
        <span 
          className="text-sm md:text-base leading-tight"
          dangerouslySetInnerHTML={{ __html: feature.includes('<p>') ? feature + '</p>' : '<p>' + feature + '</p>' }} 
        />
      </li>
    ))}
</ul>

              {/* Link to detail page using ID */}
              <Link 
                href={`/training-package/${pkg.id}`}
                className="w-full py-4 rounded-lg block text-center font-bold text-white bg-[#1C398E] hover:bg-[#152b70] transition"
              >
                Choose This Package
              </Link>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default TrainingPackage;