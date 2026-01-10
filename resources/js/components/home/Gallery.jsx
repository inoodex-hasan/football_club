// src/components/Gallery.jsx
import React, { useState } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";

const Gallery = ({ galleryImages = [] }) => {
  const [selectedItem, setSelectedItem] = useState(null);

  const allMedia = galleryImages.flatMap((group) => {
    const images = (group.images || []).map((path) => ({
      type: "image",
      src: `/${path}`, // Assuming public folder storage
      alt: group.title || "Gallery Image",
    }));

    const videos = (group.videos || []).map((path) => ({
      type: "video",
      src: `/${path}`,
      title: group.title || "Highlight Video",
      poster: "", // You could add a poster logic here if needed
    }));

    return [...images, ...videos];
  });

  const openModal = (item) => setSelectedItem(item);
  const closeModal = () => setSelectedItem(null);

  return (
    <section className="bg-gray-200 py-16 md:py-24">
      <div className="container px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12 md:mb-16">
          <h2 className="text-4xl md:text-4xl font-noto font-bold mb-4 text-[#283E77]">
            Our Gallery
          </h2>
          <p className="text-xl text-gray-700 max-w-3xl mx-auto">
            Relive the best moments from Ambition Football Club.
          </p>
        </div>

        <Swiper
          modules={[Navigation]}
          spaceBetween={30}
          slidesPerView={1.2}
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
          {allMedia.map((item, index) => (
            <SwiperSlide key={index}>
              <div
                className="relative rounded-2xl overflow-hidden shadow-xl cursor-pointer group bg-white aspect-[3/4]"
                onClick={() => openModal(item)}
              >
                {item.type === "image" ? (
                  <img
                    src={item.src}
                    alt={item.alt}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                  />
                ) : (
                  <div className="relative w-full h-full">
                    <video
                      className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                      muted
                      playsInline
                    >
                      <source src={item.src} type="video/mp4" />
                    </video>
                    {/* Play Icon Overlay */}
                    <div className="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition">
                      <div className="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30">
                        <svg className="w-8 h-8 text-white fill-current" viewBox="0 0 24 24">
                          <path d="M8 5v14l11-7z" />
                        </svg>
                      </div>
                    </div>
                  </div>
                )}

                {/* Hover Text */}
                <div className="absolute inset-0 bg-gradient-to-t from-[#283E77]/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                  <p className="text-white text-sm font-medium uppercase tracking-wider">
                    {item.type === "image" ? "View Photo" : "Play Video"}
                  </p>
                </div>
              </div>
            </SwiperSlide>
          ))}
        </Swiper>

        {/* Navigation */}
        <div className="flex justify-center gap-8">
          <button className="custom-prev bg-[#283E77] cursor-pointer text-white hover:bg-[#1e2d5a] transition p-4 rounded-full shadow-lg disabled:opacity-50">
             <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" /></svg>
          </button>
          <button className="custom-next bg-[#283E77] cursor-pointer text-white hover:bg-[#1e2d5a] transition p-4 rounded-full shadow-lg disabled:opacity-50">
             <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" /></svg>
          </button>
        </div>
      </div>

      {/* Lightbox Modal */}
      {selectedItem && (
        <div
          className="fixed inset-0 bg-black/95 flex items-center justify-center z-[9999] p-4 animate-in fade-in duration-300"
          onClick={closeModal}
        >
          <button className="absolute top-6 right-6 text-white text-4xl hover:scale-110 transition" onClick={closeModal}>×</button>
          <div className="max-w-5xl w-full" onClick={(e) => e.stopPropagation()}>
            {selectedItem.type === "image" ? (
              <img src={selectedItem.src} alt={selectedItem.alt} className="max-h-[85vh] mx-auto object-contain rounded-lg" />
            ) : (
              <video src={selectedItem.src} controls autoPlay className="max-h-[85vh] w-full rounded-lg shadow-2xl">
                <source src={selectedItem.src} type="video/mp4" />
              </video>
            )}
            <p className="text-white text-center mt-4 text-xl font-light">{selectedItem.alt || selectedItem.title}</p>
          </div>
        </div>
      )}
    </section>
  );
};

export default Gallery;