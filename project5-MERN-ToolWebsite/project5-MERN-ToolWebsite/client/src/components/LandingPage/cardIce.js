import React, { Component } from 'react'
import R_Card from "./cardUi_Cake"
import iceItem from "./iceData"
import donutItem from "./donutData"
import cakeItem from "./cakeData"
import "./styleCard.css";
import { Card, CardDeck, Button, Form } from "react-bootstrap";
// import './menu.css'

const CardItem =iceItem.map((item) =>
    <R_Card
         ordername={item.ordername}
         description={item.description}
         price={item.price}
         imgsrc={item.imgsrc}
    />
);

class R_Card_Ice extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }
    render() {
        return (
            <div className="m_card_m">
               {CardItem}
        </div>
        );
    }
}
export default R_Card_Ice;