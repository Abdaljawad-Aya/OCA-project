import React from 'react';
// import React, { useState } from "react";
class CardGo extends React.Component {
  constructor(props) {
    super(props)

    this.state = {
      
    };
  }
  
  // const setData() {
    //   this.userData = JSON.parse(sessionStorage.getItem('user'))
    //   let data sessionStorage.getItem('user')) 
    render() {
      return ( 
      
      <div>  
        <div className="Photography">
          <div className="booked_photo_sessions_cards">
            <div>Location: {this.props.location}</div>
            <div>Date: {this.props.date}</div>
            <div>Time: {this.props.TimeOfSession}</div>
            <div>Photographer: {this.props.CameraMan}</div>
            <div>Theming: {this.props.theming}</div>
            <div>Price: {this.props.price}</div>
            <div>Duration: {this.props.duration}</div>
          </div>
        </div>
      </div>
    );
  }
}



export default CardGo;