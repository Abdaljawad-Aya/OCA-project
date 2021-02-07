import React, { Component } from 'react'
import './galary.css'



class Galery extends Component {

     constructor(props) {
    super(props);

    // this.state = {
    //   data: parseInt(this.props.id),
    // };
  }
 
    render() {
        return (

            <div className="mainCard">
                <div className='imgCard'>
                    <img src={this.props.img} width="150vw" height="150vh" alt={this.props.id+ "card picture"} />

                    <div className="CardContent">
                        <p><b>

                            {this.props.title}
                        </b>
                        <br/>
                        
                            {this.props.content}
                        </p>

                        <p className='somthing'>

                            THE COST: <i><b>{this.props.cost}</b></i>
                        </p><a href="/Booking">
                            <button  onClick={() => {
                                  ;
                                  
                                if ((JSON.parse(sessionStorage.getItem('offers1')))) {                                    
                                    sessionStorage.setItem("offers1", JSON.stringify([...[(JSON.parse(sessionStorage.getItem('offers1')))].flat(Infinity), this.props.offer]));
                                } else {
                                    sessionStorage.setItem("offers1", JSON.stringify([this.props.offer]));                                    
                                }
                            }} >book now </button>
                            </a>
                            </div>
                            </div>
                            
                            </div>
                            )
                        }

                    }
export default Galery

//      </p><a href="">




