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
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
          {/* Logo & Description */}
          <div>
            <div className="flex items-center gap-3 mb-6">
              <div className="w-16 h-16 ">
                <img src={logo} alt="logo" />
              </div>
              <h3 className="text-2xl font-bold">AMBITION FOOTBALL CLUB</h3>
            </div>
            <p className="text-gray-300 mb-6">
              At Ambition Academy & Football Club, our mission is to cultivate
              the next generation of PROFESSIONAL soccer and futsal talent
              through extensive, unparalleled training and holistic methods.
            </p>
            <p className="text-gray-300">
              We are dedicated to helping every player realize their highest
              potential, both on and off the field.
            </p>
          </div>

          {/* Contact Us */}
          <div>
            <h4 className="text-xl font-bold mb-6">Contact us</h4>
            <div className="space-y-4 text-gray-300">
              <p>
                <strong>Cunion Field:</strong>
                <br />
                1702 Trimble Road,
                <br />
                Edgewood, MD
              </p>
              <p>
                <strong>Harford Day School:</strong>
                <br />
                715 Bel Moore Mill Road
                <br />
                Bel Air, MD
              </p>
              <p>
                <strong>Email:</strong> Ambitionfcmd@gmail.com
              </p>
              <p>
                <strong>Phone:</strong> (407) 985-6532
              </p>
            </div>
          </div>

          {/* Spring 2025 */}
          <div>
            <h4 className="text-xl font-bold mb-6">SPRING 2025</h4>
            <ul className="space-y-3 text-gray-300">
              <li>Mon-Fri: Outdoor Grass Practice</li>
              <li>Indoor Futsal Practice</li>
              <li>Classroom Film Study</li>
              <li>Sat/Sun:</li>
              <li>- Leagues</li>
              <li>- Games</li>
              <li>- Private Lessons</li>
              <li>- Small Group Sessions</li>
              <li>- EDP MATCHES</li>
              <li>- FRIENDLIES & SCRIMMAGES</li>
            </ul>
          </div>

          {/* Menu */}
          <div>
            <h4 className="text-xl font-bold mb-6">Menu</h4>
            <ul className="space-y-3 text-gray-300">
              <li>
                <Link href="/about" className="hover:text-blue-400 transition">
                  About
                </Link>
              </li>
              <li>
                <Link href="/events" className="hover:text-blue-400 transition">
                  Events
                </Link>
              </li>
              <li>
                <Link href="/gallery" className="hover:text-blue-400 transition">
                  Gallery
                </Link>
              </li>
              <li>
                <Link
                  href="/training-pakage"
                  className="hover:text-blue-400 transition"
                >
                  Training Pakages
                </Link>
              </li>
              <li>
                <Link
                  href="/term-and-conditions"
                  className="hover:text-blue-400 transition"
                >
                  Terms & Conditions
                </Link>
              </li>
              <li>
                <Link
                  href="/privacy-policy"
                  className="hover:text-blue-400 transition"
                >
                  Privacy Policy
                </Link>
              </li>
            </ul>
            {/* Social Icons */}
            <div className="flex gap-4 mt-8">
              <a href="#" className="hover:text-blue-400 transition">
                <Facebook className="w-6 h-6" />
              </a>
              <a href="#" className="hover:text-blue-400 transition">
                <Twitter className="w-6 h-6" />
              </a>
              <a href="#" className="hover:text-blue-400 transition">
                <Youtube className="w-6 h-6" />
              </a>
              <a href="#" className="hover:text-blue-400 transition">
                <Instagram className="w-6 h-6" />
              </a>
              <a href="#" className="hover:text-blue-400 transition">
                <Linkedin className="w-6 h-6" />
              </a>
              <a href="#" className="hover:text-blue-400 transition">
                <MessageCircle className="w-6 h-6" />
              </a>
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
            <Link href="/privacy-policy" className="hover:text-white transition">
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
