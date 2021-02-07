
import { Carousel, Container } from 'react-bootstrap'; 
import React ,{useState}from 'react'

import sa11 from '../images/11.jpg'
import sa13 from '../images/13.jpg'
import sa14 from '../images/14.jpg'

import "./slider.css"


function ControlledCarousel() {
    const [index, setIndex] = useState(0);
  
    const handleSelect = (selectedIndex, e) => {
      setIndex(selectedIndex);
    };
  
    return (

        <div>
          <Container fluid>


      <Carousel  activeIndex={index} onSelect={handleSelect}>
        <Carousel.Item>
          <img
            className="d-block w-100"
            src="https://images.unsplash.com/photo-1462536943532-57a629f6cc60?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NXx8fGVufDB8fHw%3D&w=1000&q=80"
            alt="First slide"
            height='100%'
            />
          <Carousel.Caption>
            {/* <h3>First slide label</h3>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> */}
          </Carousel.Caption>
        </Carousel.Item>
        <Carousel.Item>
          <img
            className="d-block w-100"
            src={sa14}
            alt="Second slide"
            height="100%"

            
            
            />
  
          <Carousel.Caption>
            {/* <h3>Second slide label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> */}
          </Carousel.Caption>
        </Carousel.Item>
        <Carousel.Item>
          <img
            className="d-block w-100"
            src="https://i.pinimg.com/originals/72/0e/03/720e03f737dbd9e51a361e9505cf3fb1.jpg"
            alt="Third slide"
            height='100%'
            />
  
          <Carousel.Caption>
            {/* <h3>Third slide label</h3>
            <p>
            Praesent commodo cursus magna, vel scelerisque nisl consectetur.
          </p> */}
          </Carousel.Caption>
        </Carousel.Item>
      </Carousel>
          </Container>
      </div>
    );
  }
  export default ControlledCarousel 
//   render(<ControlledCarousel />);