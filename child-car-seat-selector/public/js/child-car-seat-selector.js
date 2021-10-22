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

    $(".widget button").button();
    $("button").click(function(event) {
      event.preventDefault();

      var results = [{
          "url": "bebeshki-stol",
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
          "url": "stolche-za-malki-deca-obarnato-nazad",
          "age": {
            "min": 1.5,
            "max": 12
          },
          "weight": {
            "min": 0,
            "max": 18
          },
          "height": {
            "min": 84,
            "max": 105
          }
        },
        {
          "url": "stolche-za-malki-deca-obarnato-nazad",
          "age": {
            "min": 1.5,
            "max": 12
          },
          "weight": {
            "min": 0,
            "max": 13
          },
          "height": {
            "min": 105,
            "max": 125
          }
        },
        {
          "url": "stolche-za-malki-deca-ili-dopalnitelna-sedalka",
          "age": {
            "min": 1.5,
            "max": 12
          },
          "weight": {
            "min": 13,
            "max": 25
          },
          "height": {
            "min": 105,
            "max": 125
          }
        },
        {
          "url": "stol-za-kolani",
          "age": {
            "min": 1.5,
            "max": 12
          },
          "weight": {
            "min": 25,
            "max": 36
          },
          "height": {
            "min": 105,
            "max": 125
          }
        },
        {
          "url": "stol-za-kolani",
          "age": {
            "min": 1.5,
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
        }
      ]

      var age = $("#age-slider").slider("value");
      var weight = $("#weight-slider").slider("value");
      var height = $("#height-slider").slider("value");

      var f_results = results.filter(function(r) {
        return (r.age.min <= age && r.age.max >= age) && (r.weight.min <= weight && r.weight.max >= weight) && (r.height.min <= height && r.height.max >= weight)
      });

      var url = "svarjete-se-s-nas";
      if (f_results.length > 0) {
        url = f_results.pop().url;
      }

      //window.location = "./" + url + "/index.html";
      window.location = "./" + url + "/";
    });

  });
})(jQuery);