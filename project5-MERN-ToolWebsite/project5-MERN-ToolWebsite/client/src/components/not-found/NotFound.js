import React from "react";
import gif from "../not-found/404.gif"
export default () => {
  return (
    <div className="imge">
          {/* <p className="display-9">PAGE NOT FOUND</p> */}
      <img src={gif} alt="page not found" />
      {/* <h1 className="display-4">404 ERROR</h1> */}
    </div>
  );
};
