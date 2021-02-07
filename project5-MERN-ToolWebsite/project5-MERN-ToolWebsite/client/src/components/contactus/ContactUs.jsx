import React, {useState}from "react";
import "./contactus.css";
import axios from "axios";
import TextFieldGroup from '../common/TextFieldGroup'
import TextAreaFieldGroup from '../common/TextAreaFieldGroup'
function CreateContact(){
  const [input, setInput]= useState({
    name:'',
    cname:'',
    email:'',
    phonenumber:'',
    message:''
  })
  function handleChange(event){
    const{name, value}= event.target;
    setInput(prevInput =>{
      return{
        ...prevInput,
        [name]:value
      }
    })
  }
  function handleClick(event){
    event.preventDefault();
    console.log(input);
    const newContact ={
      name:input.name,
      cname:input.cname,
      email:input.email,
      phonenumber:input.phonenumber,
      message:input.message
    }

    axios.post('http://localhost:5000/api/Contact/create', newContact)
   
    setInput( prevInput=>{
      return{
        name:'',
        cname:'',
        email:'',
        phonenumber:'',
        message:''
      }
    } )
  
  }
    return (
  <div>
  <div className="container-pr">
        <section className="container-ch">
        <div className="form-background">
        <i><img src="https://i.pinimg.com/originals/e3/35/55/e335555d9a18edaae492329e3b8d8fd7.gif" width="100%" height="100%" alt="background"/></i>
        </div>
        <div className="m_form-count">
          <div className="m_form-box">
            <h2>Contact Us</h2>
            <form  className="m_container-form">
              
                
                <TextFieldGroup
                name="name"
                type="text"
                placeholder="Your name & Company name"
                onChange={handleChange} name="name" value={input.name} 
                required
                icon={"fas fa-user"}
                />
              
              
                
                <TextFieldGroup 
                type="email"
                name='email' 
                placeholder="Enter your email here"
                onChange={handleChange} name="email" value={input.email} autoComplete="off"
                icon={"fas fa-user"}
                required
                />
              
              
                
                <TextFieldGroup
                  placeholder="Enter your number here" 
                type="text"
                onChange={handleChange} name="phonenumber" value={input.phonenumber} autoComplete="off"  icon={"fas fa-user"}
                />
            
              
               
              <TextAreaFieldGroup className="m_form-style-input" name="message" onChange={handleChange} name="message" value={input.message} 
               placeholder="Your massage"
              autoComplete="off" rows="5"  required />

              
              
              <div className="input-log form-style-input">
              <button onClick={handleClick} className="btn btn-lg btn-info">Contact Us</button>
              </div>
            </form>
            </div>
          </div>
        </section>  
       </div>
</div>
    )
}
export default CreateContact;