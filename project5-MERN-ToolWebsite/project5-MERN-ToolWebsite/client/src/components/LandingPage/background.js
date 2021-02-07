import React, { useState, useEffect } from "react";
import Img0 from "../assets/donut1.jpeg";
import "./coverPhoto.css";

export default function BackgroundImg() {
  return (
    <div className="w-vid-container ">
      <img src="https://images.unsplash.com/photo-1486427944299-d1955d23e34d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80" alt="Background pic" />
      <h1>Taste Life, Taste Sugar</h1>
      <p id="WhatWeDo">What Are You Waiting For?</p>
    </div>
  );
}