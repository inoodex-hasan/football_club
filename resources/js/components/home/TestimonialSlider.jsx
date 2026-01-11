import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import { Quote, Star } from "lucide-react";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/autoplay";

const TestimonialSlider = ({ reviews }) => {
    // console.log(reviews)
    return (
        <section className="bg-gray-50 py-16 md:py-24">
            <div className="container px-4 sm:px-6 lg:px-8">
                {/* Header */}
                <div className="text-center mb-16">
                    <h2 className="text-4xl   font-bold text-blue font-noto mb-4">
                        What Our Clients Say
                    </h2>
                    <p className="text-xl text-gray-600  l mx-auto">
                        Real stories from players, parents, and coaches who have
                        experienced our programs.
                    </p>
                </div>

                {/* Swiper Slider */}
                <Swiper
                    modules={[Navigation, Pagination, Autoplay]}
                    spaceBetween={24}
                    slidesPerView={1}
                    breakpoints={{
                        640: { slidesPerView: 1.5 },
                        768: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 },
                        1280: { slidesPerView: 3 },
                    }}
                    autoplay={{ delay: 4000, disableOnInteraction: false }}
                    loop={true}
                    pagination={{
                        clickable: true,
                        el: ".custom-pagination",
                        renderBullet: (index, className) => {
                            return `<span class="${className} w-3 h-3 bg-blue-900 rounded-full mx-1"></span>`;
                        },
                    }}
                    className="testimonial-swiper"
                >
                    {reviews.map((testimonial, index) => (
                        <SwiperSlide key={index}>
                            <div className="bg-white rounded-2xl shadow-lg p-8 h-full flex flex-col">
                                {/* Author */}
                                <div className="flex items-center gap-4">
                                    <img
                                        src={testimonial.image}
                                        alt={testimonial.name}
                                        className="w-full h-full  object-cover border-2 border-blue-900"
                                    />
                                </div>
                            </div>
                        </SwiperSlide>
                    ))}
                </Swiper>

                {/* Custom Pagination */}
                <div className="custom-pagination flex justify-center mt-12 gap-2"></div>
            </div>
        </section>
    );
};

export default TestimonialSlider;
