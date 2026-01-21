// src/pages/EventDetails.jsx  (or any name you prefer)
import { Calendar, Clock9, MapPin, Info } from "lucide-react";
import React from "react";
import MapEmbed from "../components/MapEmbed";

const formatTime = (timeString) => {
    if (!timeString) return "TBA";

    const [hour, minute] = timeString.split(":");
    const hours = parseInt(hour);
    const ampm = hours >= 12 ? "PM" : "AM";
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
                                <div className="flex items-center gap-4">
                                    <Calendar />
                                    <div>
                                        <strong>Date:</strong>{" "}
                                        {event.start_date}
                                    </div>
                                </div>

                                <div className="flex items-center gap-4">
                                    <Clock9 />
                                    <div>
                                        <strong>Time:</strong>{" "}
                                        {formatTime(event.start_time)} -{" "}
                                        {formatTime(event.end_time)}
                                    </div>
                                </div>

                                <div className="flex items-start gap-4">
                                    <Info />
                                    <div
                                        className="
            prose prose-invert prose-lg max-w-none
            prose-headings:text-white
            prose-p:text-blue-100
            prose-a:text-blue-300 hover:prose-a:text-blue-200
            prose-strong:text-white
            prose-ul:text-blue-100
            prose-ol:text-blue-100
            [&_h1]:text-5xl [&_h1]:mb-8
            [&_h2]:text-4xl [&_h2]:mb-6
            [&_h3]:text-3xl [&_h3]:mb-5
            [&_img]:rounded-xl [&_img]:shadow-2xl [&_img]:mx-auto [&_img]:my-8
            [&_blockquote]:border-l-4 [&_blockquote]:border-blue-400 [&_blockquote]:pl-6 [&_blockquote]:italic
          "
                                        dangerouslySetInnerHTML={{
                                            __html:
                                                event.details ||
                                                "No details given",
                                        }}
                                    />
                                </div>

                                <MapEmbed locationUrl={event.location_url} />

                                {/* <div className="flex items-center gap-4">
                                    <MapPin />
                                    <div>
                                        <strong>Location: </strong>
                                        <a
                                            href={event.location}
                                            className="text-blue-900 underline hover:text-blue-700"
                                        >
                                            Click to view
                                        </a>
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
                                <p className="text-3xl font-bold">
                                    Spring Tryouts 2025
                                </p>
                                <p className="text-lg opacity-90">
                                    Be part of Ambition FC!
                                </p>
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
