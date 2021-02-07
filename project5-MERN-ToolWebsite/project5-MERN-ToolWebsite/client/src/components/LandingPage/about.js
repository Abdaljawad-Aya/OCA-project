import React from 'react';
import Img0 from '../assets/s.png';
import { Card } from 'react-bootstrap';
import './about.css'
import { Link } from "react-router-dom";

const About = () => {
  
  return (


  //   <Card  variant="right" className="R-aboutContainer" style={{ width: '40rem', margin:'0 auto'  , display:"flex" , flexDirection:"row"}}>
  // className="R-aboutContainer"  style={{ background: `url(${Img0})`  }}
  //  <Card>  
  // <Card.Img variant="right" src={Img0}   />
  // </Card>


 <Card className="R-aboutContainer"  >
  <Card.Body >
    <Card.Title> Sugar 🧁 </Card.Title>
    <Card.Subtitle className="mb-2 text-muted"> *THIS IS DEMO WEBSITE</Card.Subtitle>
    <Card.Text>
    Our development team made this Demo with love to inspire shop owners 
         to have online shop. 
            Online Shops can make huge value to the shop, which will impact on the revenue.
       So if you want to have your own high quality online shop   🧁 
    </Card.Text>
  
    <Card.Link href="/contact-us"> Contact Us NOW</Card.Link>
    {/* <Card.Link href="#">Another Link</Card.Link> */}
  </Card.Body>
</Card>


// </Card>


  );
};
export default About;


// <Card style={{ width: '18rem' }}>
//   <Card.Body>
//   {/* <Card.Img variant="right" src={Img0} style={{ width: '3rem'  , height:'3rem'}}/> */}
//     <Card.Title>Card Title</Card.Title>
//     <Card.Subtitle className="mb-2 text-muted">Card Subtitle</Card.Subtitle>
//     <Card.Text>
//       Some quick example text to build on the card title and make up the bulk of
//       the card's content.
//     </Card.Text>
//     <Card.Link href="#">Card Link</Card.Link>
//     <Card.Link href="#">Another Link</Card.Link>
//   </Card.Body>
// </Card>

6
// {/* <div>
//  <img  src ={Img0}/>
//   <h2>
//     Welcome to Sugar tool website
//   </h2>
//   <p>
//     lorem

//   </p>
// </div> */}

// {/* <div>
//  <img  src ={Img0}/>
//   <h2>
//     Welcome to Sugar tool website
//   </h2>
//   <p>
//     lorem

//   </p>
// </div> */}
// <div className="m_cardLanding_container">
  //     <div className="m_cardLanding_container_ch">

  //       <div className="m_cardLanding_image">
  //         <img src={Img0} alt="" />
  //       </div>

  //       <div className="m_cardLanding_des">
  //         <div className="m_cardLanding_title">
  //         Suger
  //         </div>

  //         <div className="m_cardLanding_subtitle">
  //         *THIS IS DEMO WEBSITE
  //         </div>

  //         <div className="m_cardLanding_description">
  //         Our development team made this Demo with love to inspire shop owners 
  //           to have online shop.
  //           Online Shops can make huge value to the shop, which will impact on the revenue.
  //         So if you want to have your own high quality online shop    
  //         <Link  to="/contact-us" >
  //      Contact Us NOW
  //      </Link>
  //       </div>


  //       </div>
        
  //   </div>
  //  </div> */



   
