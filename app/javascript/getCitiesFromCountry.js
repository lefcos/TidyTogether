/**
 * Reads the json file.
 * The same thing as `app/util/publicConnections` but client-sided.
 */
async function loadCountryCityMap(jsonFilePath) {
  try {
    const response = await fetch(jsonFilePath);
    if (!response.ok) {
      throw new Error(`Failed to load file: ${response.status}`);
    }

    const countryToCities = new Map();

    const countries = await response.json();
    for (const entry of countries) {
      const country = entry.name;
      const uniqueCities = [...new Set(entry.cities)];
      countryToCities.set(country, uniqueCities);
    }
    return countryToCities;

  } catch (error) {
    console.error("Error loading country/city data:", error);
    return new Map();
  }
}

/**
 * Store the promise globally.
 * Doing so rereading the same json again is prevented (on the user's machine ).
 */
const countryCityMapPromise =
  loadCountryCityMap("public/countries+cities.json");

/**
 * Callback function used for printing the potential cities a user could select.
 * 
 * Awaiting the same promise the second is instant.
 */
async function getCitiesFromCountry(country) {
  const map = await countryCityMapPromise;
  return map.get(country) ?? [];
}
