import React from "react";
import "./css/landingPage.css";
import "./css/landingPageIntro.css";
import "./css/landingPageOurServices.css";
import "./css/landingPageTestimonial.css"
import "./css/landingPageDevelopersCards.css"
import "../../../src/index.css";
import "react-responsive-carousel/lib/styles/carousel.min.css"; // requires a loader
import "./css/landingPageTestimonial.css"
import { Carousel } from 'react-responsive-carousel';

import Video from "./video";
import VideoBackgroud from "../images/Background Video.mp4"
import OurServices from "../data/our_services";
import Developers from "../data/developers";
import PhotographersCards from "../PhotographersCards";

import Logo from "../images/logo3.png";
import Img1 from "../images/baby7.jpeg";
import Img2 from "../images/graduate7.jpg";
import Img3 from "../images/couples9.jpg";
import Img4 from "../images/graduate2.jpg";
import Img5 from "../images/graduate1.jpg";
import Img6 from "../images/mS.jpg";
import Img7 from "../images/developer2.jpg";
import Img8 from "../images/amal.jpg";
import Img9 from "../images/khadeejah.jpg";

class LandingPage extends React.Component {
    render() {
        document.title ="DAMSA | Landing Page"; 
        document.getElementsByTagName("META")[2].content="Damsa is a website for booking photography sessions anywhere and anytime we have the best developers and photographers out there"; 
        return (
            <div>
                <PageIntro logo={Logo} />
                <OurServicesSections services={OurServices} />
                <Videos />
                <Testimonials />
                <DeveloperCards developers={Developers} />
                <PhotographersCards />
            </div>
        );
    }
}

class PageIntro extends React.Component {
    render() {
        return (
        <div className="landing_page_intro">
            <div className="intro_left_part">
            <div><h1 className="intro_title">MEMORIES WORTH CHERISHING</h1></div>
            <div>
                Create the memories and celebrate the magic with Damsa - a
                beautifully designed photography sessions website that has it all.
            </div>
            {/* <div><img src={this.props.logo}></img></div> */}
            <div>
            <a href="#our_services_container"><button className="btn1">Our Services</button></a>
            </div>
            </div>
            <div className="intro_right_part">
            <div className="landing_page_grid">
                <div className="landing_page_grid_item1">
                <img src={Img1} alt="father and baby picture"></img>
                </div>
                <div className="landing_page_grid_item2">
                <img src={Img2} alt="family celebrating picture"></img>
                </div>
                <div className="landing_page_grid_item3">
                <img src={Img3} alt="couples in a car picture"></img>
                </div>
                <div className="landing_page_grid_item4">
                <img src={Img4} alt="girl celebrating graduation picture"></img>
                </div>
                <div className="landing_page_grid_item5">
                <img src={Img5} alt="girl graduating picture"></img>
                </div>
            </div>
            </div>
            <a href="#our_services_container"> <button className="down_button"><i class="fas fa-caret-down"></i></button></a>
        </div>
        );
    }
}

class OurServicesSections extends React.Component {
    render() {
        return (
        <div className="our_services_container" id="our_services_container">
            <div className="intro_title hidden_title"> Our Services</div>
            {this.props.services.map((service) => (
            <OurServicesSection key={service.id} service={service} />
            ))}
        </div>
        );
    }
}

class OurServicesSection extends React.Component {
    render() {
        const nextId= this.props.service.id +1;
        return (
        <div className="our_services_section" id={this.props.service.id+" service"}>
            <div className="opaque_container">
            <div className="opaque_container_title">
                {this.props.service.title}
            </div>
            <div>{this.props.service.description} </div>
            </div>
            <div className="our_services_left_part">
            <img src={this.props.service.img1} alt={this.props.service.title+"photoshoot picture 1"}></img>
            </div>
            <div className="our_services_right_part">
            <div className="our_services_right_part_img1">
                <img src={this.props.service.img2} alt={this.props.service.title+"photoshoot picture 2"}></img>
            </div>
            <div className="our_services_right_part_img2">
                {" "}
                <img src={this.props.service.img3} alt={this.props.service.title+"photoshoot picture 3"}></img>
            </div>
            <div className="our_services_right_part_img1">
                <img src={this.props.service.img4} alt={this.props.service.title+"photoshoot picture 4"}></img>
            </div>
            </div>
            {this.props.service.id === 3 
            ? <a href="#videos_container"> <button className="down_button"><i class="fas fa-caret-down"></i></button></a>
            :<a href={"#"+nextId+" service"}> <button className="down_button"><i class="fas fa-caret-down"></i></button></a>
            }

        </div>
        );
    }
}

class Videos extends React.Component {
    constructor() {
        super();
        this.state = {
            videos: [],
        };
        }
        async componentDidMount() {
            const url =
                "https://youtube.googleapis.com/youtube/v3/playlistItems?part=contentDetails&maxResults=5&playlistId=PL9Fw1J2bLM2FwcSUEVmjlNDGDIjgX1f4X&key=AIzaSyBdxvztZnz4ZOl-ShY06LoMVx8_UeGDZck";
            const response = await fetch(url);
            const data = await response.json();
            this.setState({ videos: data.items });
        }
    render() {
        const { videos } = this.state;
        const renderVideos = videos.map((video) => {
            return <Video key={video.contentDetails.videoId} video={video} />;
        });
        return (
            <div className="videos_container" id="videos_container">
                <video autoPlay muted loop id="myVideo">
                    <source src={VideoBackgroud} type="video/mp4" />
                    Your browser does not support HTML5 video.
                </video>
                <div className="intro_title"> Tips For You</div>
                <div className="videos_section">{renderVideos}</div>
                <a href="#testimonials_section"> <button className="down_button"><i class="fas fa-caret-down"></i></button></a>
            </div>
        );
    }
}

class Testimonials extends React.Component{
    render(){
        return(
            <div className="testimonials_section" id="testimonials_section">
                <div className="intro_title">Testimonials</div>
                <Carousel
                showArrows={true}
                infiniteLoop={true}
                showThumbs={false}
                showStatus={false}
                autoPlay={true}
                interval={6100}>
                <div>
                <img src={Img9} alt="customer 1 picture" />
                <div className="myCarousel">
                    <h3>Khadeejah Hamdan</h3>
                    <h4>Trainer</h4>
                    <p>
                    Its a very creative and new idea and you have smart visual identity</p>
                </div>
                </div>
        
                <div>
                <img src={Img6} alt="customer 2 picture" />
                <div className="myCarousel">
                    <h3>Mohammad Al-Shwaiki</h3>
                    <h4>Trainer</h4>
                    <p>
                    The simple and intuitive design makes it easy for me use. I highly
                    recommend it to my peers.
                    </p>
                </div>
                </div>
        
                <div>
                <img src={Img8} alt="customer 3 picture" />
                <div className="myCarousel">
                    <h3>Saja dahamsheh</h3>
                    <h4>Trainer</h4>
                    <p>
                    I enjoy book my sessions with Damsa on my laptop, or on my phone when
                    I'm on the go it's very easy to book!
                    </p>
                </div>
                </div>
            </Carousel>
        
            <a href="#developers_section"> <button className="down_button"><i class="fas fa-caret-down"></i></button></a>
        </div>
        )
    }
}

class DeveloperCards extends React.Component{
    render(){
        return(
            <div className="developers_section" id="developers_section">
                <div className="intro_title">Our Developers</div>
                <div className="developers_cards">
                {this.props.developers.map((developer) => <DeveloperCard key={developer.id} developer={developer}/>) }
                </div>
            </div>
        )
    }
}

class DeveloperCard extends React.Component{
    render(){
        return(
            <div className="landing_page_card">
                    <div className="user_picture">
                        <img src={this.props.developer.picture} alt={this.props.developer.name+" user picture"}></img> 
                    </div>
                    <div className="card_body">
                        <div><h3>{this.props.developer.name}</h3></div>
                        <div className="location">{this.props.developer.location}</div>
                        <div className="major">{this.props.developer.major}</div>
                        <div className="description">{this.props.developer.description}</div>
                        <div className="social_media_links">
                            <a href={this.props.developer.github_link}><i className="fab fa-github"></i></a>
                            <a href={this.props.developer.linkedin_link}><i className="fab fa-linkedin"></i></a>
                            <a href={this.props.developer.facebook_link}><i className="fab fa-facebook"></i></a>
                        </div>
                    </div>
            </div>
        )
    }
}


export default LandingPage;
