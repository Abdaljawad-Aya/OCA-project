import React from 'react'
import './styles/whatwedo.css'
import Img1 from './image/1 (1).jpeg'
import Img2 from './image/2.jpeg'
import Img3 from './image/3.jpg'
export default function Whatwedo() {
    return (
    
    <section className="A-why-us">
    <div className="container">
      <div className="row">
        <div className="col-md-8 offset-md-2">
          <h2 className="mt-5 text-center">Why Choose Us ?</h2>
          <p className="mb-5 text-center"> Welcome to Sugar Shop! We Bake only the best Cakes You’re here because you’re thinking about trying out delicious Cakes. We know how important it is to you because for you kids to have fun too we have a playground. We’re here to print a smile on your face</p>
        </div>
      </div>
      <div className="row">
        <div className="col-sm-6 col-lg-4">
          <div className="box">
            {/* <span>01</span> */}
            <h4><a href="">Why Sugar Shop</a></h4>
            <p>Because we have the best sweets in the town and we do have great offers! </p>
            <img src={Img1} alt="Suger Demo Website" />
          </div>
        </div>
        <div className="col-sm-6 col-lg-4">
          <div className="box">
            {/* <span>02</span> */}
            <h4><a href="">What we provide</a></h4>
            <p>We provide all types of cakes, ice cream and donuts</p>
            <img src={Img2} alt="Suger Demo Website" />
          </div>
        </div>
        <div className="col-sm-6 col-lg-4">
          <div className="box">
            {/* <span>03</span> */}
            <h4><a href="">Free Cake</a></h4>
            <p>Just for limited time buy one cake and you get one for free!</p>
            <img src={Img3} alt="Suger Demo Website" />
          </div>
        </div>
      </div>
    </div>
  </section>
    
  );
}