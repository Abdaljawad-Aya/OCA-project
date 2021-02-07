import './Weather.css';
import "../../index.css"
import { WeatherData } from './WeatherData'
import {StatusData} from "./StatusData"
import CardGo from './CardGo';
import React, { Component, Profiler } from 'react';
import ProfileIcon from '../../component/images/profile icon.png'
class AppOne extends Component{
  state = {
    user: JSON.parse(localStorage.getItem("userN")) ,
    date: JSON.parse(sessionStorage.getItem("date")), 
    offer: JSON.parse(sessionStorage.getItem("offers1")), 
    CoverImg1:ProfileIcon
  }

 imageHandlerCover = (e) => {
    const reader = new FileReader();
    reader.onload = () => {
      if (reader.readyState === 2) {
        this.setState({ CoverImg1: reader.result });
      }
    };
    reader.readAsDataURL(e.target.files[0]);
  };

  


  render(){      
    document.title ="DAMSA | Profile Page"; 
    document.getElementsByTagName("META")[2].content="Damsa is a website for booking photography sessions anywhere and anytime, we have a very precise and up to date waether section you will love";
    return (

      <div className="profile_page">
        <div className="profile_page_left_part">
          <div className="profile_page_user_info">

              <div className="BtnEditCover">
                <input
                  type="file"
                  name="image-upload-Cover"
                  id="inputCover"
                  accept="image/*"
                  onChange={this.imageHandlerCover}
                />
                <div className="image_container">
                  <label htmlFor="inputCover" className="image-upload">
                    <i class="fas fa-camera"></i></label>
                  <img className="profile_image" src={this.state.CoverImg1} alt="" />
                </div>
              </div>
        
            <div className="user_info">
              <b><i className="fas fa-user"></i> User : {this.state.user.username} </b><br />
              <b><i className="fas fa-envelope"></i> Email : {this.state.user.email}</b>
            </div>
          </div>
          <hr />

          <div className="profile_page_weather">
              <MyWeather/>
          </div>
        </div>
        <div className="profile_page_right_part">
          <div className="booked_photo_sessions">
            <div className='Booking'>
              BOOKED SESSIONS
            </div>
            
            
            <div className="booked_cards_container">
                   
            {(this.state.offer && this.state.offer.map((x) =>
               <CardGo
                location={x.location} date={x.SessionDate} TimeOfSession={x.time} CameraMan={x.photography} price={x.price}
                duration={x.sessionHoures} theming={x.theming} 
            />
              ))}
              </div>
          </div>
        </div>
      </div>
    );   
  };
};
class MyWeather extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      status: 'init',
      isLoaded: false,
      weatherData: null
    }
  }
  abortController = new AbortController();
  controllerSignal = this.abortController.signal;
  weatherInit = () => {
    const success = (position) => {
      this.setState({status: 'fetching'});
      localStorage.setItem('location-allowed', true);
      this.getWeatherData(position.coords.latitude, position.coords.longitude);
    }
    const error = () => {
      this.setState({status: 'unable'});
      localStorage.removeItem('location-allowed');
      alert('Unable to retrieve location.');
    }
    if (navigator.geolocation) {
      this.setState({status: 'fetching'});
      navigator.geolocation.getCurrentPosition(success, error);
    } else {
      this.setState({status: 'unsupported'});
      alert('Your browser does not support location tracking, or permission is denied.');
    }
  }
  getWeatherData = (lat, lon) => {
    const weatherApi = `http://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=31ed3ec2c5926cdafe59889e9b18386f`;
    fetch(weatherApi, { signal: this.controllerSignal })
    .then(response => response.json())
    .then(
      (result) => {
        console.log(result);
        const { name } = result;
        const { country } = result.sys;
        const { temp, temp_min, temp_max, feels_like, humidity } = result.main;
        const { description, icon } = result.weather[0];
        const { speed, deg } = result.wind;
        this.setState({
          status: 'success',
          isLoaded: true,
          weatherData: {
            name,
            country,
            description,
            icon,
            temp: temp.toFixed(1),
            feels_like: feels_like.toFixed(1),
            temp_min: temp_min.toFixed(1),
            temp_max: temp_max.toFixed(1),
            speed,
            deg,
            humidity
          }
        });
      },
      (error) => {
        this.setState({
          isLoaded: true,
          error
        });
      }
    );
  }
  returnActiveView = (status) => {
    switch(status) {
      case 'init':
        return(
          <button 
          className='btn-main' 
          onClick={this.onClick}
          >
            Get My Location
          </button>
        );
      case 'success':
        return <WeatherData data={this.state.weatherData} />;
      default:
        return <StatusData status={status} />;
    }
  }
  onClick = () => {
    this.weatherInit();
  }
  componentDidMount() {
    if(localStorage.getItem('location-allowed')) {
      this.weatherInit();
    } else {
      return;
    }
  }
  componentWillUnmount() {
    this.abortController.abort();
  }
  render() {
    return (
      <div className='weather_section'>
        <div className='weather_container'>
          {this.returnActiveView(this.state.status)}
        </div>
      </div>
    );
  }
}
export default AppOne;
