import React, { Component } from "react";
import PropTypes from "prop-types";
import { Link } from "react-router-dom";
import { connect } from "react-redux";
import { getCurrentProfile, deleteAccount } from "../../actions/profileActions";
// import ProfileActions from "./ProfileActions";
import ProfileHeader from "../profile/ProfileHeader";

import ProfileAbout from "../profile/ProfileAbout";
import Cart from "../LandingPage/cart";

import Spinner from "../common/Spinner";

class Dashboard extends Component {
  componentDidMount() {
    this.props.getCurrentProfile();
  }
  onDeleteClick(e) {
    this.props.deleteAccount();
  }

  render() {
    const { user } = this.props.auth;
    const { profile, loading } = this.props.profile;
    // console.log(profile.user._id);
    {console.log(profile)}
    // {console.log(profile.user)}
    let dashboardContent;
    if (profile === null || loading) {
      dashboardContent = <Spinner />;
    } else {
      // check if logged in user has profile
      if (Object.keys(profile).length > 0) {
        dashboardContent = (
          <div>
            <ProfileHeader profile={profile} />
            <ProfileAbout profile={profile} />
             {/* {console.log(profile)} */}
            {/* <ProfileActions /> */}
            <div style={{ marginBottom: "2.5rem" }} />
            <button
              onClick={this.onDeleteClick.bind(this)}
              className="btn btn-danger"
            >
              <i class="fas fa-trash-alt"> </i>
              {"  "}
              Delete my account
            </button>
            <div>
              <h1 className="display-6 text-center">Your Previous Orders: </h1>
              <Cart />
              {console.log(user.handle)}
            </div>
          </div>
        );
      } else {
        // user has no profile created
        dashboardContent = (
          <div className="mt-3 mb-5">
            <p className="lead text-muted ">Welcome {user.name}</p>
            <p>
              You have no yet set up your company profile, please add some
              information
            </p>
            <Link to="/create-profile" className="btn btn-lm btn-info">
              Create Profile
            </Link>
          </div>
        );
      }
    }

    return (
      <div className="dashboard">
        <div className="container">
          <div className="row">
            <div className="col-md-12">
              {/* <p className="display-4" style={{ fontWeight: "bold" }}>
                Dashboard
              </p> */}
              {dashboardContent}
            </div>
          </div>
        </div>
      </div>
    );
  }
}

Dashboard.propTypes = {
  getCurrentProfile: PropTypes.func.isRequired,
  deleteAccount: PropTypes.func.isRequired,
  auth: PropTypes.object.isRequired,
  profile: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  profile: state.profile,
  auth: state.auth,
});

export default connect(mapStateToProps, { getCurrentProfile, deleteAccount })(
  Dashboard
);
