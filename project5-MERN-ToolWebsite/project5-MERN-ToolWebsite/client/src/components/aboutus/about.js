import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import { AiFillGithub  } from 'react-icons/ai';
import { FaLinkedin  } from 'react-icons/fa';
import Img1 from './image/razan.png'
import Img2 from './image/Abdullah.jpg'
import Img3 from './image/Ayah.jpg'
import Img4 from './image/Mohammad.jpeg'
import Img5 from './image/Waed.jpg'
import Img6 from './image/Lubna.jpg'

import './styles/about.css'
const useStyles = makeStyles({
  root: {
    maxWidth: '100%',
  },
  center: {
    textAlign: 'center',
  },
  socialMedia:{
    textAlign: 'center',
    marginBottom: '15px',
 
  },
  bg:{
   color: '#E96C8A'
  }

});

export default function ImgMediaCard() {
  const classes = useStyles();

  return (
    
      <div className="aya_Container"> 
        <h2 style={{textAlign: 'center'}}>Our Team</h2>
        <div className='ACont'>
        <div className="Arow">



          <div className="Acolumn">
            <div className="Acard">
              <img src={Img1} alt="Razan zuiter" style={{width: '100%'}}  className="A_img"/>
              <div className="Acontainer">
                <h2 className="Aya-title">Razan Zuaiter</h2>
                <p className="Atitle">Web Developer</p>
                <p>OCA Academy</p>
                <div  className={classes.socialMedia} >
                <a href="https://github.com/Razan-Zuaiter">
                   <AiFillGithub  style={{color:'brown', marginLeft:'12px'}} size={'30px'} />
                   </a>
                   <a href="http://linkedin.com/in/razan-zuaiter">
                   <FaLinkedin   style={{color:'brown', marginLeft:'12px'}} size={'30px'}/>
                   </a>
                   </div>
              </div>
            </div>
          </div>


          <div className="Acolumn">
            <div className="Acard">
              <img src={Img4} alt="Abdallah alhajeid" style={{width: '100%'}}  className="A_img"/>
              <div className="Acontainer">
              <h2 className="Aya-title" >Mo Aljasem </h2>
                <p className="Atitle">Web Developer</p>
                <p>OCA Academy</p>
                <div className={classes.socialMedia} >
                  <a href="https://github.com/Mohammed-Aljasem">
                   <AiFillGithub style={{color:'brown', marginLeft:'16px'}} size={'30px'} />
                   </a>
                   <a href=" https://www.linkedin.com/in/mohammed-aljasem ">
                   <FaLinkedin style={{color:'brown', marginLeft:'16px'}} size={'30px'}/>
                   </a>
                   </div>    
              </div>
            </div>
          </div>


          <div className="Acolumn">
            <div className="Acard">
              <img src={Img3} alt="Ayah imad" style={{width: '100%'}}  className="A_img"/>
              <div className="Acontainer">
              <h2 className="Aya-title">Ayah Imad</h2>
                <p className="Atitle">Web Developer</p>
                <p className='p'>OCA Academy</p>
                <div className={classes.socialMedia} >
                <a href="https://github.com/Abdaljawad-Ayah">
                   <AiFillGithub style={{color:'brown', marginLeft:'16px'}} size={'30px'} />
                   </a>
                   <a href="https://www.linkedin.com/in/ayah-imad/">
                   <FaLinkedin  style={{color:'brown' , marginLeft:'16px'}} size={'30px'}/>
                   </a>
                   </div>               
              </div>
            </div>
          </div>

          <div className="Arow"></div>
          <div className="Acolumn">
            <div className="Acard">
              <img src={Img2} alt="Mohammad aljasem" style={{width: '100%'}}  className="A_img"/>
              <div className="Acontainer">
                <h2 className="Aya-title">Abdallah alhajeid</h2>
                <p className="Atitle">Web Developer</p>
                <p className='p'>OCA Academy</p>
               <div className={classes.socialMedia} >
                <a href="https://github.com/Abdallah-Alhajeid">
                   <AiFillGithub style={{color:'brown', marginLeft:'16px'}} size={'30px'} />
                   </a>
                   <a href="https://www.linkedin.com/in/abdallah-alhajeid/">
                   <FaLinkedin style={{color:'brown',marginLeft:'16px'}} size={'30px'}/>
                   </a>
                   </div>
              </div>
            </div>
          </div>

          <div className="Acolumn">
            <div className="Acard">
              <img src={Img5} alt="Waed dawaghreh" style={{width: '100%'}}  className="A_img"/>
              <div className="Acontainer">
              <h2 className="Aya-title">Waed Dawaghreh </h2>
                <p className="Atitle">Web Developer</p>
                <p className='p'>OCA Academy</p>
                  <div className={classes.socialMedia} >
                  <a href="https://github.com/Waed-Dawaghreh">
                   <AiFillGithub style={{color:'brown', marginLeft:'16px'}} size={'30px'} />
                   </a>
                   <a href="https://www.linkedin.com/in/waed-dawaghreh98/">
                   <FaLinkedin style={{color:'brown', marginLeft:'16px'}} size={'30px'}/>
                   </a>
                   </div>
              </div>
            </div>
          </div>

          <div className="Acolumn">
            <div className="Acard">
              <img src={Img6} alt="Lubna amjad" style={{width: '100%'}}  className="A_img"/>
              <div className="Acontainer">
              <h2  className="Aya-title">lubna amjad </h2>
                <p className="Atitle">Web Developer</p>
                <p className='p'>OCA Academy</p>
                <div className={classes.socialMedia} >
                <a href="https://github.com/lubna-almaaweed">
                   <AiFillGithub style={{color:'brown', marginLeft:'16px'}} size={'30px'} />
                   </a>
                   <a href="https://www.linkedin.com/in/lubna-almaaweed/">
                   <FaLinkedin style={{color:'brown', marginLeft:'16px'}} size={'30px'}/>
                   </a>
              </div>
            </div>
          </div>
          
          </div> 
          </div> 
        </div>
      </div>
    
  );
}