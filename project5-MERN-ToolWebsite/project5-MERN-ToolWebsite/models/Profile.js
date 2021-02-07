const mongoose = require("mongoose");
const Schema = mongoose.Schema;

// create schema
const ProfileSchema = new Schema({
  user: {
    type: Schema.Types.ObjectId,
    ref: "users"
  },
  imgUrl: {
    type: String
  },
  handle: {
    type: String,
    required: true,
    max: 40
  },

  bio: {
    type: String
  }, 
  date: {
    type: Date,
    default: Date.now
  }
});

module.exports = Profile = mongoose.model("profile", ProfileSchema);
