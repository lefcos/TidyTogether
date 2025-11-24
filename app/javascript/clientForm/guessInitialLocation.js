async function guessInitialLocation() {
  if (!navigator.geolocation) {
    alert("Geolocation is not supported by your browser.");
    return;
  }

  navigator.geolocation.getCurrentPosition(async function (pos) {
    const { latitude, longitude } = pos.coords;

    try {
      const response = await fetch(
        `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`
      );
      const data = await response.json();

      const addressData = data.address;

      const city =
        addressData.city ??
        addressData.town ??
        addressData.village;

      const neighbourhood =
        addressData.neighbourhood ??
        addressData.suburb ??
        addressData.village ??
        addressData.city;

      return {
        address: data.display_name,
        city: city,
        country: addressData.country,
        neighbourhood: neighbourhood
      }

    } catch (error) {
      console.error("Error fetching location data:", error);
    }

    return {};
  });
};