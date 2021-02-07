import React, { Component,useState } from "react";
import DatePicker from "react-datepicker";
import './Booking.css'
import "react-datepicker/dist/react-datepicker.css";
import {AddMsg} from './AddMsg';
import {Button, ButtonToolbar} from 'react-bootstrap';

class Booking extends Component {
    userData;

    constructor(props) {
        super(props);

        // this.onChangeDate = this.onChangeDate.bind(this);
        this.onChangeTime = this.onChangeTime.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
        this.state = {
            selectedDate: '',
            time: '',
            isSubmit: false, 
        }
    }


    //Form events
    // onChangeDate (e) {
    //     this.setState ({date: e.target.value})
    // }
    onChangeTime (e) {
        this.setState ({time: e.target.value})
    }

          //React lifecycle
          componentDidMount() {
          this.userData = JSON.parse(sessionStorage.getItem('date')); 
        
        if (sessionStorage.getItem('date')) {
            this.setState({
                date: this.userData.date,
                time: this.userData.time
            })
        } else {
            this.setState({
                date: '',
                time: '10'
            })
        }
    }
    componentWillUpdate(nextProps, nextState) {
        // sessionStorage.setItem('date', JSON.stringify(nextState));
        let a=JSON.parse(sessionStorage.getItem('offers1'))
        let b = a.slice(-1)[0]
        a.pop()
        b["SessionDate"] = this.state.selectedDate;
        b["time"] = this.state.time;
        a.push(b)
        sessionStorage.setItem("offers1", JSON.stringify(a));
    }

    onSubmit(e) {

        e.preventDefault();
        
        console.log(this.state.props)
    }

render(){
    document.title ="DAMSA | Booking Page"; 
    document.getElementsByTagName("META")[2].content="Damsa is a website for booking photography sessions anywhere and anytime with a very easy to use and simple booking form";
    let Close =() => this.setState({ isSubmit:false});
    return(
        <div className="booking_form_container">
            <h1 className="intro_title"> Booking Form</h1>
            <div className="form_wrapper">
            <div className="form_container">
                <div className="title_container">
                <h2>Book your photoshoot</h2>
                <h3>Book an appointment by filling out this fields, choose the date and time that suit for you, and we will call you soon! </h3>
                </div>
                <form onSubmit={this.onSubmit}>
                <div className="row clearfix">
                    <div className="col_half">
                    <label>Date:</label>
                    <div className="input_field"> 
                        {/* <input type="date" name="date" placeholder="Choose the date" value={this.state.date} onChange={this.onChangeDate} required /> */}
                        <DatePicker 
                        selected={this.state.selectedDate} 
                        onChange={date => {
                            this.setState({selectedDate:date})
                        }}
                        dateFormat='dd/MM/yyyy'
                        minDate={new Date()}
                        // filterDate={date => date.getDay() != 6 && date.getDay() != 0}
                        isClearable
                        />

                    </div>
                    </div>
                    <div className="col_half">
                    <label>Time:</label>
                    <div className="input_field"> 
                    <select id="time" name="time" onChange={this.onChangeTime}  required>
                                    <option value="10 AM">10 AM</option>
                                    <option value="12 PM">12 AM</option>
                                    <option value="2 PM">2 PM</option>
                                    <option value="2 PM">4 PM</option>
                                    <option value="6 PM">6 PM </option>
                                    <option value="8 PM">8 PM</option>
                    </select>
                        {/* <input type="time" name="time" placeholder="Choose the time" value={this.state.time} onChange={this.onChangeTime} required  /> */}
                    </div>
                    </div>
                </div>
                
                <ButtonToolbar>
                <Button className="Button-Submit" onClick={()=> (this.state.selectedDate && this.setState({isSubmit: true }))}> Submit </Button>
                <AddMsg show={this.state.isSubmit}
                onHide = {Close} />
            </ButtonToolbar>
                </form>
            </div> 
            </div>
        </div>
    )}}

    // function Date_Picker() {
    //     const [selectedDate, setSelectedDate]=useState(null)
    //     return (
    //       <div>
            
    //       </div>
    //     );
    //   }
 


export default Booking


// import React, { Component,useState } from "react";
// import DatePicker from "react-datepicker";

// import './Booking.css'
// import "react-datepicker/dist/react-datepicker.css";

// import {AddMsg} from './AddMsg';
// import {Button, ButtonToolbar} from 'react-bootstrap';

// var ahmad 
// var dana 
// class Booking extends Component {
//     userData;

//     constructor(props) {
//         super(props);

//         // this.onChangeDate = this.onChangeDate.bind(this);
//         this.onChangeTime = this.onChangeTime.bind(this);
//         this.onSubmit = this.onSubmit.bind(this);
//         this.state = {
//            SessionDate:new Date(),
//            time: '10 AM',
//            isSubmit: false,
            
//         }
//     }


//     //Form events
 
//     onChangeTime(e) {
//         var index = e.nativeEvent.target.selectedIndex;
//         ahmad =(e.target.options[e.target.selectedIndex].text)

//         this.setState ({time: e.target.options[e.target.selectedIndex].text})
//     }

//           //React lifecycle
//           componentDidMount() {
//           this.userData = JSON.parse(sessionStorage.getItem('date')); 
        
//         if (sessionStorage.getItem('date')) {
//             this.setState({
//                 date: this.userData.date,
//                 time: this.userData.time
//             })
//         }
//         else {
//             this.setState({
//                 date: '',
//                 time: '10'
//             })
//         }
//     }
//     componentWillUpdate(nextProps, nextState) {
//         // alert(dana)
//         // sessionStorage.setItem('date', JSON.stringify(nextState));
//         let a=JSON.parse(sessionStorage.getItem('offers1'))
//         let b = a.slice(-1)[0]
//         a.pop()
        
//         b["time"] = ahmad;
//         b["SessionDate"] = this.state.SessionDate;
//         a.push(b)
//         sessionStorage.setItem("offers1", JSON.stringify(a));
//     }

//     onSubmit(e) {

//         e.preventDefault();
        
//         console.log(this.state.props)
//     }

    

// render(){
//     let Close =() => this.setState({ isSubmit:false});
//     return(
//         <div className="form_wrapper">
//         <div className="form_container">
//             <div className="title_container">
//             <h2>Book your photo shoot</h2>
//             <h3>Book an appointment by filling out this fields, choose the date and time that suit for you, and we will call you soon! </h3>
//             </div>
//             <form onSubmit={this.onSubmit}>
//             <div className="row clearfix">
//                 <div className="col_half">
//                 <label>Date:</label>
//                 <div className="input_field"> 
//                     {/* <input type="date" name="date" placeholder="Choose the date" value={this.state.date} onChange={this.onChangeDate} required /> */}
//                     <DatePicker  
//                     selected={this.state.SessionDate
                        
//                     }
//                                     onChange={(e) => dana =e}
//                     dateFormat='dd/MM/yyyy'
//                     minDate={new Date()}
//                     // filterDate={date => date.getDay() != 6 && date.getDay() != 0}
//                     isClearable
//                     />

//                 </div>
//                 </div>
//                 <div className="col_half">
//                 <label>Time:</label>
//                 <div className="input_field"> 
//                                 <select id="time"  name="time" onChange={this.onChangeTime}  required>
//                                 // <option value={this.state.time}>10 AM</option>
//                                 <option value="10 AM">10 AM</option>
//                                 <option value="12 PM">12 AM</option>
//                                 <option value="2 PM">2 PM</option>
//                                 <option value="2 PM">4 PM</option>
//                                 <option value="6 PM">6 PM </option>
//                                 <option value="8 PM">8 PM</option>
//                             </select>
//                     {/* <input type="time" name="time" placeholder="Choose the time" value={this.state.time} onChange={this.onChangeTime} required  /> */}
//                 </div>
//                 </div>
//             </div>
            
//             <ButtonToolbar>
//             <Button className="Button-Submit" onClick={()=> ( this.setState({isSubmit: true }))}> Submit </Button>
//             <AddMsg show={this.state.isSubmit}
//             onHide = {Close} />
//            </ButtonToolbar>
//             </form>
//         </div> 
//         </div>
//     )}}

//     // function Date_Picker() {
//     //     const [selectedDate, setSelectedDate]=useState(null)
//     //     return (
//     //       <div>
            
//     //       </div>
//     //     );
//     //   }
 


// export default Booking


// // 