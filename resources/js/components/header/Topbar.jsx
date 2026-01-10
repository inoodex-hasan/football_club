import { Mail } from "lucide-react";
import React from "react";

const Topbar = () => {
  return (
    <div className="bg-blue py-4">
      <div className="container">
        {/* wrapper  */}
        <div className="flex justify-between items-center">
          <div>
            <span>
              <Mail />
            </span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Topbar;
