const Validator = require("validator");
const isEmpty = require("./is-empty");

module.exports = function validateProfileInput(data) {
  let errors = {};

  data.handle = !isEmpty(data.handle) ? data.handle : "";


  if (!Validator.isLength(data.handle, { min: 2, max: 30 })) {
    errors.handle = "Handle needs to be between 2 and 30 characters";
  }

  if (Validator.isEmpty(data.handle)) {
    errors.handle = "Company Name is required";
  }

  if (!isEmpty(data.website)) {
    if (!Validator.isURL(data.website)) {
      errors.website = "Not a valid URL";
    }
  }
 
  return {
    errors,
    isValid: isEmpty(errors)
  };
};
