import React, { Component } from "react";
import { connect } from "react-redux";
import { withRouter } from "react-router-dom";
import PropTypes from "prop-types";

import TextFieldGroup from "../common/TextFieldGroup";
import TextAreaFieldGroup from "../common/TextAreaFieldGroup";
import InputGroup from "../common/InputGroup";
import SelectListGroup from "../common/SelectListGroup";
import { createProfile } from "../../actions/profileActions";

class CreateProfile extends Component {
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

  componentWillReceiveProps(nextProps) {
    if (nextProps.errors) {
      this.setState({
        errors: nextProps.errors
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
    console.log(profileData);
    this.props.createProfile(profileData, this.props.history);
  }
  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }
  render() {
    const { errors, displaySocialInputs } = this.state;

    

    return (
      <div className="create-profile">
        <div className="container mb-5 mt-3 ">
          <div className="row">
            <div className="col-md-6 m-auto">
              <h1 className="display-8 text-center">Create your company profile</h1>
              <p className="lead text-center">
                Let's get some information to get started!
              </p>
              {/* <small className="d-block pb-3">* required fields</small> */}
              <form onSubmit={this.onSubmit}>
                <TextFieldGroup
                  placeholder="* Company name"
                  name="handle"
                  value={this.state.handle}
                  onChange={this.onChange}
                  error={errors.handle}
                  icon={"fas fa-user"}
                  // info="A unique handle for your profile URL"
                />
                <TextFieldGroup
                  placeholder="Company Logo URL"
                  name="imgUrl"
                  value={this.state.imgUrl}
                  onChange={this.onChange}
                  error={errors.imgUrl}
                  icon={"fas fa-camera"}
                  // info="Choose your profile picture!"
                />
                
                <TextAreaFieldGroup
                  placeholder="Tell us about your company"
                  name="bio"
                  value={this.state.bio}
                  onChange={this.onChange}
                  error={errors.bio}

                  // info="Tell us a little about yourself!"
                />

                
                <input
                  type="submit"
                  value="submit"
                  className="btn btn-info btn-block mt-8"
                />
              </form>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

CreateProfile.propTypes = {
  profile: PropTypes.object.isRequired,
  errors: PropTypes.object.isRequired
};

const mapStateToProps = state => ({
  profile: state.profile,
  errors: state.errors
});
export default connect(
  mapStateToProps,
  { createProfile }
)(withRouter(CreateProfile));
