// src/components/Footer.jsx
import React, { useEffect, useState } from "react";
import {
    ArrowUp,
    Facebook,
    Twitter,
    Youtube,
    Instagram,
    Linkedin,
    MessageCircle,
} from "lucide-react";
import logo from "../../assets/logo/logo-white.png";
import { Link } from "@inertiajs/react";

const Footer = () => {
    const [showScrollTop, setShowScrollTop] = useState(false);

    const scrollToTop = () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };

    // Scroll event listener to show/hide button
    useEffect(() => {
        const handleScroll = () => {
            if (window.scrollY > 300) {
                setShowScrollTop(true);
            } else {
                setShowScrollTop(false);
            }
        };

        window.addEventListener("scroll", handleScroll);

        // Cleanup on unmount
        return () => window.removeEventListener("scroll", handleScroll);
    }, []);

    return (
        <footer className="bg-[#0a1d3a] text-white">
            {/* Main Footer */}
            <div className="container px-4 sm:px-6 lg:px-8 py-16">
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 justify-center items-start">
                    {/* Column 1: Logo & Description */}
                    <div className="flex flex-col items-center text-center">
                        <img src={logo} className="w-16 h-16 mb-4" alt="logo" />
                        <h3 className="text-2xl font-bold mb-2">
                            AMBITION FOOTBALL CLUB
                        </h3>
                        <p className="text-gray-300 mb-2">
                            At Ambition Academy & Football Club, our mission
                            is...
                        </p>
                        <p className="text-gray-300">
                            We are dedicated to helping every player realize
                            their highest potential.
                        </p>
                    </div>

                    {/* Column 2: Contact Us */}
                    <div className="flex flex-col items-center text-center space-y-2 text-gray-300">
                        <h4 className="text-xl font-bold mb-4">Contact us</h4>
                        <p>
                            <strong>Cunion Field:</strong>
                            <br />
                            1702 Trimble Road, Edgewood, MD
                        </p>
                        <p>
                            <strong>Harford Day School:</strong>
                            <br />
                            715 Bel Moore Mill Road, Bel Air, MD
                        </p>
                        <p>
                            <strong>Email:</strong> Ambitionfcmd@gmail.com
                        </p>
                        <p>
                            <strong>Phone:</strong> (407) 985-6532
                        </p>
                    </div>

                    {/* Column 3: Menu */}
                    <div className="flex flex-col items-center text-center space-y-2 text-gray-300">
                        <h4 className="text-xl font-bold mb-4">Menu</h4>
                        <ul className="space-y-2">
                            <li>
                                <Link
                                    href="/about"
                                    className="hover:text-blue-400"
                                >
                                    About
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/events"
                                    className="hover:text-blue-400"
                                >
                                    Events
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/gallery"
                                    className="hover:text-blue-400"
                                >
                                    Gallery
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/training-pakage"
                                    className="hover:text-blue-400"
                                >
                                    Training Packages
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/term-and-conditions"
                                    className="hover:text-blue-400"
                                >
                                    Terms & Conditions
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/privacy-policy"
                                    className="hover:text-blue-400"
                                >
                                    Privacy Policy
                                </Link>
                            </li>
                        </ul>
                    </div>

                    {/* Column 4: Social Icons */}
                    <div className="flex flex-col items-center text-center space-y-4">
                        <h4 className="text-xl font-bold mb-4">Follow Us</h4>
                        <div className="flex gap-4">
                            <Facebook className="w-6 h-6 hover:text-blue-400" />
                            <Twitter className="w-6 h-6 hover:text-blue-400" />
                            <Youtube className="w-6 h-6 hover:text-blue-400" />
                            <Instagram className="w-6 h-6 hover:text-blue-400" />
                            <Linkedin className="w-6 h-6 hover:text-blue-400" />
                            <MessageCircle className="w-6 h-6 hover:text-blue-400" />
                        </div>
                    </div>
                </div>
            </div>

            {/* Bottom Bar */}
            <div className="bg-blue py-6">
                <div className="container px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p className="text-gray-400 text-sm">
                        Copyright © 2025 AMBITION. All rights reserved.
                    </p>
                    <div className="flex flex-wrap gap-6 text-gray-400 text-sm">
                        <Link
                            href="/privacy-policy"
                            className="hover:text-white transition"
                        >
                            Privacy Policy
                        </Link>
                        <Link
                            href="term-and-conditions"
                            className="hover:text-white transition"
                        >
                            Terms of Service
                        </Link>
                        <button
                            onClick={scrollToTop}
                            className="flex items-center gap-2 hover:text-white transition"
                        >
                            Go to top
                            <ArrowUp className="w-5 h-5" />
                        </button>
                    </div>
                </div>
            </div>

            {/* Scroll to Top Floating Button */}
            <button
                onClick={scrollToTop}
                className={`fixed bottom-8 right-8 cursor-pointer bg-[#283E77] hover:bg-[#1e2d5a] text-white w-14 h-14 rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 z-50 ${
                    showScrollTop
                        ? "opacity-100 translate-y-0"
                        : "opacity-0 translate-y-12 pointer-events-none"
                }`}
            >
                <ArrowUp className="w-8 h-8" />
            </button>
        </footer>
    );
};

export default Footer;
