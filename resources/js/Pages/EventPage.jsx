import { Link } from "@inertiajs/react";
import React from "react";

const formatTime = (timeString) => {
    if (!timeString) return "TBA";

    const [hour, minute] = timeString.split(":");
    const hours = parseInt(hour);
    const ampm = hours >= 12 ? "PM" : "AM";
    const formattedHours = hours % 12 || 12; // Converts 0 to 12

    return `${formattedHours}:${minute} ${ampm}`;
};

const EventPage = ({ events }) => {
    // console.log(events);
    // const events = [
    //   {
    //     date: "01 January 2025",
    //     time: "9:00 AM - 10:00 PM",
    //     location: "New York City",
    //     title: "Stage show",
    //     image:
    //       "https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
    //   },
    //   {
    //     date: "01 January 2025",
    //     time: "9:00 AM - 10:00 PM",
    //     location: "New York City",
    //     title: "Stage show",
    //     image:
    //       "https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
    //   },
    //   {
    //     date: "01 January 2025",
    //     time: "9:00 AM - 10:00 PM",
    //     location: "New York City",
    //     title: "Stage show",
    //     image:
    //       "https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
    //   },
    // ];
    return (
        <div className="min-h-screen bg-gray-50 ">
            {/* Hero Section */}
            <section className="relative h-24 md:h-68 overflow-hidden">
                <img
                    src="https://c8.alamy.com/comp/2R7NY2C/soccer-stadium-inside-view-football-field-empty-stands-a-crowd-of-fans-a-roof-against-the-sky-2R7NY2C.jpg"
                    alt="Stadium full of passionate fans"
                    className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-linear-to-t from-black/80 to-transparent" />

                <div className="container absolute bottom-0 left-0 right-0 p-8 md:p-16 text-white">
                    <h1 className="text-4xl md:text-6xl font-noto font-bold mb-4">
                        Our All Events
                    </h1>
                    <p className="text-lg md:text-xl max-w-3xl">
                        All events going on here..
                    </p>
                </div>
            </section>
            <div className="container px-4 sm:px-6 lg:px-8 pt-30">
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {events.map((event, index) => (
                        <div
                            key={index}
                            className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                        >
                            {/* Image */}
                            <div className="relative h-64">
                                <img
                                    src={event.main_image}
                                    alt={event.title}
                                    className="w-full h-full object-cover"
                                />
                                {/* Date Badge */}
                                <div className="absolute top-4 left-4 bg-white rounded-full px-4 py-2 shadow-md">
                                    <div className="flex items-center gap-2">
                                        <svg
                                            className="w-5 h-5 text-blue-900"
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
                                        <span className="font-semibold text-gray-800">
                                            {event.start_date}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {/* Content */}
                            <div className="p-6">
                                <h3 className="text-2xl font-bold text-gray-800 mb-2">
                                    {event.title}
                                </h3>
                                <div className="space-y-2 text-gray-600 mb-6">
                                    <div className="flex items-center gap-2">
                                        <svg
                                            className="w-5 h-5"
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
                                        <span>
                                            {formatTime(event.start_time)} -{" "}
                                            {formatTime(event.end_time)}
                                        </span>
                                    </div>
                                    <div className="flex items-center gap-2">
                                        <svg
                                            className="w-5 h-5"
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
                                        <span>{event.location}</span>
                                    </div>
                                </div>

                                {/* Buy Ticket Button */}
                                <Link
                                    href={`/events/${event.id}`}
                                    className="w-full bg-blue cursor-pointer hover:bg-blue-800 text-white font-semibold py-3 px-6 rounded-full transition duration-300 flex items-center justify-center gap-2"
                                >
                                    View Details
                                    <svg
                                        className="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth={2}
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default EventPage;
