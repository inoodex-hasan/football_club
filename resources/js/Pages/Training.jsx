import React, { useState } from "react";

export default function Training({ trainings }) {
  const [isOpen, setIsOpen] = useState(false);
  const [selectedTraining, setSelectedTraining] = useState(null);
  const [userName, setUserName] = useState("");
  const [userEmail, setUserEmail] = useState("");
  const [userPhone, setUserPhone] = useState("");
  const [userAddress, setUserAddress] = useState("");

  const openModal = (training) => {
    setSelectedTraining(training);
    setIsOpen(true);
  };

  const closeModal = () => {
    setIsOpen(false);
    setSelectedTraining(null);
    setUserName("");
    setUserEmail("");
    setUserPhone("");
    setUserAddress("");
  };

  const handlePurchase = () => {
    if (!userName || !userEmail || !userPhone || !userAddress) {
      alert("Please fill all fields");
      return;
    }

    // CSRF token
    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = tokenMeta ? tokenMeta.getAttribute('content') : null;
    if (!csrfToken) {
      alert("CSRF token not found! Make sure meta tag exists in HTML head.");
      return;
    }

    // Form creation
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "/pay"; // Laravel route
    form.target = "_self";

    // CSRF input
    const tokenInput = document.createElement("input");
    tokenInput.type = "hidden";
    tokenInput.name = "_token";
    tokenInput.value = csrfToken;
    form.appendChild(tokenInput);

    // Training + user info
    [
      ["package_id", selectedTraining.id],
      ["name", userName],
      ["email", userEmail],
      ["phone", userPhone],
      ["address", userAddress],
    ].forEach(([name, value]) => {
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = name;
      input.value = value;
      form.appendChild(input);
    });

    document.body.appendChild(form);
    form.submit();
  };

  return (
    <div className="container mx-auto p-6">
      <h1 className="text-3xl font-bold mb-6">Training Programs</h1>

      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {trainings.map((training) => (
          <div
            key={training.id}
            className="bg-white shadow-md rounded-lg p-6 border border-gray-200 hover:shadow-xl transition duration-300"
          >
            <h2 className="text-xl font-semibold mb-2">{training.name}</h2>
            <div
              className="text-gray-600 mb-2"
              dangerouslySetInnerHTML={{ __html: training.description }}
            ></div>

            <p className="text-gray-700 font-medium">Duration: {training.duration}</p>
            <p className="text-gray-700 font-medium">Price: ${training.price}</p>
            <p
              className={`mt-2 font-semibold ${
                training.status ? "text-green-600" : "text-red-600"
              }`}
            >
              {training.status ? "Active" : "Inactive"}
            </p>
            <p className="text-gray-400 text-sm mt-2">
              Created: {new Date(training.created_at).toLocaleDateString()}
            </p>

            <button
              onClick={() => openModal(training)}
              className="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
            >
              Purchase
            </button>
          </div>
        ))}
      </div>

      {/* Modal */}
      {isOpen && (
        <div className="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 p-4">
          <div className="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 className="text-lg font-bold mb-4">
              Purchase {selectedTraining?.name}
            </h2>

            <div className="space-y-4">
              {/* Name */}
              <div>
                <label className="block text-sm font-medium text-gray-700">Name</label>
                <input
                  type="text"
                  value={userName}
                  onChange={(e) => setUserName(e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your name"
                />
              </div>

              {/* Email */}
              <div>
                <label className="block text-sm font-medium text-gray-700">Email</label>
                <input
                  type="email"
                  value={userEmail}
                  onChange={(e) => setUserEmail(e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your email"
                />
              </div>

              {/* Phone */}
              <div>
                <label className="block text-sm font-medium text-gray-700">Phone</label>
                <input
                  type="text"
                  value={userPhone}
                  onChange={(e) => setUserPhone(e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your phone number"
                />
              </div>

              {/* Address */}
              <div>
                <label className="block text-sm font-medium text-gray-700">Address</label>
                <input
                  type="text"
                  value={userAddress}
                  onChange={(e) => setUserAddress(e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your address"
                />
              </div>
            </div>

            <div className="mt-6 flex justify-end space-x-2">
              <button
                onClick={closeModal}
                className="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
              >
                Cancel
              </button>
              <button
                onClick={handlePurchase}
                className="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
              >
                Proceed to Checkout
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}
