import React, { useState } from "react";
import { useForm } from "@inertiajs/react";

export default function Training({ training_package }) {
  // console.log(training_package);
  const [isOpen, setIsOpen] = useState(false);
  const [selectedTraining, setSelectedTraining] = useState(null);

  const { data, setData, post, processing, errors, reset } = useForm({
    package_id: "",
    name: "",
    email: "",
    phone: "",
    address: "",
    nid: "",
    age: "",
    image: null,
  });

  const openModal = (training) => {
    setSelectedTraining(training);
    setData({
      package_id: training.id,
      name: "",
      email: "",
      phone: "",
      address: "",
      nid: "",
      age: "",
      image: null,
    });
    setIsOpen(true);
  };

  const closeModal = () => {
    setIsOpen(false);
    setSelectedTraining(null);
    reset();
  };

  // COD (Pay on Delivery) – Inertia post দিয়ে internal route
  const handleCodPayment = () => {
    if (!data.name || !data.email || !data.phone || !data.address || !data.nid || !data.age) {
      alert("please fill all required fields");
      return;
    }

    post("/cod-order", {
      forceFormData: true,
      // onSuccess: () => {
      //   alert("অর্ডার সফলভাবে প্লেস হয়েছে!");
      //   closeModal();
      // },
      onError: (err) => console.log(err),
    });
  };

  // SSL Payment – normal form submit (CORS এড়ানোর জন্য)
  const handleSslPayment = () => {
    if (!data.name || !data.email || !data.phone || !data.address || !data.nid || !data.age) {
      alert("please fill all required fields");
      return;
    }

    const form = document.createElement("form");
    form.method = "POST";
    form.action = "/pay";
    form.enctype = "multipart/form-data"; 

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    if (csrfToken) {
      const csrfInput = document.createElement("input");
      csrfInput.type = "hidden";
      csrfInput.name = "_token";
      csrfInput.value = csrfToken;
      form.appendChild(csrfInput);
    }

    // Hidden fields for text data
    const textFields = {
      package_id: selectedTraining.id,
      name: data.name,
      email: data.email,
      phone: data.phone,
      address: data.address,
      nid: data.nid,
      age: data.age,
    };

    Object.keys(textFields).forEach((key) => {
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = key;
      input.value = textFields[key];
      form.appendChild(input);
    });

    // Image file input
    if (data.image) {
      const dt = new DataTransfer();
      dt.items.add(data.image);
      const fileInput = document.createElement("input");
      fileInput.type = "file";
      fileInput.name = "image";
      fileInput.files = dt.files;
      form.appendChild(fileInput);
    }

    document.body.appendChild(form);
    form.submit();
  };

  return (
    <div className="container mx-auto p-6">
      <h1 className="text-3xl font-bold mb-6">Training Programs</h1>

      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {training_package.map((training) => (
          <div
            key={training.id}
            className="bg-white shadow-md rounded-lg p-6 border border-gray-200 hover:shadow-xl transition duration-300"
          >
            <h2 className="text-xl font-semibold mb-2">{training.name}</h2>
            <div
              className="text-gray-600 mb-2"
              dangerouslySetInnerHTML={{ __html: training.description }}
            ></div>

            <p className="text-gray-700 font-medium">
              Duration: {training.duration}
            </p>
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
          <div className="bg-white rounded-lg p-6 w-full max-w-md overflow-y-auto max-h-[90vh]">
            <h2 className="text-lg font-bold mb-4">
              Purchase {selectedTraining?.name}
            </h2>

            <div className="space-y-4">
              {/* Text fields */}
              <div>
                <label className="block text-sm font-medium text-gray-700">Name</label>
                <input
                  type="text"
                  value={data.name}
                  onChange={(e) => setData("name", e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your name"
                />
                {errors.name && <span className="text-red-500 text-sm">{errors.name}</span>}
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700">Email</label>
                <input
                  type="email"
                  value={data.email}
                  onChange={(e) => setData("email", e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your email"
                />
                {errors.email && <span className="text-red-500 text-sm">{errors.email}</span>}
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700">Phone</label>
                <input
                  type="text"
                  value={data.phone}
                  onChange={(e) => setData("phone", e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your phone number"
                />
                {errors.phone && <span className="text-red-500 text-sm">{errors.phone}</span>}
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700">Address</label>
                <input
                  type="text"
                  value={data.address}
                  onChange={(e) => setData("address", e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your address"
                />
                {errors.address && <span className="text-red-500 text-sm">{errors.address}</span>}
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700">
                  NID / Birth Certificate Number
                </label>
                <input
                  type="text"
                  value={data.nid}
                  onChange={(e) => setData("nid", e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter NID or Birth Certificate number"
                />
                {errors.nid && <span className="text-red-500 text-sm">{errors.nid}</span>}
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700">Age</label>
                <input
                  type="number"
                  value={data.age}
                  onChange={(e) => setData("age", e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                  placeholder="Enter your age"
                />
                {errors.age && <span className="text-red-500 text-sm">{errors.age}</span>}
              </div>

              <div>
                <label className="block text-sm font-medium text-gray-700">Profile Image</label>
                <input
                  type="file"
                  accept="image/*"
                  onChange={(e) => setData("image", e.target.files[0] || null)}
                  className="mt-1 block w-full"
                />
                {errors.image && <span className="text-red-500 text-sm">{errors.image}</span>}
              </div>
            </div>

            <div className="mt-6 flex justify-end flex-wrap gap-2">
              <button
                onClick={closeModal}
                className="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
              >
                Cancel
              </button>

              {/* SSL Payment – normal form submit */}
              <button
                onClick={handleSslPayment}
                disabled={processing}
                className="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50"
              >
                Pay with SSL
              </button>

              {/* COD – Inertia post */}
              <button
                onClick={handleCodPayment}
                disabled={processing}
                className="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 disabled:opacity-50"
              >
                Pay on Delivery
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}