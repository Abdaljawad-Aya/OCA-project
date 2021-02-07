import React from "react";
import { Link } from "react-router-dom";

const ProfileActions = () => {
  return (
    <div className="btn-group mb-4" role="group">
      <a href="edit-profile" className="btn btn-light">
        <i className="fas fa-user-edit text-info mr-1" /> Edit

      </a>      
    </div>
  );
};
export default ProfileActions;
