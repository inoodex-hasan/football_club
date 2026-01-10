// src/components/TrainingPackage.jsx
import { Link } from "@inertiajs/react";
import React from "react";

const packages = [
  {
    id: "basic",
    title: "Basic Training Package",
    price: "$199 / month",
    features: [
      "2 sessions per week",
      "Group training (10-15 players)",
      "Basic skill development",
      "Fitness & conditioning",
      "Monthly progress report",
    ],
  },
  {
    id: "pro",
    title: "Pro Development Package",
    price: "$399 / month",
    popular: true,
    features: [
      "4 sessions per week",
      "Small group (4-6 players)",
      "Advanced technical training",
      "Tactical awareness",
      "Video analysis",
      "1 private session per month",
      "Weekly progress report",
    ],
  },
  {
    id: "elite",
    title: "Elite Academy Package",
    price: "$699 / month",
    features: [
      "Unlimited sessions",
      "1-on-1 personalized coaching",
      "Professional-level training",
      "Match preparation",
      "Scouting opportunities",
      "Full video analysis",
      "Nutrition guidance",
      "Priority tournament entry",
    ],
  },
];

const TrainingPackage = ({packages}) => {
  // console.log(trainings);
  return (
    <section className="bg-gray-50 py-16 md:py-24">
      <div className="container px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <div className="text-center mb-12 md:mb-16">
          <h2 className="text-4xl md:text-4xl font-bold text-blue mb-4 font-noto">
            Training Package
          </h2>
          <p className="text-xl md:text-lg font-normal text-gray-900 mb-3">
            At Besnik Consultancy, we take pride in our values – service,
            integrity, and excellence.
          </p>
        </div>

        {/* Packages Grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
          {packages.map((pkg) => (
            <div
              key={pkg.id}
              className={`relative bg-white rounded-2xl shadow-xl p-8 transition-all duration-300 hover:shadow-2xl ${
                pkg.popular ? "border-4 border-[#1C398E] scale-105" : ""
              }`}
            >
              {pkg.popular && (
                <span className="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-[#1C398E] text-white px-6 py-2 rounded-full text-sm font-bold">
                  MOST POPULAR
                </span>
              )}
              <h3
                className="text-2xl md:text-3xl font-bold mb-4"
                style={{ color: "#1C398E" }}
              >
                {pkg.title}
              </h3>
              <p
                className="text-4xl font-bold mb-8"
                style={{ color: "#1C398E" }}
              >
                {pkg.price}
              </p>
              <ul className="space-y-4 mb-10">
                {pkg.features.map((feature, idx) => (
                  <li
                    key={idx}
                    className="flex items-start gap-3 text-gray-700"
                  >
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
                    <span>{feature}</span>
                  </li>
                ))}
              </ul>
              <Link href="/training-pakage-details"
                onClick={() => {
                  setSelectedPackage(pkg.id);
                  setFormData({ ...formData, package: pkg.title });
                  document
                    .getElementById("registration-form")
                    .scrollIntoView({ behavior: "smooth" });
                }}
                className="w-full py-4 rounded-lg  block text-center font-bold text-white transition bg-[#1C398E] hover:bg-[#152b70]"
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
