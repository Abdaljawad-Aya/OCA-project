import React from "react";
import YoutubeVideo from "./youtubeAPI";

class YoutubeAPI extends React.Component {
  constructor() {
    super();
    this.state = {
      loading: true,
      videos: [],
    };
  }
  async componentDidMount() {
    const url =
      "https://youtube.googleapis.com/youtube/v3/playlistItems?part=contentDetails&maxResults=4&playlistId=PLavVvkUePFTemWsZ2zTCjmazoq_hXOdW9&key=AIzaSyB67B_szVr6uSIUounQ8IR2xsErKFv1pBU";
    const response = await fetch(url);
    const data = await response.json();
    this.setState({ videos: data.items });
  }
  render() {
    const { videos } = this.state;
    const renderedVideos = videos.map((video, index) => {
      return <YoutubeVideo key={video.id} video={video} />;
    });
    return (
      <div className="YouTubeFullDiv">
        <h3 style={{ textAlign: "center", paddingTop: "3rem" }}>
          See more videos from our partners...
        </h3>
        <div
          className="YouAPI"
          style={{
            display: "flex",
            justifyContent: "center",
            alignItems: "center",
            margin: "1rem",
            padding: "1rem" ,
            flexWrap: "wrap",
            gap: "2rem",
            background: "#fffff",
            borderRadius:"10px",
            boxShadow: "3px  10px 10px 1px #dadada",
           
            
          }}
        >
          {renderedVideos}
        </div>
      </div>
    );
  }
}
export default YoutubeAPI;
