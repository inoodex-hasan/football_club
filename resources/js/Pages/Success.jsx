import React from "react";

export default function Success({ tran_id }) {
  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-green-100 p-6">
      <div className="bg-white rounded-lg shadow-md p-6 max-w-md text-center">
        <h1 className="text-2xl font-bold mb-4 text-green-700">
          Payment Successful
        </h1>
        <p className="mb-4">Transaction ID: {tran_id}</p>
        <p className="text-gray-700">
          Your payment has been completed successfully. Thank you!
        </p>
      </div>
    </div>
  );
}
