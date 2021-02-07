import React, { Component } from 'react'
import R_Card from "./cardUi_donuts"
import donutItem from "./donutData"
import "./styleCard.css";

const CardItem =donutItem.map((item) =>  
    <R_Card
         ordername={item.ordername}
         description={item.description}
         price={item.price}
         imgsrc={item.imgsrc}
    />
);

class R_Card_Donut extends Component {

    render() {
        return (
            <div className="m_cards_container">
               {CardItem}
        </div>
        );
    }
}
export default R_Card_Donut;