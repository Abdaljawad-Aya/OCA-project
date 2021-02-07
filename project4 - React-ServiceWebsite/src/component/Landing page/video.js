import React from "react";
import "./css/landingPage.css";

const Video = ({ video }) => {
  return (
    <div>
      <iframe
        // width="560"
        // height="315"
        src={"https://www.youtube.com/embed/" + video.contentDetails.videoId}
        frameborder="0"
        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>
  );
};

export default Video;
