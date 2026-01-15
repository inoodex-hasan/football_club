// import React from "react";
// import Header from "../header/Header";
// import { Outlet } from "react-router";
// import Footer from "../footer/Footer";

// const Layout = () => {
//   return (
//     <>
//       <Header />
//       <main>
//         <Outlet />
//       </main>
//       <Footer />
//     </>
//   );
// };

// export default Layout;

import React from "react";
import Header from "../header/Header";
import Footer from "../footer/Footer";
import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import { usePage } from "@inertiajs/react";

const Layout = ({ children }) => {
    return (
        <>
            <ToastContainer
                position="top-right"
                autoClose={3000}
                theme="colored"
            />
            <Header />
            <main className="relative">{children}</main>
            <Footer />
        </>
    );
};

export default Layout;
