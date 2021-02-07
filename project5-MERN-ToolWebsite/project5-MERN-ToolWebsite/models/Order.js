const mongoose = require("mongoose");


const OrderSchema = new mongoose.Schema({

  username: {
    type: String,
    required: true,
  },
  ordername: {
    type: String,
    required: true,
  },
  description: {
    type: String,
    required: true,
  },
  price: {
    type: String,
    required: true,
  },
  quantity: {
    type: String,
    required: true,
  },
  addons: {
    type: String,
  },
  imgsrc: {
    type: String,
  },
});
module.exports = Order = mongoose.model("order", OrderSchema);
