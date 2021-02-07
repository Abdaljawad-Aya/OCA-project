
const router = require("express").Router();
const Order = require("../../models/Order");


router.get("/", (req, res) => {
  res.json("Order Route");
  
});


router.post("/add", async (req, res) => {
  const { username, ordername, description, price , quantity, addons,imgsrc } = req.body;
//  const newOrder = new Order(req.body)
  const newOrder = {
    
  }
  try{
  const order = await Order.create({
    username, 
    ordername,
     description, 
     price , 
     quantity,
    addons ,
    imgsrc
  });

  if(order){
    res.status(200).json({
      _id: order._id,
      username: order.username, 
      ordername: order.ordername,
     description: order.description, 
     price: order.price , 
     quantity: order.quantity,
    addons: order.addons ,
    imgsrc:order.imgsrc,
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
router.get("/:username", (req, res) => {
  Order.find({ username: req.params.username })
    .then((orders) => res.json(orders))
    .catch((err) => res.status("400").json(`Error: ${err}`));
});
module.exports = router;
