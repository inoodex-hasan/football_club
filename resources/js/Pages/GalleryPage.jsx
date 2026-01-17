import React, { useState, useMemo } from "react";

const GalleryPage = ({ gallery = [] }) => {
    const [lightboxOpen, setLightboxOpen] = useState(false);
    const [currentMediaIndex, setCurrentMediaIndex] = useState(0);

    /**
     * 1. Transform Backend Data
     * Flattening the nested images/videos from the database groups
     */
    const mediaItems = useMemo(() => {
        return gallery.flatMap((group) => {
            const images = (group.images || []).map((path) => ({
                type: "image",
                src: `/${path}`,
                title: group.title || "Gallery Image",
            }));

            const videos = (group.videos || []).map((path) => ({
                type: "video",
                src: `/${path}`,
                title: group.title || "Gallery Video",
                thumbnail: `/${path}`, // Using the video itself as a preview
            }));

            return [...images, ...videos];
        });
    }, [gallery]);

    // 2. Lightbox Handlers
    const openLightbox = (index) => {
        setCurrentMediaIndex(index);
        setLightboxOpen(true);
    };

    const closeLightbox = () => setLightboxOpen(false);

    const goNext = (e) => {
        e.stopPropagation();
        setCurrentMediaIndex((prev) => (prev + 1) % mediaItems.length);
    };

    const goPrev = (e) => {
        e.stopPropagation();
        setCurrentMediaIndex(
            (prev) => (prev - 1 + mediaItems.length) % mediaItems.length,
        );
    };

    return (
        <div className="min-h-screen bg-gray-50">
            {/* Hero Section */}
            <section className="relative h-64 md:h-96 overflow-hidden">
                <img
                    src="https://c8.alamy.com/comp/2R7NY2C/soccer-stadium-inside-view-football-field-empty-stands-a-crowd-of-fans-a-roof-against-the-sky-2R7NY2C.jpg"
                    alt="Stadium"
                    className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent" />
                <div className="container absolute bottom-0 left-0 right-0 p-8 md:p-16 text-white mx-auto">
                    <h1 className="text-4xl md:text-6xl font-bold mb-4">
                        Our Media Galleries
                    </h1>
                    <p className="text-lg md:text-xl max-w-3xl opacity-90">
                        Capturing every moment on and off the field.
                    </p>
                </div>
            </section>

            {/* Gallery Grid */}
            <section className="py-16 px-4 md:px-12">
                <div className="container mx-auto">
                    <h2 className="text-3xl md:text-5xl font-bold text-center mb-12 text-blue">
                        Media Gallery
                    </h2>

                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        {mediaItems.map((item, index) => (
                            <div
                                key={index}
                                onClick={() => openLightbox(index)}
                                className="group relative overflow-hidden rounded-xl shadow-md bg-white cursor-pointer hover:shadow-2xl transition duration-300"
                            >
                                {item.type === "image" ? (
                                    <img
                                        src={item.src}
                                        alt={item.title}
                                        className="w-full h-64 object-cover transform group-hover:scale-105 transition duration-500"
                                    />
                                ) : (
                                    <div className="relative w-full h-64 bg-black">
                                        <video
                                            src={item.src}
                                            className="w-full h-full object-cover opacity-80"
                                            muted
                                        />
                                        <div className="absolute inset-0 flex items-center justify-center">
                                            <div className="bg-white/90 rounded-full p-3 shadow-lg group-hover:scale-110 transition">
                                                <svg
                                                    className="w-10 h-10 text-[#283E77]"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                >
                                                    <path
                                                        fillRule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                        clipRule="evenodd"
                                                    />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                )}
                                <div className="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-4 text-white opacity-0 group-hover:opacity-100 transition duration-300">
                                    <p className="text-sm font-medium">
                                        {item.title}
                                    </p>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Lightbox Modal */}
            {lightboxOpen && (
                <div
                    className="fixed inset-0 z-[9999] flex items-center justify-center bg-black/95 animate-in fade-in duration-300"
                    onClick={closeLightbox}
                >
                    <button
                        onClick={closeLightbox}
                        className="absolute top-6 right-8 text-white text-5xl font-light hover:text-gray-400 z-[10000]"
                    >
                        &times;
                    </button>

                    <button
                        onClick={goPrev}
                        className="absolute left-6 text-white text-6xl font-thin hover:text-gray-400 transition z-[10000]"
                    >
                        &#8249;
                    </button>
                    <button
                        onClick={goNext}
                        className="absolute right-6 text-white text-6xl font-thin hover:text-gray-400 transition z-[10000]"
                    >
                        &#8250;
                    </button>

                    <div
                        className="max-w-6xl w-full mx-auto p-4 flex flex-col items-center"
                        onClick={(e) => e.stopPropagation()}
                    >
                        {mediaItems[currentMediaIndex].type === "image" ? (
                            <img
                                src={mediaItems[currentMediaIndex].src}
                                className="max-h-[80vh] w-auto object-contain rounded-lg shadow-2xl"
                            />
                        ) : (
                            <video
                                src={mediaItems[currentMediaIndex].src}
                                controls
                                autoPlay
                                className="max-h-[80vh] w-full rounded-lg shadow-2xl"
                            >
                                <source
                                    src={mediaItems[currentMediaIndex].src}
                                    type="video/mp4"
                                />
                            </video>
                        )}
                        <div className="mt-6 text-center">
                            <span className="px-3 py-1 bg-[#283E77] text-white text-xs rounded-full uppercase tracking-widest mb-2 inline-block">
                                {mediaItems[currentMediaIndex].type}
                            </span>
                            <p className="text-white text-2xl font-light tracking-wide italic">
                                "{mediaItems[currentMediaIndex].title}"
                            </p>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

export default GalleryPage;
