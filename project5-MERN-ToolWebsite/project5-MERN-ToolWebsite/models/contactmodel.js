const mongoose =require("mongoose");


const contactSchema = new mongoose.Schema({
    name :{
      type:String
    },
    cname:{
      type:String,
    },
    email:{
      type:String
    },
    phonenumber:{
      type:Number
    },
    message:{
      type:String
    }
})

const Contact = mongoose.model("Contact",contactSchema)
module.exports = Contact;