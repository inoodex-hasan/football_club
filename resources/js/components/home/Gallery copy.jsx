// src/components/Gallery.jsx
import React, { useState } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";

// Placeholder images (replace with your actual assets)
import gallery1 from "../../assets/gallery/1.png";
import gallery2 from "../../assets/gallery/2.png";
import gallery3 from "../../assets/gallery/3.png";
import gallery4 from "../../assets/gallery/4.png";
import gallery5 from "../../assets/gallery/5.png";
import gallery6 from "../../assets/gallery/6.png";

// Free stock video URLs (direct MP4 links from royalty-free sources like Pixabay, Pexels, Mixkit)
// Replace posters with your own thumbnails if needed
const highlightVideo1 =
  "https://cdn.pixabay.com/videofiles/2023-07-12/pixabay-videos-123456-example.mp4"; // Replace with actual direct MP4
const highlightVideo2 = "https://player.vimeo.com/external/example.mp4"; // Example - find direct links

const galleryItems = [
  { type: "image", src: gallery1, alt: "Youth players training" },
  { type: "image", src: gallery2, alt: "Team celebration" },
  {
    type: "video",
    src: "https://videos.pexels.com/video-files/example/soccer-goal.mp4",
    poster: gallery3,
    title: "Amazing Goal Highlight",
  }, // Use real direct MP4
  { type: "image", src: gallery4, alt: "Match action" },
  {
    type: "video",
    src: "https://cdn.coverr.co/videos/example-football-highlight.mp4",
    poster: gallery5,
    title: "Skillful Dribble & Goal",
  },
  { type: "image", src: gallery6, alt: "Academy session" },
  {
    type: "video",
    src: highlightVideo2,
    poster: gallery1,
    title: "Team Training Highlights",
  },
  // Add more images/videos as needed
];

const Gallery = ({galleryImages}) => {
  console.log(galleryImages);
  const [selectedItem, setSelectedItem] = useState(null);

  const openModal = (item) => {
    setSelectedItem(item);
  };

  const closeModal = () => {
    setSelectedItem(null);
  };

  return (
    <section className="bg-gray-200 py-16 md:py-24">
      <div className="container px-4 sm:px-6 lg:px-8">
        {/* Header - Updated for Highlights */}
        <div className="text-center mb-12 md:mb-16">
          <h2
            className="text-4xl md:text-4xl font-noto font-bold mb-4"
            style={{ color: "#283E77" }}
          >
            Our Gallery
          </h2>
          <p className="text-xl text-gray-700 max-w-3xl mx-auto">
            Relive the best moments from our matches, training sessions, and
            goal celebrations. Watch highlight videos and browse photos from
            Ambition Football Club.
          </p>
        </div>

        {/* Swiper Slider */}
        <Swiper
          modules={[Navigation]}
          spaceBetween={30}
          slidesPerView={1.2}
          centeredSlides={false}
          navigation={{
            prevEl: ".custom-prev",
            nextEl: ".custom-next",
          }}
          breakpoints={{
            640: { slidesPerView: 2.2 },
            768: { slidesPerView: 3.2 },
            1024: { slidesPerView: 4.2 },
            1280: { slidesPerView: 5 },
          }}
          className="gallery-swiper mb-8"
        >
          {galleryItems.map((item, index) => (
            <SwiperSlide key={index}>
              <div
                className="relative rounded-2xl overflow-hidden shadow-xl cursor-pointer group bg-white"
                onClick={() => openModal(item)}
              >
                {item.type === "image" ? (
                  <img
                    src={item.src}
                    alt={item.alt}
                    className="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110"
                  />
                ) : (
                  <div className="relative">
                    <video
                      poster={item.poster}
                      className="w-full h-80 md:h-96 object-cover transition-transform duration-500 group-hover:scale-110"
                      muted
                      loop
                      playsInline
                    >
                      <source src={item.src} type="video/mp4" />
                    </video>
                    {/* Play Icon */}
                    <div className="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 group-hover:opacity-100 transition">
                      <svg
                        className="w-20 h-20 text-white"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path d="M8 5v14l11-7z" />
                      </svg>
                    </div>
                  </div>
                )}

                {/* Hover Overlay */}
                <div className="absolute inset-0 bg-linear-to-t from-[#283E77]/80 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-6">
                  <p className="text-white text-lg font-semibold">
                    {item.type === "image"
                      ? "View Photo"
                      : item.title || "Play Highlight Video"}
                  </p>
                </div>
              </div>
            </SwiperSlide>
          ))}
        </Swiper>

        {/* Navigation Arrows */}
        <div className="flex justify-center gap-8">
          <button className="custom-prev bg-[#283E77] cursor-pointer text-white hover:bg-[#1e2d5a] transition p-4 rounded-full shadow-lg">
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
          <button className="custom-next bg-[#283E77] cursor-pointer text-white hover:bg-[#1e2d5a] transition p-4 rounded-full shadow-lg">
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
      </div>

      {/* Lightbox Modal */}
      {selectedItem && (
        <div
          className="fixed inset-0 bg-black/95 flex items-center justify-center z-50 p-4"
          onClick={closeModal}
        >
          <button
            className="absolute top-6 right-6 text-white text-5xl hover:text-gray-400 transition"
            onClick={closeModal}
          >
            ×
          </button>
          <div
            className="max-w-7xl w-full"
            onClick={(e) => e.stopPropagation()}
          >
            {selectedItem.type === "image" ? (
              <img
                src={selectedItem.src}
                alt={selectedItem.alt}
                className="max-h-[90vh] mx-auto object-contain rounded-xl shadow-2xl"
              />
            ) : (
              <video
                src={selectedItem.src}
                controls
                autoPlay
                muted={false}
                className="max-h-[90vh] w-full rounded-xl shadow-2xl"
              >
                <source src={selectedItem.src} type="video/mp4" />
              </video>
            )}
            {selectedItem.title && (
              <p className="text-white text-center text-2xl mt-6 font-semibold">
                {selectedItem.title}
              </p>
            )}
          </div>
        </div>
      )}
    </section>
  );
};

export default Gallery;
