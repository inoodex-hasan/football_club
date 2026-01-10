import React from "react";

export default function FailCancel({ tran_id, status }) {
  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-red-100 p-6">
      <div className="bg-white rounded-lg shadow-md p-6 max-w-md text-center">
        <h1 className="text-2xl font-bold mb-4 text-red-700">
          {status === "fail" ? "Payment Failed" : "Payment Canceled"}
        </h1>
        <p className="mb-4">Transaction ID: {tran_id}</p>
        <p className="text-gray-700">
          {status === "fail"
            ? "Your transaction could not be completed. Please try again."
            : "You have canceled the payment."}
        </p>
      </div>
    </div>
  );
}
