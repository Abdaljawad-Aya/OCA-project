import React, {Component} from 'react';
import {Modal} from 'react-bootstrap';
import './Booking.css'

export class AddMsg extends Component{
    constructor(props){
        super(props); 
    }
    render(){
        return(
            <Modal
            {...this.props}
            size="lg"
            aria-labelledby="contained-modal-title-vcenter"
            centered
          >
            <Modal.Body>
                <div className="Msg">
                    <h2>Thank You For Your Submission</h2>
          <h4>You will get an email with further instructions.</h4>
              </div>
            </Modal.Body>
            <Modal.Footer>
            <button className="Button-Close" onClick={this.props.onHide}>Close</button>
            </Modal.Footer>
          </Modal>
       
        );
    }
}