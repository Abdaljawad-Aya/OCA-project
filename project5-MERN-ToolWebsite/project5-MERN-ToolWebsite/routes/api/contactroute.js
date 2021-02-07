const express = require("express");
const router = express.Router();
const Contact = require("../../models/contactmodel");

router.get("/", (req, res) => {
   res.json("lubna Route");  
 });


router.post("/create", async (req, res) => {
   const { name ,
      cname ,
      email , 
      phonenumber ,
      message } = req.body;

   try{
   const contact = await Contact.create({
      name ,
      cname ,
      email , 
      phonenumber ,
      message 
   });
 
   if(contact){
     res.status(200).json({
      name : contact.name ,
      cname : contact.cname,
      email  : contact.email, 
      phonenumber : contact.phonenumber ,
      message : contact.message
     })
   }else {
     res.status(400)
     res.send('something went wrong')
   }
 } catch (error){
   res.send(error)
 }
 //  newOrder.save( (err) =>{ if(err){
 //    res.send(" error ")
 //  }} ) ;
 //  res.send(" data save")
 });
 
 //Get the Order According to the username

 module.exports = router;
 


 
// router.post("/create", async (req,res)=>{
//    const name= req.body.name;
//    const cname= req.body.cname;
//    const email= req.body.email;
//    const phonenumber= req.body.phonenumber;
//    const message= req.body.message;

//    try{
//    const newContact= new Contact({
//     name,
//     cname,
//     email,
//     phonenumber,
//     message
//    })
//    newContact.save();
// })
// module.exports = router;