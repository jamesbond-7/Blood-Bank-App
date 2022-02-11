// Register

function isNumberKey(evt) {
  var charCode = evt.which ? evt.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
  return true;
}

$(document).ready(function() {
  var max_fields = 50; //maximum input boxes allowed
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e) {
    //on add input button click
    e.preventDefault();
    if (x < max_fields) {
      //max input box allowed
      //text box increment
      $(wrapper).append(
        '<br><div><a href="#" class="remove_field btn btn-danger pull-right">Remove</a><label for="inputBloodGroup" class="sr-only">Blood Group ' +
          "" +
          '</label><input type="text" id="inputBloodGroup" name="' +
          "blood_group" +
          x +
          '" class="form-control" placeholder="Blood Group"/><a href="#" class="remove_field btn btn-danger pull-right">Remove</a><label for="inputTransBag" class="sr-only">Number Of Transfusion Bags ' +
          "" +
          '</label><input type="text" id="inputTrasBag" name="' +
          "num_trans_bag" +
          x +
          '" class="form-control" onkeypress="return isNumberKey(event)" placeholder="Number Of Transfusion Bag"/></div>'
      );
      x++;
    }
  });

  $(wrapper).on("click", ".remove_field", function(e) {
    //user click on remove text
    e.preventDefault();
    $(this)
      .parent("div")
      .remove();
    x--;
  });
});
