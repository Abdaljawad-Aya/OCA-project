import React, { Component } from 'react'
import R_Card from "./cardUi_Ice"
import iceItem from "./iceData"
import donutItem from "./donutData"
import cakeItem from "./cakeData"
import { Card, CardDeck, Button, Form } from "react-bootstrap";
import "./styleCard.css";

const CardItem =cakeItem.map((item) =>  
    <R_Card
         ordername={item.ordername}
         description={item.description}
         price={item.price}
         imgsrc={item.imgsrc}
    />
);

class R_Card_Cake extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }
    render() {
        return (
            <div className="m_cards_container">
               {CardItem}
        </div>
        );
    }
}
export default R_Card_Cake;