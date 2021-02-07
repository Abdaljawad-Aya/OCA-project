import React, { Component } from "react";
import isEmpty from "../../validation/is-empty";

import { connect } from "react-redux";
import { withRouter } from "react-router-dom";

import PropTypes from "prop-types";

import TextFieldGroup from "../common/TextFieldGroup";
import TextAreaFieldGroup from "../common/TextAreaFieldGroup";


import { createProfile, getCurrentProfile } from "../../actions/profileActions";

class EditProfile extends Component {
  constructor(props) {
    super(props);
    this.state = {
      displaySocialInputs: false,
      handle: "",
      imgUrl: "",    
      bio: "", 
      errors: {}
    };

    this.onChange = this.onChange.bind(this);
    this.onSubmit = this.onSubmit.bind(this);
  }
  componentDidMount() {
    this.props.getCurrentProfile();
  }

  componentWillReceiveProps(nextProps) {
    if (nextProps.errors) {
      this.setState({
        errors: nextProps.errors
      });
    }
    if (nextProps.profile.profile) {
      const profile = nextProps.profile.profile;      
      profile.bio = !isEmpty(profile.bio) ? profile.bio : "";
     

      // set component fields state
      this.setState({
        handle: profile.handle,
        imgUrl: profile.imgUrl,       
        bio: profile.bio,        
      });
    }
  }
  onSubmit(e) {
    e.preventDefault();

    const profileData = {
      handle: this.state.handle,
      imgUrl: this.state.imgUrl,      
      bio: this.state.bio,
     
    };
    
    this.props.createProfile(profileData, this.props.history);
  }
  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }
  render() {
    const { errors, displaySocialInputs } = this.state;

    

    return (
      <div className="create-profile">
        <div className="container mt-5 mb-5">
          <div className="row">
            <div className="col-md-7 m-auto ">
              <h1 className="display-6 text-center">Edit your profile</h1>
              <small className="d-block pb-3">* = required fields</small>
              <form onSubmit={this.onSubmit}>
                <TextFieldGroup
                  placeholder="* Profile Name"
                  name="handle"
                  value={this.state.handle}
                  onChange={this.onChange}
                  error={errors.handle}
                  icon={"fas fa-user"}
                />
              
              <br/>
                <TextFieldGroup
                  placeholder="*Profile picture URL"
                  name="imgUrl"
                  value={this.state.imgUrl}
                  onChange={this.onChange}
                  error={errors.imgUrl}
                  icon={"fas fa-camera"}
                  />
                
               <br/>
                <TextAreaFieldGroup
                  placeholder=" Enter your Bio"
                  name="bio"
                  value={this.state.bio}
                  onChange={this.onChange}
                  error={errors.bio}
                  
                  />

                
                        <br/>
                <input
                  type="submit"
                  value="submit"
                  className="btn btn-info btn-block mt-2"
                />
              </form>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

EditProfile.propTypes = {
  profile: PropTypes.object.isRequired,
  errors: PropTypes.object.isRequired,
  createProfile: PropTypes.func.isRequired,
  getCurrentProfile: PropTypes.func.isRequired
};

const mapStateToProps = state => ({
  profile: state.profile,
  errors: state.errors
});
export default connect(
  mapStateToProps,
  { createProfile, getCurrentProfile }
)(withRouter(EditProfile));
