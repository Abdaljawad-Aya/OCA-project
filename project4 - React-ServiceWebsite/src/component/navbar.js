import React from "react";
import './navbar.css';
import Logo from "./images/logo3.png";
import { Navbar, Nav } from "react-bootstrap";

class MyNavbar extends React.Component {

  isLoggedIn = JSON.parse(localStorage.getItem('isLogin')) ;
  render() {
    return (
      <div>
        <Navbar
          className="navbar"
          collapseOnSelect
          expand="lg"
          variant="dark"
          fixed="top"
        >
          <Navbar.Brand href="#" className="navbar-brand">
            <img src={Logo} alt="Logo"></img>
          </Navbar.Brand>
          <Navbar.Toggle aria-controls="responsive-navbar-nav" />
          <Navbar.Collapse id="responsive-navbar-nav">
            <Nav className="mr-auto">
              <Nav.Link href="/" class="nav-link">
                Home
              </Nav.Link>
              {(this.isLoggedIn == true)&& <Nav.Link href="/servicePage">Our Services</Nav.Link>}
              </Nav>
              
              {(!(this.isLoggedIn == true)) ?
                <Nav>
                <Nav.Link href="/RegisterForm"> Register</Nav.Link>
                <Nav.Link href="LogIn"> Login</Nav.Link>
                </Nav>
                :
                <Nav>
                 <Nav.Link href="/AppOne">
                  <i className="fas fa-user"></i> {JSON.parse(localStorage.getItem("userN")).username}
                </Nav.Link>
                <Nav.Link href="/login" onClick={() => {
                  localStorage.setItem('isLogin', false);
                sessionStorage.clear();

                }
                }> Logout</Nav.Link>
                
                 </Nav>
                
              }
           
          </Navbar.Collapse>
        </Navbar>
      </div>
    );
  }
}

export default MyNavbar;
