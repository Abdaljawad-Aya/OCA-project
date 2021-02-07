import React, { Component } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { loginUser } from "../../actions/authActions";
import TextFieldGroup from "../common/TextFieldGroup";
import { Link } from "react-router-dom";

import "./StyleForms.css"

class Login extends Component {
  
  constructor() {
    super();
    this.state = {
      email: "",
      password: "",
      isLogedIn:"",
      errors: {}
    };
    this.onChange = this.onChange.bind(this);
    this.onSubmit = this.onSubmit.bind(this);
  }

  componentDidMount() {
    if (this.props.auth.isAuthenticated) {
      this.props.history.push("/dashboard");
    }
  }

  componentWillReceiveProps(nextProps) {
    if (nextProps.auth.isAuthenticated) {
      this.props.history.push("/dashboard");
    }
    if (nextProps.errors) {
      this.setState({ errors: nextProps.errors });
    }
  }

  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }
  onSubmit(e) {
    e.preventDefault();
    const userData = {
      email: this.state.email,
      password: this.state.password
    };
    this.props.loginUser(userData);
    console.log("ok")
  }
  render() {
    const register = () => history.push("/register");
    const { errors } = this.state;

    return (
      <div className="m_container">
        <div className="forms-m_container">
          <div className="m_signin-signup">
              <form action="#" className="m_sign-in-form"  onSubmit={this.onSubmit}>
                
                 <h2 className="m_title">Sign in</h2>
                      <TextFieldGroup 
                      name="email"
                      type="email"
                      placeholder="Enter your email here"
                      value={this.state.email}
                      onChange={this.onChange}
                      error={errors.email}
                      icon={"fas fa-user"}
                      />
                      <TextFieldGroup 
                      name="password"
                      type="password"
                      placeholder="Enter your email here"
                      value={this.state.password}
                      onChange={this.onChange}
                      error={errors.password}
                      icon={"fas fa-lock"}
                      />
                      
                      {/* <div className="m_input-field">
                      <i className="fas fa-user"></i>

                      <input
                      name="email"
                      type="email"
                      value={this.state.email}
                      onChange={this.onChange}
                      
                      />
                      </div> */}

                
                {/* <div className="m_input-field">
                  <i className="fas fa-lock"></i>
                  <input 
                  placeholder="Enter your password here"
                  name="password"
                  type="password"
                  value={this.state.password}
                  onChange={this.onChange}
                 />
                  </div> */}
                  <input 
                  type="submit" 
                  value="Login" 
                  className="m_btn m_solid" 
                  />
                  {/* <p className="m_social-text">Or Sign in with social platforms</p> */}

            {/* <div className="m_social-media">
              <a href="#" className="social-icon">
                <i className="fab fa-facebook-f"></i>
              </a>
              <a href="#" className="social-icon">
                <i className="fab fa-twitter"></i>
              </a>
              <a href="#" className="social-icon">
                <i className="fab fa-google"></i>
              </a>
              <a href="#" className="social-icon">
                <i className="fab fa-linkedin-in"></i>
              </a>
            </div> */}
              </form>
            </div>
          </div>
          <div className="panels-m_container">
        <div className="m_panel left-m_panel">
          <div className="m_content">
            <h3>New Here ?</h3>
            <p>
              Register Now, to have a depth look to our Services, Who knows you might have such cool online shop.
            </p>
            {/* <button className="m_btn m_transparent" 
            onClick={this.register} 
            
            id="sign-in-btn">Sign up</button> */}
          <Link className="m_btn_custom" to="/register" >Register</Link>

          </div>
          
          
        </div>
       
      </div>




      </div>
    );
  }
}

Login.propTypes = {
  loginUser: PropTypes.func.isRequired,
  auth: PropTypes.object.isRequired,
  errors: PropTypes.object.isRequired
};
const mapStateToProps = state => ({
  auth: state.auth,
  errors: state.errors
});

export default connect(
  mapStateToProps,
  { loginUser }
)(Login);
