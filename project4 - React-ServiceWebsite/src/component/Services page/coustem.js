import React, { Component } from 'react'
import './coustem.css'
import { Accordion, Card, Button } from 'react-bootstrap';


class Coustem extends Component {
    userData;

    state = {
        value: 0,
        location: 0,
        theme: 0,
        photographer: 0,

    };



    onChange = e => { this.setState({ [e.target.name]: e.target.value }) }

    // React Life Cycle
    componentDidMount() {
        this.userData = JSON.parse(sessionStorage.getItem('offers'));

        if (sessionStorage.getItem('offers')) {
            this.setState({
                value: this.userData.value,
                location: this.userData.location,
                theme: this.userData.theme,
                photographer: this.userData.photographer
            })
        } else {
            this.setState({
                value: 0,
                location: 0,
                theme: 0,
                photographer: 0
            })
        }
    }

    componentWillUpdate(nextProps, nextState) {
        sessionStorage.setItem('offers', JSON.stringify(nextState));
    }

    onSubmit(e) {
        e.preventDefault()
       
    }


    render() {
        const { value, location, theme, photographer } = this.state
        return (
            <div className='customization'>


                <div className='coustem-txt'>


                    <div className='coustem-form' >
                        <form onSubmit={this.onSubmit}>
                            <label for="theme">Choose photo session time:</label>
                            <br />
                            <select id="time" name="value" onChange={this.onChange}>
                                <option value="5">One hour</option>
                                <option value="10">Two hours</option>

                            </select>


                            <br />
                            <br />

                            <label for="theme">Choose the session location:</label>
                            <br />
                            <select id="location" name="location" onChange={this.onChange}>
                                <option value="15">Indoor</option>
                                <option value="20">Outdoor</option>

                            </select>
                            <br />
                            <br />

                            <label for="theme">Do you need photography accessories?</label>
                            <br />
                            <select id="them" name="theme" onChange={this.onChange}>
                                <option value="7">Yes</option>
                                <option value="0">No</option>

                            </select>

                            <br />
                            <br />

                            <label for="photographer">Choose the photographer:</label>
                            <br />

                            <select id="photographer" name="photographer" onChange={this.onChange}>
                                <option value="15">Ali Saadi</option>
                                <option value="20">Anas Al-Kurdi</option>
                                <option value="25">Linda Al-Khoury</option>
                                <option value="30">Omar Khyami</option>
                            </select>

                            <br />
                            <br />
                            <br />


                            <h5>The cost of your photo session is:({eval(value) + eval(location) + eval(theme) + eval(photographer)}) JOD</h5>
                           
                               
                         

                        </form>

                    </div>
                    <a href="/Booking">
                     <button className="btn1" >
                        Book now
                    </button>
                    </a>
                    {/* <h5>YOU CAN COUSTMIZE YOUR SESSION FROM <a onClick={() => this.setState({ shown: !this.state.shown })}>HRER</a></h5> */}
                </div>

                <br />



            </div>

        )
    }

}
export default Coustem




