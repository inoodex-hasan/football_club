import React from "react";
import HeroSlider from "../components/slider/HeroSlider";
import UpcomingEventsTwo from "../components/home/UpcomingEventsTwo";
import AboutUs from "../components/AboutUs";
import TrainingPackage from "../components/TrainingPackage";
import Gallery from "../components/home/Gallery";
import TestimonialSlider from "../components/home/TestimonialSlider";

const HomePage = ({sliders, about, events, packages, galleryImages, reviews}) => {
  // console.log(galleryImages);

  const popularPkg = packages.find((pkg) => pkg.is_popular);
  
  // 2. Filter out all other packages (excluding the popular one)
  const otherPkgs = packages.filter((pkg) => pkg.id !== popularPkg?.id);

  // 3. Construct the 3-item array: [Other 1, Popular, Other 2]
  const displayPackages = [
    otherPkgs[0],  // First normal package
    popularPkg,    // Most Popular in the middle
    otherPkgs[1],  // Second normal package
  ].filter(Boolean).slice(0, 3); // Safety: ensures exactly 3 items and removes nulls

  return (
    // console.log(packages),
    <>
      <HeroSlider sliders={sliders} />
      <AboutUs about={about} />
      <UpcomingEventsTwo events={events} />
      <TrainingPackage packages={displayPackages}/>
      <Gallery galleryImages={galleryImages} />
      <TestimonialSlider reviews={reviews} />
    </>
  );
};

export default HomePage;
