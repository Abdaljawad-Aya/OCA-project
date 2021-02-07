import React, { Component } from "react";
import isEmpty from "../../validation/is-empty";
import ProfileActions from "../dashboard/ProfileActions";
import Cart from "../LandingPage/cart"

class ProfileHeader extends Component {
  constructor(props) {
    super(props);
    this.state = {};
  }

  render() {
    const { profile } = this.props;
    console.log("profileheader");
    console.log(profile);
    // console.log(profile._id);
    // console.log(profile.user);
    // console.log(profile.user._id)
    // console.log(profile.handle);
  //  const UserName = sessionStorage.setItem(profile.handle);
  // sessionStorage.setItem("myUser", JSON.stringify(profile.user._id))
    //  console.log(sessionStorage.getItem(profile.handle));
    // let useWaed = JSON.parse(sessionStorage.getItem("myUser"))
    // console.log(useWaed);

    return (
      <div>
        <div className="row">
          <div className="col-md-12 m-auto">
            <div className="card card-body bg-info text-white mb-3">
         
         {/* edit profile profileactions.js */}
         <div className="col-md-2">
         <ProfileActions  />

         </div>

            
              <div className="row">
              {/* <img src={Cbackground} alt="candy" style={{width: '100%'}} /> */}

                <div className="col-4 col-md-3 m-auto">
                  {isEmpty(profile.imgUrl) ? (
                    <img
                      className="rounded-circle"
                      src="https://icon-library.net/images/default-profile-icon/default-profile-icon-24.jpg"
                      alt="profile picture"
                    />
                  ) : (
                    <img
                      className="rounded-circle"
                      src={profile.imgUrl}
                      alt="profile picture"
                    />
                  )}
                </div>
              </div>
              <div className="text-center">
                <h1 className="display-4 text-center">{profile.handle}</h1>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default ProfileHeader;
