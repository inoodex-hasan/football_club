function MapEmbed({ locationUrl }) {
    return (
        <div style={{ width: "100%", height: "400px" }}>
            {locationUrl ? (
                <iframe
                    src={locationUrl}
                    width="100%"
                    height="100%"
                    style={{ border: 0 }}
                    allowFullScreen=""
                    loading="lazy"
                    referrerPolicy="no-referrer-when-downgrade"
                    title="Location Map"
                ></iframe>
            ) : (
                <p>No map available</p>
            )}
        </div>
    );
}

export default MapEmbed;
