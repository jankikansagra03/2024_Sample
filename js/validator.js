$(document).ready(function () {
  $.validator.addMethod(
    "fnregex",
    function (value, element) {
      reg12 = /^[a-zA-Z ]+$/;
      return reg12.test(value);
    },
    "Fullname must contain only letters"
  );

  $.validator.addMethod(
    "emregex",
    function (value, element) {
      reg12 = /^([\w-\.])+@([\w-]+\.)+[\w-]{2,4}$/;
      return reg12.test(value);
    },
    "Invalid Email Address"
  );

  $.validator.addMethod(
    "pwdregex",
    function (value, element) {
      regex =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
      return this.optional(element) || regex.test(value);
    },
    "Password must contain atleast one uppercase letter, one lowercase letter, one digit and a special character"
  );

  $.validator.addMethod(
    "mobregex",
    function (value, element) {
      regex = /^[0-9]{10}$/;
      return this.optional(element) || regex.test(value);
    },
    "Mobile number must contain exactly 10 digits"
  );

  $.validator.addMethod(
    "filesize",
    function (value, element, size) {
      var maxSize = size * 1024 * 1024;
      for (var i = 0; i < element.files.length; i++) {
        var fileSize = element.files[i].size;
        if (fileSize > maxSize) {
          return false;
        }
      }
      return true; // File size is within the maximum limit
    },
    "File size cannot exceed {0} MB."
  );

  $("#form1").validate({
    rules: {
      fn: {
        required: true,
        minlength: 2,
        maxlength: 35,
        fnregex: true,
      },
      email: {
        required: true,
        emregex: true,
      },
      pswd: {
        required: true,
        minlength: 8,
        maxlength: 20,
        pwdregex: true,
      },
      address: {
        required: true,
      },
      repswd: {
        required: true,
        equalTo: "#pwd",
      },
      pic: {
        required: true,
        accept: "image/jpeg,image/png,image/gif, image/webp",
        filesize: 2,
      },
      mobile: {
        required: true,
        mobregex: true,
      },
      gen: {
        required: true,
      },
      pic_updt: {
        accept: "image/jpeg,image/png,image/gif, image/webp",
        filesize: 2,
      },
      msg: {
        required: true,
      },
      pquantity: {
        required: true,
      },
      pprice: {
        required: true,
      },
      pdesc: {
        required: true,
      },
      pname: {
        required: true,
      },
      pcategory: {
        required: true,
      },
      p_main: {
        required: true,
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      e_main: {
        required: true,
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      "p_extra[]": {
        required: true,
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      "e_extra[]": {
        required: true,
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      p_main_updt: {
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      e_main_updt: {
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      "p_extra_updt[]": {
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      "e_extra_updt[]": {
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
      ed: {
        required: true,
      },
      et: {
        required: true,
      },
      edt: {
        required: true,
      },
      etype: {
        required: true,
      },
      ep: {
        required: true,
      },
      slider1: {
        required: true,
        accept: "image/jpeg,image/png,image/gif,image/webp",
        filesize: 2,
      },
    },
    messages: {
      fn: {
        required: "Fullname is a required field",
        minlength: "Fullname must contain atleast 2 characters",
        maxlength: "fullname cannot be greater than 35 characters",
      },
      email: {
        required: "Email address is a required filed",
      },
      pswd: {
        required: "Password is a required Field",
        minlength: "Password must contain at least 8 characters",
        maxlength: "Password must not be more than 20 characters",
      },
      address: {
        required: "Enter your address",
      },
      repswd: {
        required: "Confirm password cannot be empty",
        equalTo: "Password and confirm password must be same",
      },
      pic: {
        required: "Please select a file to upload",
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 10KB",
      },
      mobile: {
        required: "Mobile number cannot be empty",
      },
      gen: {
        required: "Please select your gender",
      },
      pic_updt: {
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      msg: {
        required: "Message filed cannot be Empty",
      },
      pquantity: {
        required: "Product Quantity cant be empty",
      },
      pprice: {
        required: "Product Price cannot be empty",
      },
      pdesc: {
        required: "Product Description cannot be empty",
      },
      pname: {
        required: "Product Name cannot be empty",
      },
      pcategory: {
        required: "Select a Product Category",
      },
      e_main: {
        required: "Event thumbnail image cannot be empty",
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      p_main: {
        required: "Select Thubnail image for the product",
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      "p_extra[]": {
        required: "Select atleast one extra image file",
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      "e_extra[]": {
        required: "Select atleast one extra image file",
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      e_main_updt: {
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      p_main_updt: {
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      "p_extra_updt[]": {
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      "e_extra_updt[]": {
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
      ed: {
        required: "Event Description cannot be empty",
      },
      et: {
        required: "Event Type cannot be empty",
      },
      edt: {
        required: "Event Date cannot be empty",
      },
      etype: {
        required: "Event Type cannot be empty",
      },
      ep: {
        required: "Event Place cannot be empty",
      },
      slider1: {
        required: "Select  a file to upload",
        accept: "only imge file with extension jpg,png and gif are allowed",
        filesize: "File size must not be greater than 2MB",
      },
    },
    errorPlacment: function (error, element) {
      if (element.attr("name") == "fn") {
        $("#fn_err").html(error);
      }
      if (element.attr("name") == "email") {
        $("#em_err").html(error);
      }
      if (element.attr("name") == "pswd") {
        $("#pswd_err").html(error);
      }
      if (element.attr("name") == "repswd") {
        $("#repswd_err").html(error);
      }
      if (element.attr("name") == "pic") {
        $("#file1_err").html(error);
      }
      if (element.attr("name") == "gen") {
        $("#gen_err").html(error);
      }
      if (element.attr("name") == "mobile") {
        $("#mobile_err").html(error);
      }
      if (element.attr("name") == "pic_updt") {
        $("#file1_updt_err").html(error);
      }
      if (element.attr("name") == "msg") {
        $("#msg1_err").html(error);
      }
      if (element.attr("name") == "address") {
        $("#address_err").html(error);
      }
      if (element.attr("name") == "e_main") {
        $("#e_main_err").html(error);
      }
      if (element.attr("name") == "p_main") {
        $("#p_main_err").html(error);
      }
      if (element.attr("name") == "e_extra[]") {
        $("#e_extra_err").html(error);
      }
      if (element.attr("name") == "p_extra[]") {
        $("#p_extra_err").html(error);
      }
      if (element.attr("name") == "e_main_updt") {
        $("#e_main_err").html(error);
      }
      if (element.attr("name") == "p_main_updt") {
        $("#p_main_err_updt").html(error);
      }
      if (element.attr("name") == "e_extra_updt[]") {
        $("#e_extra_err_updt").html(error);
      }
      if (element.attr("name") == "p_extra_updt[]") {
        $("#p_extra_err_updt").html(error);
      }
      if (element.attr("name") == "ed") {
        $("#ed_err").html(error);
      }
      if (element.attr("name") == "ep") {
        $("#ep_err").html(error);
      }
      if (element.attr("name") == "et") {
        $("#et_err").html(error);
      }
      if (element.attr("name") == "edt") {
        $("#edt_err").html(error);
      }
      if (element.attr("name") == "etype") {
        $("#etype_err").html(error);
      }
      if (element.attr("name") == "pname") {
        $("#pname_err").html(error);
      }
      if (element.attr("name") == "pcategory") {
        $("#pcategory_err").html(error);
      }
      if (element.attr("name") == "pprice") {
        $("#pprice_err").html(error);
      }
      if (element.attr("name") == "pdesc") {
        $("#pdesc_err").html(error);
      }
      if (element.attr("name") == "pquantity") {
        $("#pqunatity_err").html(error);
      }
      if (element.attr("name") == "slider1") {
        $("#slider1_err").html(error);
      }
    },
  });
});
