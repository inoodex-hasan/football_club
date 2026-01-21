// src/components/HeroSlider.jsx
import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, Navigation } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/autoplay";

// Import your images (or use online URLs)
import stadium1 from "../../assets/slider/slider1.webp";
import stadium2 from "../../assets/slider/slider1.webp";
import { Star } from "lucide-react";

const HeroSlider = ({ sliders }) => {
    // console.log(sliders);
    // const slides = [
    //   {
    //     image: stadium1,
    //     title: "Legacy of Power and Pride",
    //     subtitle: "Your Dream is our pride",
    //     description:
    //       "A football club built on unity, dedication, and love for the game, representing strength both on and off the pitch.",
    //   },
    //   // Add more slides if needed
    //   {
    //     image: stadium2,
    //     title: "Join the Journey",
    //     subtitle: "Strength in Unity",
    //     description:
    //       "A football club built on unity, dedication, and love for the game, representing strength both on and  off the pitch.representing strength both on and  off the pitch.",
    //   },
    // ];

    return (
        <div className="relative h-[800px] w-full">
            <Swiper
                modules={[Autoplay, Navigation]}
                spaceBetween={0}
                slidesPerView={1}
                speed={1500}
                transition={{ duration: 1500 }}
                autoplay={{ delay: 5000, disableOnInteraction: false }}
                loop={true}
                navigation={{
                    nextEl: ".custom-next",
                    prevEl: ".custom-prev",
                }}
                className="h-full"
            >
                {sliders.map((slide, index) => (
                    <SwiperSlide key={index}>
                        <div className="relative h-full w-full">
                            {/* Background Image */}
                            <img
                                src={slide.image}
                                alt="Stadium"
                                className="absolute inset-0 h-full w-full object-cover"
                            />
                            {/* Dark Overlay */}
                            <div className="absolute inset-0 bg-black/50"></div>

                            {/* Content */}
                            <div className="relative z-10 flex h-full items-center justify-start px-6 md:px-12 lg:px-24">
                                <div className="container">
                                    <div className="text-left text-white max-w-xl  ">
                                        <p className="text-xl md:text-2xl lg:text-xl font-normal mb-4 tracking-wide flex items-center gap-2">
                                            <Star /> {slide.subtitle}
                                        </p>
                                        <h2 className="text-4xl md:text-6xl font-bold mb-6 leading-tight font-mont">
                                            {slide.title}
                                        </h2>
                                        <p
                                            className="text-base md:text-lg mb-10 max-w-2xl"
                                            dangerouslySetInnerHTML={{
                                                __html: slide.description,
                                            }}
                                        />
                                        <button className="bg-blue  font-roboto text-black font-semibold px-10 py-4 rounded-full text-lg transition duration-300 shadow-lg">
                                            Get Started
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </SwiperSlide>
                ))}
            </Swiper>

            {/* Custom Navigation Arrows */}
            <button className="custom-prev absolute left-6 md:left-12 top-1/2 cursor-pointer -translate-y-1/2 z-20 text-white bg-black/40 hover:bg-black/60 w-14 h-14 rounded-full flex items-center justify-center transition duration-300">
                <svg
                    className="w-8 h-8"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M15 19l-7-7 7-7"
                    />
                </svg>
            </button>

            <button className="custom-next absolute right-6 md:right-12 top-1/2 cursor-pointer -translate-y-1/2 z-20 text-white bg-black/40 hover:bg-black/60 w-14 h-14 rounded-full flex items-center justify-center transition duration-300">
                <svg
                    className="w-8 h-8"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M9 5l7 7-7 7"
                    />
                </svg>
            </button>
        </div>
    );
};

export default HeroSlider;
