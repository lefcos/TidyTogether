async function guessInitialLocation() {
  return new Promise((resolve, reject) => {
    if (!navigator.geolocation) {
      alert("Geolocation not supported");
      return resolve({});
    }

    navigator.geolocation.getCurrentPosition(async (pos) => {
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

        resolve({
          address: data.display_name,
          city: city,
          country: addressData.country,
          neighbourhood: neighbourhood
        });
      } catch (err) {
        console.error(err);
        resolve({});
      }
    }, reject);
  });
}
