(function($) {
  $(document).ready(function() {
    $("#age-slider").slider({
      value: 0,
      min: 0,
      max: 12,
      step: 0.5,
      slide: function(event, ui) {
        $("#age").val(ui.value);
      }
    });
    $("#age").val($("#age-slider").slider("value"));

    $("#weight-slider").slider({
      value: 2,
      min: 2,
      max: 40,
      step: 0.5,
      slide: function(event, ui) {
        $("#weight").val(ui.value);
      }
    });
    $("#weight").val($("#weight-slider").slider("value"));

    $("#height-slider").slider({
      value: 40,
      min: 40,
      max: 160,
      step: 5,
      slide: function(event, ui) {
        $("#height").val(ui.value);
      }
    });
    $("#height").val($("#height-slider").slider("value"));

    $(".child-car-seat-selector .widget button").button();
    $(".child-car-seat-selector button").click(function(event) {
      event.preventDefault();

      var results = [{
          "url": "ccss_field_page_1",
          "age": {
            "min": 0,
            "max": 1.5
          },
          "weight": {
            "min": 0,
            "max": 15
          },
          "height": {
            "min": 40,
            "max": 84
          }
        },
        {
          "url": "ccss_field_page_2",
          "age": {
            "min": 1.5,
            "max": 3.5
          },
          "weight": {
            "min": 9,
            "max": 18
          },
          "height": {
            "min": 84,
            "max": 100
          }
        },
        {
          "url": "ccss_field_page_3",
          "age": {
            "min": 1.5,
            "max": 12
          },
          "weight": {
            "min": 15,
            "max": 36
          },
          "height": {
            "min": 100,
            "max": 125
          }
        },
        {
          "url": "ccss_field_page_4",
          "age": {
            "min": 4,
            "max": 12
          },
          "weight": {
            "min": 18,
            "max": 36
          },
          "height": {
            "min": 125,
            "max": 150
          }
        },
        {
          "url": "ccss_field_page_5",
          "age": {
            "min": 4,
            "max": 12
          },
          "weight": {
            "min": 18,
            "max": 36
          },
          "height": {
            "min": 140,
            "max": 150
          }
        },
        {
          "url": "ccss_field_page_6",
          "age": {
            "min": 4,
            "max": 12
          },
          "weight": {
            "min": 25,
            "max": 40
          },
          "height": {
            "min": 155,
            "max": 160
          }
        }
      ]

      var age = $("#age-slider").slider("value");
      var weight = $("#weight-slider").slider("value");
      var height = $("#height-slider").slider("value");

      var f_results = results.filter(function(r) {
        return (r.age.min <= age && r.age.max >= age) && (r.weight.min <= weight && r.weight.max >= weight) && (r.height.min <= height && r.height.max >= weight)
      });

      var url_key = "ccss_field_default_page";
      if (f_results.length > 0) {
        url_key = f_results.pop().url;
      }

      var url = $(".child-car-seat-selector").data("page-url-slugs")[url_key];

      window.location = "./" + url + "/";
    });

  });
})(jQuery);