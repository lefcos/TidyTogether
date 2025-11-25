<div id="reportModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Report a dirty area</h2>
    <form id="reportForm" method="POST" enctype="multipart/form-data">

      <!-- POST table -->
      <label for="description">Description:</label>
      <input type="text" id="description" name="postDescription">

      <label for="country">Country:</label>
      <input type="text" id="country" name="postCountry" required>
      <select id="countrySelect">
        <?php
          foreach (PublicCountries::get("public/countries+cities.json")
              as $country => $cities) {
            echo "<option value=\"" . $country . "\">" . $country . "</option>\n";
          }
        ?>
      </select>

      <label for="city">City:</label>
      <input type="text" id="city" name="postCity" required>
      <select>
        <script src="javascript/getCitiesFromCountry.js">
          const countrySelectTag = document.getElementById("countrySelect");
          countrySelectTag.addEventListener("change", () => {
            const cities = getCitiesFromCountry(countrySelectTag.value);
            cities.foreach(addCityOption);
          }
        </script>
      </select>

      <label for="neighbourhood">Neighbourhood:</label>
      <input type="text" id="neighbourhood" name="postNeighbourhood" required>

      <label for="address">Address:</label>
      <input type="text" id="address" name="postAddress" required>
  
      <label for="photo">Photo (optional):</label>
      <input type="file" id="photo" name="postPhoto[]" accept="image/jpg, image/png, image/webm, video/mp4" multiple>

      <div class="form-group">
        <label for="tags">Tags:</label>
        <p>Choose the tags that best describe the dirty area.</p>
      <div class="tag-container">
          <?php
          $index = 0;
          foreach ($tags as $tagOne) {
            if (10 === $index) {
              break;
            }
            echo "<label class=\"tag-option\">";
            
            echo "<input type=checkbox "
              . "id=\"" . $tagOne["name"] . "\" "
              . "name=\"postTag$index\""
              . "value=\""
              . $tagOne["id"] . "-"
              . $tagOne["name"] . "-"
              . $tagOne["color"] . "\">";
              
            echo $tagOne["name"];
            
            echo "</label>";
            
            $index += 1;
          }
          ?>
        </div>
        </div>

      <button type="submit">Submit post</button>
    </form>
  </div>
</div>

<script src="javascript/clientForm/guessInitialLocation.js"></script>
<script src="javascript/clientForm/openFormFetch.js"></script>