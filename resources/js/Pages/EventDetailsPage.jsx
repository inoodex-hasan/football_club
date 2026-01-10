// src/pages/EventDetails.jsx  (or any name you prefer)
import React from "react";

const formatTime = (timeString) => {
  if (!timeString) return "TBA";
  
  const [hour, minute] = timeString.split(':');
  const hours = parseInt(hour);
  const ampm = hours >= 12 ? 'PM' : 'AM';
  const formattedHours = hours % 12 || 12; // Converts 0 to 12
  
  return `${formattedHours}:${minute} ${ampm}`;
};
const EventDetailsPage = ({ event }) => {
  // console.log(event);
  return (
    <div className="min-h-screen bg-gray-200 py-12 md:py-20">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        {/* Page Title */}
        <div className="text-center mb-12">
          <h1
            className="text-4xl md:text-5xl font-bold"
            style={{ color: "#0A1D3A" }}
          >
            {event.title}
          </h1>
          <p className="text-xl text-gray-600 mt-4">
            Join us and showcase your skills!
          </p>
        </div>

        {/* Two-Column Layout */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
          {/* Left Column - Event Information */}
          <div className="order-2 lg:order-1 space-y-10">
            <div className="bg-white rounded-2xl shadow-xl p-8">
              <h2
                className="text-3xl font-bold mb-6"
                style={{ color: "#0A1D3A" }}
              >
                Event Details
              </h2>
              <div className="space-y-6 text-lg text-gray-700">
                <div className="flex items-start gap-4">
                  <svg
                    className="w-7 h-7 text-[#0A1D3A] flex-shrink-0 mt-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth={2}
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                  </svg>
                  <div>
                    <strong>Date:</strong> {event.start_date}
                  </div>
                </div>

                <div className="flex items-start gap-4">
                  <svg
                    className="w-7 h-7 text-[#0A1D3A] flex-shrink-0 mt-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth={2}
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                  <div>
                    <strong>Time:</strong> {formatTime(event.start_time)} - {formatTime(event.end_time)}
                  </div>
                </div>

                <div className="flex items-start gap-4">
                  <svg
                    className="w-7 h-7 text-[#0A1D3A] flex-shrink-0 mt-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth={2}
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                    />
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth={2}
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                  <div>
                    <strong>Location:</strong>
                   {` ${event.location}`}
                  </div>
                </div>
{/* 
                <div className="flex items-start gap-4">
                  <svg
                    className="w-7 h-7 text-[#0A1D3A] flex-shrink-0 mt-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth={2}
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                    />
                  </svg>
                  <div>
                    <strong>Ages:</strong> 8 – 18 years
                    <br />
                    <strong>Skill Level:</strong> Beginner to Advanced
                  </div>
                </div> */}

                {/* <div className="flex items-start gap-4">
                  <svg
                    className="w-7 h-7 text-[#0A1D3A] flex-shrink-0 mt-1"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth={2}
                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                  <div>
                    <strong>Cost:</strong> FREE (Registration Required)
                  </div>
                </div> */}
              </div>
            </div>

            {/* What to Bring & Additional Info */}
            {/* <div className="bg-white rounded-2xl shadow-xl p-8">
              <h3
                className="text-2xl font-bold mb-5"
                style={{ color: "#0A1D3A" }}
              >
                What to Bring
              </h3>
              <ul className="space-y-3 text-gray-700 text-lg">
                <li className="flex items-center gap-3">
                  <span className="text-[#0A1D3A]">•</span> Soccer cleats & shin
                  guards
                </li>
                <li className="flex items-center gap-3">
                  <span className="text-[#0A1D3A]">•</span> Water bottle
                </li>
                <li className="flex items-center gap-3">
                  <span className="text-[#0A1D3A]">•</span> Comfortable athletic
                  wear
                </li>
                <li className="flex items-center gap-3">
                  <span className="text-[#0A1D3A]">•</span> Positive attitude!
                </li>
              </ul>

              <p className="mt-8 text-gray-600">
                Parents are welcome to stay and watch. Our coaches will evaluate
                players and provide feedback at the end of the session.
              </p>

              <button className="mt-8 w-full py-5 bg-[#0A1D3A] hover:bg-[#06101f] text-white text-xl font-bold rounded-xl transition shadow-lg">
                Register Now
              </button>
            </div> */}
          </div>

          {/* Right Column - Event Image */}
          <div className="order-1 lg:order-2">
            <div className="relative rounded-2xl overflow-hidden shadow-2xl">
              <img
                src={`/${event.main_image}`}
                alt="Spring 2025 Tryouts - Players training on field"
                className="w-full h-full object-cover"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-[#0A1D3A]/60 to-transparent"></div>
              <div className="absolute bottom-8 left-8 text-white">
                <p className="text-3xl font-bold">Spring Tryouts 2025</p>
                <p className="text-lg opacity-90">Be part of Ambition FC!</p>
              </div>
            </div>

            {/* Extra Small Images (Optional Gallery Preview) */}
            {/* <div className="grid grid-cols-2 gap-4 mt-6">
              <img
                src="https://images.pexels.com/photos/2099051/pexels-photo-2099051.jpeg?auto=compress&cs=tinysrgb&w=600"
                alt="Coach with players"
                className="rounded-xl shadow-lg object-cover h-48"
              />
              <img
                src="https://images.pexels.com/photos/4773359/pexels-photo-4773359.jpeg?auto=compress&cs=tinysrgb&w=600"
                alt="Youth team celebration"
                className="rounded-xl shadow-lg object-cover h-48"
              />
            </div> */}
          </div>
        </div>
      </div>
    </div>
  );
};

export default EventDetailsPage;
