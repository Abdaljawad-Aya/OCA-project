// import React from "react";
// // import moduleName from 'module';
// // import './youtube.css';

// const YoutubeVideo = ({ video }) => {
//   const videoID = video.contentDetails.videoId;
//   return (
    
//       <div>
//         <iframe
//           title="Cake"
//           className="VideoFrame"
//           src={"https://www.youtube.com/embed/" + videoID}
//           frameborder="0"
//           allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
//           allowfullscreen
         
//         ></iframe>
//       </div>
   
//   );
// };
// export default YoutubeVideo;
import React from 'react';
// import moduleName from 'module';
import './youtube.css';

const YoutubeVideo = ({ video }) => {
  const videoID = video.contentDetails.videoId;
  return (
    <div className='m_youtubeapi_count'>
      <iframe
        title='Cake'
        className='VideoFrame'
        src={'https://www.youtube.com/embed/' + videoID}
        frameborder='0'
        allow='accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
        allowfullscreen></iframe>

      {/* <div className='m_youtubeapi_content'>
        <div className="m_youtubeapi_title">
          test
        </div>
        <div className="m_youtubeapi_subtitle">
          sub test
        </div>
        <div className="m_youtubeapi_description">  
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam reprehenderit, culpa similique voluptatem excepturi impedit est molestiae, perspiciatis reiciendis alias dolore totam voluptatibus aliquid pariatur ab doloremque nam eaque doloribus?
        </div>
      </div> */}

    </div>
  );
};
export default YoutubeVideo;

