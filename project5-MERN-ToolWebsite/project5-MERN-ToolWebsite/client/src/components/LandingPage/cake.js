import React, { useState } from "react";
import "./menu.css";
import Img0 from "../assets/cake1.jpeg";
import Img1 from "../assets/cake2.jpeg";
import Img2 from "../assets/cake3.jpeg";
import { Card, CardDeck, Button, Form } from "react-bootstrap"


export default function Cake() {
  return (
    <CardDeck className="R-menu-Container">
          <Card className="R-menu-Container-card">
            <Card.Img variant="top" src={Img0} className="R-menu-images" />
            <Card.Body>
              <Card.Title>Biscoff Cake</Card.Title>
               
              <Card.Text>
              A Three Layer Biscoff Drip Cake with Brown Sugar Sponges, Biscoff Buttercream, White Chocolate Ganache, and a Biscoff Drip!
                </Card.Text>
           
            </Card.Body>
                 
            <div className="innerContainer" >  
              <Form>
                <Form.Group className="R-number center" >
                  <Form.Label>Quantity:</Form.Label>
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
            <Button variant="primary">Buy</Button>
            {/* <Card.Footer>
              <small className="text-muted">Last updated 3 mins ago</small>
            </Card.Footer> */}
          </Card>
          
          <Card className="R-menu-Container-card">
            <Card.Img variant="top" src={Img1} className="R-menu-images" />
            <Card.Body>
              <Card.Title>Strawberry Cake</Card.Title>
               
              <Card.Text>
              This Classic Strawberry Cake  With A Silky Vanilla Buttercream. The Perfect Cake For Birthdays, Weddings, Or Any Occasion!
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
            <Card.Img variant="top" src={Img2} className="R-menu-images" />
            <Card.Body>
              <Card.Title>Chocolate Cake</Card.Title>
               
              <Card.Text>
              The Most Amazing Chocolate Cake is full of moist, chocolatey perfection. This is the chocolate cake you’ve been dreaming of!
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
