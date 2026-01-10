// src/components/Navbar.jsx
import React, { useState, useEffect } from "react";
import { Link } from "react-router";
import logo from "../../assets/logo/logo.svg";
import Topbar from "./Topbar";

const Header = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  // Sticky on scroll
  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 0) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <>
      <Topbar />
      <nav
        className={`fixed top-4 left-0 right-0 z-50 transition-all duration-300 ${
          isScrolled ? "bg-white shadow-lg" : "bg-transparent"
        }`}
      >
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-20">
            {/* Logo */}
            <div className="shrink-0">
              <Link to="/" className="flex items-center">
                <div className="w-16 h-16     flex items-center justify-center">
                  <img src={logo} alt="" />
                </div>
              </Link>
            </div>

            {/* Desktop Menu */}
            <div className="hidden md:flex items-center space-x-12">
              <a
                href="#home"
                className="text-gray-800 hover:text-blue-900 font-medium transition"
              >
                Home
              </a>
              <a
                href="#about"
                className="text-gray-800 hover:text-blue-900 font-medium transition"
              >
                About
              </a>
              <a
                href="#event"
                className="text-gray-800 hover:text-blue-900 font-medium transition"
              >
                Event
              </a>
              <a
                href="#training"
                className="text-gray-800 hover:text-blue-900 font-medium transition"
              >
                Training Package
              </a>
              <a
                href="#gallery"
                className="text-gray-800 hover:text-blue-900 font-medium transition"
              >
                Gallery
              </a>
              <a
                href="#contact"
                className="bg-blue-900 text-white px-6 py-3 rounded-full hover:bg-blue-800 transition"
              >
                Contact →
              </a>
            </div>

            {/* Mobile Menu Button */}
            <div className="md:hidden">
              <button
                onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
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

        {/* Mobile Menu Dropdown */}
        {isMobileMenuOpen && (
          <div className="md:hidden bg-white shadow-lg">
            <div className="px-4 py-6 space-y-6">
              <a
                href="#home"
                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Home
              </a>
              <a
                href="#about"
                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                About
              </a>
              <a
                href="#event"
                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Event
              </a>
              <a
                href="#training"
                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Training Package
              </a>
              <a
                href="#gallery"
                className="block text-gray-800 hover:text-blue-900 font-medium text-lg"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Gallery
              </a>
              <a
                href="#contact"
                className="block bg-blue-900 text-white px-6 py-3 rounded-full text-center hover:bg-blue-800 transition font-medium text-lg"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Contact →
              </a>
            </div>
          </div>
        )}
      </nav>
    </>
  );
};

export default Header;
