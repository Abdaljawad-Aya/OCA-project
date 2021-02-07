import React from "react";
import "./footer.css";

class Footer extends React.Component {
  render() {
    return (
      <div className="footer">
        <footer>
          <div className="footer_content">
            <div className="footer_qoute">Photography is truth</div>
            <div> Live Intentionally . Live Authentically</div>
            <div className="footer_social_icons">
              <i className="fab fa-twitter"></i>
              <i className="fab fa-facebook-f"></i>
              <i className="fab fa-instagram"></i>
              <i className="fab fa-snapchat-ghost"></i>
            </div>
            <div className="footer_navigation">
              <a href="/"> Home / </a>
              <a href="/servicePage"> Our Services / </a>
              <a href="/AppOne"> Profile </a>
            </div>
          </div>
        </footer>
      </div>
    );
  }
}

export default Footer;
