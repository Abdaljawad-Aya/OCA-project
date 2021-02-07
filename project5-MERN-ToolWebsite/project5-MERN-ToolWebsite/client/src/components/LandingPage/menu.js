import Tabs from "react-bootstrap/Tabs";
import Tab from "react-bootstrap/Tab";
import TabContainer from "react-bootstrap/TabContainer";
import TabContent from "react-bootstrap/TabContent";
import React, { useState } from "react";
import Cake from "./cake";
import Ice from "./ice";
import R_Card_Donut from "./cardDonuts.js";
import R_Card_Ice from "./cardcake.js";
import R_Card_Cake from "./cardIce.js";
import Donuts from "./donuts";
// import AboutPic from "../../components/landingpage/aboutpic";
import Img0 from "../assets/s.png";

export default function ControlledTabs() {
  const [key, setKey] = useState("home");
  return (
    <Tabs
      id="controlled-tab-example"
      activeKey={key}
      onSelect={(k) => setKey(k)}
      className="R-menu-Container"
    >
      <Tab eventKey="home" title="Ice cream ">
      <R_Card_Cake/>
      </Tab>

      <Tab eventKey="profile" title=" Cake">
       <R_Card_Ice/>
      </Tab>

      <Tab eventKey="contact" title="Donuts">
      <R_Card_Donut/>
      </Tab>
    </Tabs>
  );
}

