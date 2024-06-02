document.getElementById("province").addEventListener("change", function () {
  var selectedProvinceCode = this.value;
  var citySelect = document.getElementById("city");
  citySelect.removeAttribute("style");
  citySelect.removeAttribute("disabled");
  for (var i = 0; i < citySelect.options.length; i++) {
    var option = citySelect.options[i];
    if (
      option.value !== "" &&
      option.getAttribute("data-province") !== selectedProvinceCode
    ) {
      option.style.display = "none";
    } else {
      option.style.display = "";
    }
  }
  var defaultCityCode = citySelect.querySelector(
    'option[data-province="' + selectedProvinceCode + '"]'
  ).value;
  citySelect.value = defaultCityCode;
});

document.getElementById("city").addEventListener("change", function () {
  var selectedCityCode = this.value;
  var districtSelect = document.getElementById("district");
  districtSelect.removeAttribute("style");
  districtSelect.removeAttribute("disabled");
  for (var i = 0; i < districtSelect.options.length; i++) {
    var option = districtSelect.options[i];
    if (
    option.value !== "" &&
      option.getAttribute("data-city") !== selectedCityCode
    ) {
      option.style.display = "none";
    } else {
      option.style.display = "";
    }
  }
  var defaultDistrictCode = districtSelect.querySelector(
    'option[data-city="' + selectedCityCode + '"]'
  ).value;
  districtSelect.value = defaultDistrictCode;
});