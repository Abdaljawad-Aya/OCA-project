import React, { Component } from "react";
import ImgLogo from "../../components/assets/nav.png"
import { Link } from "react-router-dom";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { logoutUser } from "../../actions/authActions";
import { clearCurrentProfile } from "../../actions/profileActions";
import { PROFILE_LOADING } from "../../actions/types";

class Navbar extends Component {
  onLogoutClick(e) {
    e.preventDefault();
    this.props.clearCurrentProfile();
    this.props.logoutUser();
  }

  render() {
    const { isAuthenticated, user } = this.props.auth;

    const authLinks = (
      <ul className="navbar-nav ml-auto">
        
        <li className="nav-item">
          <Link className="nav-link" to="/dashboard" style={{ color: "white" }}>
            Dashboard
          </Link>
        </li>
        <li className="nav-item">
          <a
            href=""
            onClick={this.onLogoutClick.bind(this)}
            className="nav-link"
          >


            <span
              style={{
                color: "black",
                fontWeight: "bold",
                padding: 7,
              }}
            >
                <i class="fas fa-sign-out-alt"></i>
              Logout
            </span>
          </a>
        </li>
      </ul>
    );
    const guestLinks = (
      <ul className="navbar-nav ml-auto">
        <li className="nav-item">
          <Link className="nav-link" to="/register" style={{ color: "white" }}>
            Register
          </Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/login" style={{ color: "white" }}>
            Login
          </Link>
        </li>
      </ul>
    );
    return (
      <nav 
      
      // margin bottom for nav
        className="navbar navbar-expand-sm mb-0"
        style={{ backgroundColor: "#F3969A" }}
      >
        <div className="container">
        <Link className="navbar-brand logopng" to="/" style={{ color: "white" }}>
        <img src={ImgLogo} style={{ height: "3rem" ,width:"6rem"}}/>  
          </Link>
          {/* <Link className="navbar-brand" to="/" style={{ color: "white" }}>
Home
          </Link> */}



         {/* <div className="collapse navbar-collapse" id="mobile-nav">

          <ul className="navbar-nav ml-auto ">
        <li className="nav-item">
          <Link className="nav-link " to="/about-us" style={{ color: "white" }}>
            About Us
          </Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/contact-us" style={{ color: "white" }}>
            Contact Us
          </Link>
        </li>
      </ul>
   
         </div>  */}

{/* 

          <Link className="navbar-brand" to="/about-us" style={{ color: "white" }}>
         About-Us
          </Link>

          <Link className="navbar-brand" to="/contact-us" style={{ color: "white" }}>
                  Contact-Us
          </Link> */}
          <button
            className="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#mobile-nav"
          >
            <span className="navbar-toggler-icon" style={{color:"white", textAlign:"center", alignItems:"center"}}>≡</span>
          </button>

          <div className="collapse navbar-collapse" id="mobile-nav">
            <ul className="navbar-nav mr-auto">
              <li className="nav-item">
                <Link
                  className="nav-link"
                  to="/profiles"
                  style={{ color: "white" }}
                >
                  {" "}
                  Users
                </Link>
              </li>
              <li className="nav-item">
          <Link className="nav-link " to="/about-us" style={{ color: "white" }}>
            About Us
          </Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/contact-us" style={{ color: "white" }}>
            Contact Us
          </Link>
        </li>
            </ul>
            {isAuthenticated ? authLinks : guestLinks}
          </div>
        </div>
      </nav>
    );
  }
}

Navbar.propTypes = {
  logoutUser: PropTypes.func.isRequired,
  auth: PropTypes.object.isRequired
};

const mapStateToProps = state => ({
  auth: state.auth
});

export default connect(
  mapStateToProps,
  { logoutUser, clearCurrentProfile }
)(Navbar);
