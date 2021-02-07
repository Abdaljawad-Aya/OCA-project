const mongoose = require("mongoose");
const config = require("config");

const db = config.get("mongoURI");
const connectDb = async () => {


  try {
    await mongoose.connect(db, {
      useNewUrlParser: true,
      useFindAndModify: true,
      useUnifiedTopology: true,
    });
    console.log("Mongodb is conncted");
  } catch (err) {
    console.error(err.message);
    process.exit(1); 
  }
};
module.exports = connectDb;
