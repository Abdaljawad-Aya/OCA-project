import React, { Component, useState, useEffect } from "react";
// import "./menu.css";
import "./styleCard.css";
import { Link } from "react-router-dom";
import { loginUser } from "../../actions/authActions";
import Img2 from "../assets/donut2.jpeg";
import axios from "axios";
const passport = require("passport");
import { Card, CardDeck, Button, Form } from "react-bootstrap";

const R_Card = (props) => {
  const [price, setPrice] = useState(10);
  const [count, setCount] = useState(1);
  const [isLogin, setLogin] = useState(false);

  const handleAdd = () => {
    setCount(count + 1);
    setPrice(price + 10);
  };
  const handleSub = () => {
    if (count > 1 && price >= 10) {
      setCount(count - 1);
      setPrice(price - 10);
    }
  };

  useEffect(() => {
    // if (props.auth.isAuthenticated) {
    //   props.history.push("/dashboard");
    // }
    // else {
    //   props.history.push("/register")
    // }
    // const userInformation = localStorage.getItem("jwtToken") ? JSON.parse(localStorage.getItems("jwtToken") ) : null ;
    AuthUser();
  });

  const AuthUser = async (e) => {
    var login = false;

    const userInformation = localStorage.getItem("jwtToken");
    const config = { headers: { Authorization: ` ${userInformation}` } };

    console.log(userInformation);

    await axios
      .get(
        "http://localhost:5000/api/users/current",
        passport.authenticate(userInformation),
        { session: false },
        config
      )
      //   .get(
      //   "http://localhost:5000/api/users/current", {
      //   headers:{
      //     "Authorization":"Bearer "+localStorage.getItem("jwtToken")
      // }}
      // )
      .then((res) => {
        // console.log(res.data);
        // setLogin(true);
        // console.log(isLogin)
        if (userInformation) {
          Book();
          console.log(userInformation);
        } else {
          console.log(" failed");
        }
      });
  };

  const Book = async (e) => {
    e.preventDefault();
    // AuthUser();
    let newOrder = {
      username: props.username,
      ordername: props.ordername,
      description: props.description,
      price: props.price,
      quantity: "5",
      addons: "string",
      imgsrc: props.imgsrc,
    };
    // console.log(newOrder);

    await axios.post("http://localhost:5000/api/orders/add", newOrder).then();
  };

  return (

    <div className="m_card_container">

    <div className="m_card_image">
      <img src={props.imgsrc} alt="" width="100%" height="100%"/>
    </div>

    <div className="m_card_Description">
      <div className="m_card_title">
        <h1 className="m_card_title_body">
        {props.ordername}
        </h1>
      </div>

      <div className="m_card_body_description">
      {props.description}
      </div>

      <div className="m_card_quantity">
      <div className="m_card_body_quantity">
        {props.price}
        </div>
        <div className="m_card_body_quantity">
          Quantity:
        </div>
        <div className="m_card_quantity_btns">
          <button className="m_card_btn_quantity btn btn-outline-success"  type="button" onClick={handleAdd}>
          +
          </button>
          <span>{count}</span>
          <button className="m_card_btn_quantity btn btn-outline-success"  type="button"  onClick={handleSub}>
          -
          </button>

        </div>

      </div>
      <div className="m_card_btn">
        <button className="m_card_btn_buy btn btn-primary" type="submit" onClick={Book}  >
          Buy
        </button>
      </div>
    </div>
  </div>

  );
};
export default R_Card;












