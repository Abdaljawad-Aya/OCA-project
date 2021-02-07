
import React, { useState } from "react";
import './menu.css'
import Img0 from "../assets/donut1.jpeg";
import Img1 from "../assets/donut2.jpeg";
import Img2 from "../assets/donut2.jpeg";
import { Card, CardDeck, Button, Form } from 'react-bootstrap';


export default function Donuts() {
    return (
  <CardDeck className="R-menu-Container">
        <Card className="R-menu-Container-card" >
          <Card.Img variant="top" src={Img0} className="R-menu-images" />
          <Card.Body>
            <Card.Title>Biscoff Lotus Donuts </Card.Title>
             
            <Card.Text>
            Freshly baked delectable doughnuts stuffed AND covered with Lotus Biscoff spread and finished with Biscoff crumbs and a cookie.
              </Card.Text>
          </Card.Body>
               
          <div className="innerContainer" >  
            <Form>
              <Form.Group className="R-number center" >
                <Form.Label>Quantity</Form.Label>
                <Form.Control
                  type="number"
                  placeholder="number"
                  min="1"
                  max="100"
                
                  className="ml-4"
                />
              </Form.Group>
            </Form>
            <Card.Text className="R-menu-Container-body"> Price : 10 JOD</Card.Text>
            </div>
          <Button variant="primary">Primary</Button>
          {/* <Card.Footer>
            <small className="text-muted">Last updated 3 mins ago</small>
          </Card.Footer> */}
        </Card>
        
        <Card className="R-menu-Container-card">
          <Card.Img variant="top" src={Img1} className="R-menu-images" />
          <Card.Body>
            <Card.Title>Strawberry Donuts</Card.Title>
             
            <Card.Text>
            Once you lay your hands on this delicious treat, you’re sure going to want more. So make yourself these delicious Strawberry
              </Card.Text>
         
          </Card.Body>
               
          <div className="innerContainer" >  
            <Form>
              <Form.Group className="R-number center" >
                <Form.Label>Quantity</Form.Label>
                <Form.Control
                  type="number"
                  placeholder="number"
                  min="1"
                  max="100"
                  value="1"
                  className="ml-4"
                />
              </Form.Group>
            </Form>
            <Card.Text className="R-menu-Container-body"> Price : 10 JOD</Card.Text>
            </div>
          <Button variant="primary">Primary</Button>
          {/* <Card.Footer>
            <small className="text-muted">Last updated 3 mins ago</small>
          </Card.Footer> */}
        </Card>
  
        <Card className="R-menu-Container-card">
          <Card.Img variant="top" src={Img2} className="R-menu-images" />
          <Card.Body>
            <Card.Title> Chocolate  Donuts</Card.Title>
             
            <Card.Text>
            Moist and fluffy donuts that are baked, not fried, and full of chocolate. Covered in a thick chocolate glaze, these are perfect for any chocoholic who wants a chocolate version of this classic treat.
              </Card.Text>
         
          </Card.Body>
               
          <div className="innerContainer" >  
            <Form>
              <Form.Group className="R-number center" >
                <Form.Label>Quantity</Form.Label>
                <Form.Control
                  type="number"
                  placeholder="number"
                  min="1"
                  max="100"
                  value="1"
                  className="ml-4"
                />
              </Form.Group>
            </Form>
            <Card.Text className="R-menu-Container-body"> Price : 10 JOD</Card.Text>
            </div>
          <Button variant="primary">Primary</Button>
          {/* <Card.Footer>
            <small className="text-muted">Last updated 3 mins ago</small>
          </Card.Footer> */}
        </Card>
        </CardDeck>
  );
}
