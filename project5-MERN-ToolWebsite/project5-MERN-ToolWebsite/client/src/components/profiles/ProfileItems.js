import React, { Component } from "react";
import PropTypes from "prop-types";
import { Link } from "react-router-dom";
import isEmpty from "../../validation/is-empty";

class ProfileItems extends Component {
  render() {
    const { profile } = this.props;
    return (
      <div className="card card-body bg-light mb-10 ">
        <div className="row ml-10 m-auto">
          <div className="col-4 m-auto">
            {isEmpty(profile.imgUrl) ? (
              <img
              
                src="https://icon-library.net/images/default-profile-icon/default-profile-icon-24.jpg"
                alt="profile picture"
              />
            ) : (
              <img  src={profile.imgUrl} alt="" />
            )}
          </div>

          <div className="col-lg-6 col-md-4 col-8 ">
            <h3>{profile.handle}</h3>
            <p>              
              {isEmpty(profile.bio) ? null : (
                <span>{profile.bio}</span>
              )}
            </p>
            
            <Link to={`/profile/${profile.handle}`} className="btn btn-info">
              View Profile
            </Link>
          </div>
          
        </div>
      </div>
    );
  }
}

ProfileItems.propTypes = {
  profile: PropTypes.object.isRequired
};

export default ProfileItems;
