import { Link } from "@inertiajs/react";
import React from "react";
import aboutimg from "../assets/about/about.jpeg";
const AboutUs = ({ about }) => {
    // Limits visible text while keeping basic HTML intact
    const limitHtmlContent = (html, limit = 150) => {
        if (!html) return "";

        const div = document.createElement("div");
        div.innerHTML = html;

        let textCount = 0;
        let result = "";

        for (const node of div.childNodes) {
            if (textCount >= limit) break;

            const nodeText = node.textContent || "";

            if (textCount + nodeText.length > limit) {
                const allowed = limit - textCount;

                if (node.nodeType === 3) {
                    // text node
                    result += nodeText.slice(0, allowed);
                } else if (node.nodeType === 1) {
                    // element node
                    // recursively slice innerHTML for element nodes
                    const inner = node.innerHTML;
                    const truncatedInner = inner.slice(0, allowed);
                    result += `<${node.nodeName.toLowerCase()}>${truncatedInner}</${node.nodeName.toLowerCase()}>`;
                }

                textCount = limit;
                break;
            }

            result += node.outerHTML || nodeText;
            textCount += nodeText.length;
        }

        return result + (textCount >= limit ? "..." : "");
    };

    // console.log(about);
    return (
        <section className="bg-white py-16 md:py-24">
            <div className="container px-4 sm:px-6 lg:px-8">
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                    {/* Header */}
                    <div className="">
                        <div className="mb-12">
                            <h2 className="text-4xl  font-bold text-blue mb-4 font-noto">
                                {about?.title}
                            </h2>
                            <p
                                className="text-lg font-normal text-gray-900 mb-3"
                                dangerouslySetInnerHTML={{
                                    __html: limitHtmlContent(
                                        about?.description,
                                        728,
                                    ),
                                }}
                            />
                            {/* <p
                                className="text-lg font-normal text-gray-900 mb-3"
                                dangerouslySetInnerHTML={{
                                    __html: limitHtmlText(
                                        about?.description,
                                        500
                                    ),
                                }}
                            /> */}
                        </div>
                        <Link
                            href="/about"
                            className="mt-6 md:mt-0 bg-blue inline-flex hover:bg-blue text-white font-normal px-10 py-3 rounded-full text-lg
               transition duration-300     gap-2"
                        >
                            Explore →
                        </Link>
                    </div>

                    {/* Right: Image Grid */}
                    <div className="flex justify-end">
                        <img src={about?.images} alt="about image" />
                    </div>
                </div>
            </div>
        </section>
    );
};

export default AboutUs;
