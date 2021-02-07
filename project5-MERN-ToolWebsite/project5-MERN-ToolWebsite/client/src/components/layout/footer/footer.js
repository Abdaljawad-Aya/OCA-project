import React, { Component } from "react";
import "./footer.css";

function Footer() {
  return (
    <div className="w-footer-container">
      {/* <section className="w-footer-subscription">
        <p className="w-footer-subscription-heading">
          Find Your Favorite Sweets
        </p>
        <p className="w-footer-subscription-text">What Are You Waiting For</p>
      </section> */}

      <div className="w-footer-links">
        <div className="w-footer-link-wrapper">
        <div className="w-footer-link-items">
          <p className="">
          Find Your Favorite Sweets
        </p>
        <p className="">What Are You Waiting For</p>
          </div>
          <div className="w-footer-link-items w-footer-link-items2">
            <h2>About Us</h2>
            <a href="#WhatWeDo">What we do</a>
            <a href="#">Contact Us</a>
            <a href="#">Our Team</a>
          </div>
         
          <div className="w-footer-link-items w-footer-link-items1">
            <h2>Videos</h2>
            <a href="https://www.youtube.com/watch?v=qPkua9vWej8&list=PLVSnAsIT6LBraPhsJ2zO8WgfVtF7y1beN&ab_channel=EasyCakesDecoratingIdeas">Watch Our Videos</a>
          </div>
          <div className="w-footer-link-items">
            <h2>Social Media</h2>
            <a href="#">Instagram</a>
            <a href="#">Facebook</a>
            <a href="#">Youtube</a>
            <a href="#">Twitter</a>
          </div>
        </div>
      </div>

      <section className="w-social-media">
        <div className="w-social-media-wrap">
          <div className="w-footer-logo">
            <a href="#" className="w-social-logo">
              {/* <img
                src={Logo}
                alt="Website Logo"
                style={{ width: "45px", height: "40px", marginRight: "0.2rem" }}
              ></img> */}
              Sugar
            </a>
          </div>
          <small className="w-website-rights">Sugar © 2020</small>
          <div className="w-social-icons">
            <a
              className="w-social-icon-link facebook"
              href="https://www.facebook.com/abd.alhajeid"
              target="_blank"
              aria-label="Facebook"
            >
              <i className="fab fa-facebook-f" />
            </a>
            <a
              className="w-social-icon-link instagram"
              href="https://www.instagram.com/hellgrav/"
              target="_blank"
              aria-label="Instagram"
            >
              <i className="fab fa-instagram" />
            </a>
            <a
              className="w-social-icon-link w-youtube"
              href="https://www.youtube.com/watch?v=Pz70gsQVr40&ab_channel=Insider"
              target="_blank"
              aria-label="Youtube"
            >
              <i className="fab fa-youtube" />
            </a>
            <a
              className="w-social-icon-link w-twitter"
              href="https://twitter.com/waedMD98?s=09"
              target="_blank"
              aria-label="Twitter"
            >
              <i className="fab fa-twitter" />
            </a>
            <a
              className="w-social-icon-link w-twitter"
              href="https://www.linkedin.com/in/abdallah-alhajeid/"
              target="_blank"
              aria-label="LinkedIn"
            >
              <i className="fab fa-linkedin" />
            </a>
          </div>
        </div>
      </section>
    </div>
  );
}

export default Footer;
