// src/components/Header.jsx
import React, { useState, useEffect } from "react";
// import logo from "../../assets/logo/logo.png";
import { Link } from "@inertiajs/react";
import { Twitter, Facebook, Instagram, Youtube } from "lucide-react";
import { usePage } from "@inertiajs/react";

const Header = () => {
    const { props } = usePage();
    // console.log(props.logo.logo);
    const logoImage = props.logo.logo;

    const [isScrolled, setIsScrolled] = useState(false);
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

    // Sticky navbar on scroll
    useEffect(() => {
        const handleScroll = () => {
            setIsScrolled(window.scrollY > 0);
        };
        window.addEventListener("scroll", handleScroll);
        return () => window.removeEventListener("scroll", handleScroll);
    }, []);

    return (
        <>
            {/* Top Bar - will scroll away */}
            <div className="bg-[#C8B47D] text-black text-sm">
                <div className="container  px-4 sm:px-6 lg:px-8 py-2">
                    <div className="flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0">
                        {/* Left: Email + Social */}
                        <div className="flex items-center gap-6">
                            <span className="flex items-center gap-2">
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
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>
                                <a href="mailto:ambit10nacademybangladesh@gmail.com">
                                    ambit10nacademybangladesh@gmail.com
                                </a>
                            </span>
                        </div>
                        <div className="flex gap-4 justify-end">
                            <a
                                href="https://www.facebook.com/profile.php?id=61583251019204"
                                rel="noopener noreferrer"
                                target="_blank"
                            >
                                <Facebook className="w-6 h-6 hover:text-blue-400 cursor-pointer" />
                            </a>
                            <a
                                href="https://www.instagram.com/ambit10nacademy_bangladesh?igsh=MTFlM2Q0ZHBhampuYw=="
                                className="hover:text-gray-300"
                            >
                                <Instagram />
                            </a>
                            <a
                                href="https://youtube.com/@ambit10nfootballclub?si=3tgV6Ah8ZhYC9JYr"
                                rel="noopener noreferrer"
                                target="_blank"
                                className="hover:text-gray-300"
                            >
                                <Youtube />
                            </a>
                        </div>

                        {/* Right: Login / Signup */}
                        {/* <div className="flex gap-6">
                            <a href="#" className="hover:text-gray-300">
                                Login
                            </a>
                            <span className="text-gray-300">/</span>
                            <a href="#" className="hover:text-gray-300">
                                Signup
                            </a>
                        </div> */}
                    </div>
                </div>
            </div>

            {/* Navbar - sticky on scroll */}
            <nav
                className={`transition-all duration-300 z-50 ${
                    isScrolled
                        ? "fixed top-0 left-0 right-0 bg-white shadow-lg"
                        : "relative bg-transparent"
                }`}
            >
                <div className="container px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center h-20">
                        {/* Logo */}
                        <div className="shrink-0">
                            <Link
                                href="/"
                                className="flex items-center gap-3 cursor-pointer"
                            >
                                <div className="w-16 h-16 flex items-center justify-center">
                                    <img src={`/${logoImage}`} alt="logo" />
                                </div>
                            </Link>
                        </div>

                        {/* Desktop Menu */}
                        <div className="hidden md:flex items-center space-x-10">
                            <Link
                                href="/"
                                className="text-gray-800 hover:text-blue font-medium transition"
                            >
                                Home
                            </Link>
                            <Link
                                href="/about"
                                className="text-gray-800 hover:text-blue font-medium transition"
                            >
                                About
                            </Link>
                            <Link
                                href="/events"
                                className="text-gray-800 hover:text-blue font-medium transition"
                            >
                                Events
                            </Link>
                            <Link
                                href="/training-packages"
                                className="text-gray-800 hover:text-blue font-medium transition"
                            >
                                Training Package
                            </Link>
                            <Link
                                href="/gallery"
                                className="text-gray-800 hover:text-blue font-medium transition"
                            >
                                Gallery
                            </Link>
                            <Link
                                href="/contacts"
                                className="bg-[#C8B47D] text-black px-6 py-3 rounded-full   transition font-medium"
                            >
                                Contact →
                            </Link>
                        </div>

                        {/* Mobile Menu Button */}
                        <div className="md:hidden">
                            <button
                                onClick={() =>
                                    setIsMobileMenuOpen(!isMobileMenuOpen)
                                }
                                className="text-gray-800 focus:outline-none"
                            >
                                {isMobileMenuOpen ? (
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
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                ) : (
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
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                    </svg>
                                )}
                            </button>
                        </div>
                    </div>
                </div>

                {/* Mobile Menu */}
                {isMobileMenuOpen && (
                    <div className="md:hidden bg-white shadow-lg">
                        <div className="px-4 py-6 space-y-6">
                            <Link
                                href="/"
                                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                                onClick={() => setIsMobileMenuOpen(false)}
                            >
                                Home
                            </Link>
                            <Link
                                href="/about"
                                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                                onClick={() => setIsMobileMenuOpen(false)}
                            >
                                About
                            </Link>
                            <Link
                                href="/events"
                                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                                onClick={() => setIsMobileMenuOpen(false)}
                            >
                                Event
                            </Link>
                            <Link
                                href="/training-packages"
                                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                                onClick={() => setIsMobileMenuOpen(false)}
                            >
                                Training Package
                            </Link>
                            <Link
                                href="/gallery"
                                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                                onClick={() => setIsMobileMenuOpen(false)}
                            >
                                Gallery
                            </Link>
                            <Link
                                href="/contacts"
                                className="block bg-blue-900 text-white px-6 py-3 rounded-full text-center hover:bg-blue-800 transition font-medium text-lg"
                                onClick={() => setIsMobileMenuOpen(false)}
                            >
                                Contact →
                            </Link>
                        </div>
                    </div>
                )}
            </nav>
        </>
    );
};

export default Header;
