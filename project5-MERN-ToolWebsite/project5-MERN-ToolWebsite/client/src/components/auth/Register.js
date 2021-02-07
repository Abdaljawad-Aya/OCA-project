import React, { Component } from "react";
import { withRouter } from "react-router-dom";

import PropTypes from "prop-types";

import TextFieldGroup from "../common/TextFieldGroup";

import { connect } from "react-redux";
import { registerUser } from "../../actions/authActions";
import { Link } from "react-router-dom";


class Register extends Component {
  constructor() {
    super();
    this.state = {
    //  name: "",
      email: "",
      password: "",
      password2: "",
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
    if (nextProps.errors) {
      this.setState({ errors: nextProps.errors });
    }
  }

  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }
  onSubmit(e) {
    e.preventDefault();
    const newUser = {
     // name: this.state.name,
      email: this.state.email,
      password: this.state.password,
      password2: this.state.password2
    };
    console.log(newUser);
    this.props.registerUser(newUser, this.props.history);
  }
  render() {
    const { errors } = this.state;

    return (
      <div className="m_container">
        <div className="forms-m_container">
          <div className="m_signin-signup">

              <form className="m_sign-in-form"  noValidate onSubmit={this.onSubmit}>
              <h2 class="m_title">Sign up</h2>

                {/* <TextFieldGroup
                  placeholder="Name"
                  name="name"
                  value={this.state.name}
                  onChange={this.onChange}
                  error={errors.name}
                /> */}
                
                <TextFieldGroup 
                      name="email"
                      type="email"
                      placeholder="Enter your email here"
                      value={this.state.email}
                      onChange={this.onChange}
                      error={errors.email}
                      icon={"fas fa-envelope"}
                      />
                      <TextFieldGroup 
                      name="password"
                      type="password"
                      placeholder="Enter your password here"
                      value={this.state.password}
                      onChange={this.onChange}
                      error={errors.password}
                      icon={"fas fa-lock"}
                      />
                      <TextFieldGroup 
                      name="password2"
                      type="password"
                      placeholder="Repeat your password here"
                      value={this.state.password2}
                      onChange={this.onChange}
                      error={errors.password2}
                      icon={"fas fa-lock"}
                      />
              {/* <div class="m_input-field">
              <i class="fas fa-envelope"></i>
              <input 
                placeholder="Enter your email here"
                name="email"
                type="email"
                value={this.state.email}
                onChange={this.onChange}
              />
             </div> */}
                
              {/* <div class="m_input-field">
              <i class="fas fa-lock"></i>

              <input 
                placeholder="Enter your password here"
                name="password"
                type="password"
                value={this.state.password}
                onChange={this.onChange}
              />
             </div>

              <div class="m_input-field">
                <i class="fas fa-lock"></i>

              <input 
                placeholder="Repeat your password"
                name="password2"
                type="password"
                value={this.state.password2}
                onChange={this.onChange}
              />
             </div> */}


                <input type="submit" class="m_btn" value="Sign up"/>
                {/* <p class="m_social-text">Or Sign up with social platforms</p>
            <div class="m_social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> */}
              </form>
            </div>
          </div>
          <div class="panels-m_container">
        <div class="m_panel left-m_panel">
          <div class="m_content">
            <h3>Already have account ?</h3>
            <p>
            To keep connected with us please sign in to your account with your presonal info.
            </p>
            <Link className=" m_btn_custom" to="/login" >Sign in</Link> 
           </div>
          
        </div> 
        
      </div>       

      </div>
    );
  }
}
Register.propTypes = {
  registerUser: PropTypes.func.isRequired,
  auth: PropTypes.object.isRequired
};
const mapStateToProps = state => ({
  auth: state.auth,
  errors: state.errors
});

export default connect(
  mapStateToProps,
  { registerUser }
)(withRouter(Register));
