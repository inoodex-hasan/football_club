// src/components/Header.jsx
import React, { useState, useEffect } from "react";
import logo from "../../assets/logo/logo.png";
import { Link } from "@inertiajs/react";

const Header = () => {
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
            <div className="bg-blue-900 text-white text-sm">
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
                                support@rstheme.com
                            </span>
                            <div className="flex gap-4">
                                <a href="#" className="hover:text-gray-300">
                                    <svg
                                        className="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path d="M24 4.557a9.83 9.83 0 01-2.828.775 4.932 4.932 0 002.165-2.717 9.864 9.864 0 01-3.127 1.195 4.916 4.916 0 00-8.384 4.482 13.94 13.94 0 01-10.128-5.14 4.916 4.916 0 001.523 6.573 4.9 4.9 0 01-2.229-.616v.061a4.916 4.916 0 003.946 4.827 4.902 4.902 0 01-2.224.084 4.92 4.92 0 004.588 3.417 9.867 9.867 0 01-6.102 2.105 9.9 9.9 0 01-1.171-.07 13.9 13.9 0 007.557 2.209c9.055 0 14.01-7.496 14.01-13.985 0-.213-.005-.425-.014-.636A9.94 9.94 0 0024 4.557z" />
                                    </svg>
                                </a>
                                <a href="#" className="hover:text-gray-300">
                                    <svg
                                        className="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.326 3.608 1.301.975.975 1.239 2.242 1.301 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.326 2.633-1.301 3.608-.975.975-2.242 1.239-3.608 1.301-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.326-3.608-1.301-.975-.975-1.239-2.242-1.301-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.326-2.633 1.301-3.608.975-.975 2.242-1.239 3.608-1.301 1.266-.058 1.646-.07 4.85-.07zM12 0C8.741 0 8.333.015 7.053.072 5.775.129 4.905.333 4.14.88 3.373 1.427 2.169 2.631 2.169 3.398c-.547.765-.751 1.635-.808 2.913-.057 1.28-.072 1.688-.072 4.947s.015 3.667.072 4.947c.057 1.278.261 2.148.808 2.913.755.547 1.959.751 2.913.808 1.28.057 1.688.072 4.947.072s3.667-.015 4.947-.072c1.278-.057 2.148-.261 2.913-.808.547-.755.751-1.959.808-2.913.057-1.28.072-1.688.072-4.947s-.015-3.667-.072-4.947c-.057-1.278-.261-2.148-.808-2.913-.755-.547-1.959-.751-2.913-.808C15.667.015 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z" />
                                    </svg>
                                </a>
                                <a href="#" className="hover:text-gray-300">
                                    <svg
                                        className="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.95C18.88 4 12 4 12 4s-6.88 0-8.59.47a2.78 2.78 0 00-1.95 1.95A28.94 28.94 0 001 11.5a28.94 28.94 0 00.46 5.08 2.78 2.78 0 001.95 1.95C5.12 19 12 19 12 19s6.88 0 8.59-.47a2.78 2.78 0 001.95-1.95c.47-1.71.47-5.08.47-5.08s0-3.37-.47-5.08zM9.75 15.02V7.98l6 3.52-6 3.52z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        {/* Right: Login / Signup */}
                        <div className="flex gap-6">
                            <a href="#" className="hover:text-gray-300">
                                Login
                            </a>
                            <span className="text-gray-300">/</span>
                            <a href="#" className="hover:text-gray-300">
                                Signup
                            </a>
                        </div>
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
                                <div className="w-16 h-16 not-only: flex items-center justify-center">
                                    <img src={logo} alt="logo" />
                                </div>
                            </Link>
                        </div>

                        {/* Desktop Menu */}
                        <div className="hidden md:flex items-center space-x-10">
                            <Link
                                href="/"
                                className="text-gray-800 hover:text-blue-900 font-medium transition"
                            >
                                Home
                            </Link>
                            <Link
                                href="/about"
                                className="text-gray-800 hover:text-blue-900 font-medium transition"
                            >
                                About
                            </Link>
                            <Link
                                href="/events"
                                className="text-gray-800 hover:text-blue-900 font-medium transition"
                            >
                                Events
                            </Link>
                            <Link
                                href="/training-packages"
                                className="text-gray-800 hover:text-blue-900 font-medium transition"
                            >
                                Training Package
                            </Link>
                            <Link
                                href="/gallery"
                                className="text-gray-800 hover:text-blue-900 font-medium transition"
                            >
                                Gallery
                            </Link>
                            <Link
                                href="/contacts"
                                className="bg-blue-900 text-white px-6 py-3 rounded-full hover:bg-blue-800 transition font-medium"
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
