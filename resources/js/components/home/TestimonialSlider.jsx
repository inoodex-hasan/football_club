import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import { Quote, Star } from "lucide-react";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/autoplay";


const TestimonialSlider = ({reviews}) => {
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
            Real stories from players, parents, and coaches who have experienced
            our programs.
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
                {/* Quote Icon */}
                <Quote className="w-12 h-12 text-blue-900 mb-6" />

                {/* Stars */}
                <div className="flex mb-6">
                  {Array(testimonial.rating)
                    .fill()
                    .map((_, i) => (
                      <Star
                        key={i}
                        className="w-5 h-5 text-yellow-400 fill-yellow-400"
                      />
                    ))}
                </div>

                {/* Text */}
                <p className="text-gray-700 text-lg mb-8 flex-grow">
                  "{testimonial.comment}"
                </p>

                {/* Author */}
                <div className="flex items-center gap-4">
                  <img
                    src={testimonial.image}
                    alt={testimonial.name}
                    className="w-16 h-16 rounded-full object-cover border-2 border-blue-900"
                  />
                  <div>
                    <h4 className="font-bold text-gray-900">
                      {testimonial.name}
                    </h4>
                    <p className="text-gray-600">{testimonial.designation}</p>
                  </div>
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
