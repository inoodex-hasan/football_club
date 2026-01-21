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
import logo from "../../assets/logo/ambit10n_logo.png";
import ssl from "../../assets/logo/ssl.png";
import { Link, usePage } from "@inertiajs/react";

const Footer = () => {
    const { props } = usePage();
    const { contact } = props;
    // const logo = props.logo.logo;
    // console.log(props.logo.logo);

    const contactData =
        Array.isArray(contact) && contact.length > 0
            ? contact[0]
            : { address: "", phone: "", email: "" };

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
        return () => window.removeEventListener("scroll", handleScroll);
    }, []);

    return (
        <footer className="bg-black text-white">
            {/* Main Footer */}
            <div className="container px-4 sm:px-6 lg:px-8 py-16 mx-auto">
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                    {/* Column 1: Logo & Description */}
                    <div className="flex flex-col text-left">
                        <img src={logo} className="w-16 h-16 mb-4" alt="logo" />
                        <h3 className="text-2xl font-bold mb-2">
                            AMBIT1ON FOOTBALL ACADEMY
                        </h3>
                        <p className="text-gray-300 mb-2">
                            At Ambit1on Academy & Football Club, our mission is
                            to develop the next generation of athletes.
                        </p>
                        <p className="text-gray-300">
                            We are dedicated to helping every player realize
                            their highest potential.
                        </p>
                    </div>

                    {/* Column 2: Contact Us (DYNAMIC DATA) */}
                    <div className="flex flex-col text-left space-y-2 text-gray-300">
                        <h4 className="text-xl font-bold mb-4">Contact us</h4>
                        <p>{contact.address || "Address unavailable"}</p>
                        <p>
                            <strong>Email:</strong> {contact.email || "N/A"}
                        </p>
                        <p>
                            <strong>Phone:</strong> {contact.phone || "N/A"}
                        </p>
                    </div>

                    {/* Column 3: Menu */}
                    <div className="flex flex-col space-y-2 text-gray-300 md:ml-8">
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
                                    href="/training-packages"
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
                    <div className="flex flex-col space-y-4">
                        <h4 className="text-xl font-bold mb-4">Follow Us</h4>
                        <div className="flex gap-4">
                            <a
                                href="https://www.facebook.com/profile.php?id=61583251019204"
                                rel="noopener noreferrer"
                                target="_blank"
                            >
                                <Facebook className="w-6 h-6 hover:text-blue-400 cursor-pointer" />
                            </a>
                            <Twitter className="w-6 h-6 hover:text-blue-400 cursor-pointer" />
                            <Youtube className="w-6 h-6 hover:text-blue-400 cursor-pointer" />
                            <a href="https://www.instagram.com/ambit10nacademy_bangladesh?igsh=MTFlM2Q0ZHBhampuYw==">
                                <Instagram className="w-6 h-6 hover:text-blue-400 cursor-pointer" />
                            </a>

                            <Linkedin className="w-6 h-6 hover:text-blue-400 cursor-pointer" />
                            <MessageCircle className="w-6 h-6 hover:text-blue-400 cursor-pointer" />
                        </div>
                    </div>
                </div>
            </div>

            {/* Bottom Bar */}
            <div className="bg-gray-800 py-6">
                <div className="container px-4 sm:px-6 lg:px-8 mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
                    <p className="text-gray-400 text-sm">
                        Copyright © 2026 AMBIT1ON. All rights reserved.
                    </p>
                    {/* <img src={ssl} className="h-12 w-auto" alt="ssl secure" /> */}
                    <div className="flex flex-wrap gap-6 text-gray-400 text-sm">
                        <Link
                            href="/privacy-policy"
                            className="hover:text-white transition"
                        >
                            Privacy Policy
                        </Link>
                        <Link
                            href="/term-and-conditions"
                            className="hover:text-white transition"
                        >
                            Terms & Conditions
                        </Link>
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
